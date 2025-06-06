<?php

namespace Modules\Achievement\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Master\Models\Period;
use Modules\Master\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

// use Modules\Achievement\Database\Factories\AchievementFactory;

class Achievement extends Model implements HasMedia
{
    use HasFactory, HasUuids, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'achievements';

    protected $fillable = [
        'student_id',
        'participant_id',
        'period_id',
        'title',
        'description',
        'verification_status',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function participant(): BelongsTo
    {
        return $this->belongsTo(CompetitionParticipant::class, 'participant_id');
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(Period::class, 'period_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('certificate')->singleFile();
    }

    public static function getAll(int $perPage, string $search, array $sorts)
    {
        $results = self::with('student', 'period', 'participant', 'participant.members', 'participant.lecturer')->where('title', 'like', '%' . $search . '%');

        foreach ($sorts as $field => $direction) {
            $results->orderBy($field, $direction);
        }

        if (Auth::user()->hasRole('Student')) {
            $results->where(function ($query) {
                $query->where('student_id', Auth::user()->id)
                    ->orWhereHas('participant.members', function ($subquery) {
                        $subquery->where('user_id', Auth::user()->id);
                    });
            });
        } elseif (Auth::user()->hasRole('Supervisor')) {
            $results->whereHas('participant', function ($q) {
                $q->where('lecturer_id', Auth::user()->id);
            });
        }

        return $results->paginate($perPage);
    }

    public static function approveAchievement(string $achievementId, string $value, string | null $rejectedReasons = null)
    {
        $achievement = self::find($achievementId);

        $achievement->verification_status = $value;
        if ($value === 'Rejected') {
            $achievement->reasons = $rejectedReasons;
        }

        $achievement->save();
    }

    public static function getTotalAchievementsOnMonths()
    {
        $statuses = [
            'Approved' => 'approved',
            'Rejected' => 'rejected',
        ];
        $results = self::select(
            DB::raw('COUNT(achievements.id) as total_achievements'),
            DB::raw('MONTH(achievements.created_at) as month'),
            'verification_status'
        )
            ->whereIn('verification_status', array_keys($statuses))
            ->groupBy(DB::raw('MONTH(achievements.created_at)'), 'verification_status')
            ->get()
            ->groupBy('verification_status')
            ->map(function ($items) {
                return $items->keyBy('month');
            });

        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthName = date('F', mktime(0, 0, 0, $i, 10));
            $monthData = ['month' => $monthName];
            foreach ($statuses as $status => $key) {
                $monthData[$key] = isset($results[$status][$i]) ? $results[$status][$i]->total_achievements : 0;
            }
            $months[] = $monthData;
        }

        return collect($months);
    }

    public static function getTotalAchievementsBasedOnCompetitionCategory()
    {
        $results = self::select(DB::raw('COUNT(achievements.id) as total_achievements'), 'competitions.category')
            ->join('competition_participants', 'achievements.participant_id', '=', 'competition_participants.id')
            ->join('competitions', 'competition_participants.competition_id', '=', 'competitions.id')
            ->groupBy('competitions.category');

        if (Auth::user()->hasRole('Student')) {
            $results->where(function ($query) {
            $query->where('achievements.student_id', Auth::user()->id)
                ->orWhereHas('participant.members', function ($subquery) {
                $subquery->where('user_id', Auth::user()->id);
                });
            });
        } else if (Auth::user()->hasRole('Supervisor')) {
            $results->whereHas('participant', function ($query) {
                $query->where('lecturer_id', Auth::user()->id);
            });
        }

        return $results->get();
    }

    public static function getTotalAchievementsBasedOnCompetitionLevel()
    {
        $results = self::select(DB::raw('COUNT(achievements.id) as total_achievements'), 'competitions.level')
            ->join('competition_participants', 'achievements.participant_id', '=', 'competition_participants.id')
            ->join('competitions', 'competition_participants.competition_id', '=', 'competitions.id')
            ->groupBy('competitions.level');

        if (Auth::user()->hasRole('Student')) {
            $results->where(function ($query) {
            $query->where('achievements.student_id', Auth::user()->id)
                ->orWhereHas('participant.members', function ($subquery) {
                $subquery->where('user_id', Auth::user()->id);
                });
            });
        } else if (Auth::user()->hasRole('Supervisor')) {
            $results->whereHas('participant', function ($query) {
                $query->where('lecturer_id', Auth::user()->id);
            });
        }

        return $results->get();
    }

    public static function getTotalPendingAchievements()
    {
        $results = self::where('verification_status', 'On Process');

        if (Auth::user()->hasRole('Student')) {
            $results->where(function ($query) {
                $query->where('student_id', Auth::user()->id)
                    ->orWhereHas('participant.members', function ($subquery) {
                        $subquery->where('user_id', Auth::user()->id);
                    });
            });
        }

        return $results->count();
    }

    public static function getTotalApprovedAchievements()
    {
        $results = self::where('verification_status', 'Approved');

        if (Auth::user()->hasRole('Student')) {
            $results->where(function ($query) {
                $query->where('student_id', Auth::user()->id)
                    ->orWhereHas('participant.members', function ($subquery) {
                        $subquery->where('user_id', Auth::user()->id);
                    });
            });
        }

        return $results->count();
    }

    public static function getTotalRejectedAchievements()
    {
        $results = self::where('verification_status', 'Rejected');

        if (Auth::user()->hasRole('Student')) {
            $results->where(function ($query) {
                $query->where('student_id', Auth::user()->id)
                    ->orWhereHas('participant.members', function ($subquery) {
                        $subquery->where('user_id', Auth::user()->id);
                    });
            });
        }

        return $results->count();
    }

    public static function getTotalSupervisedAchievements()
    {
        return self::whereHas('participant', function ($query) {
            $query->where('lecturer_id', Auth::user()->id);
        })->where('verification_status', 'Approved')->count();
    }

    public static function getExportPdfData(string $startDate, string $endDate, string $verificationStatus)
    {
        return self::with('student', 'period', 'participant', 'participant.lecturer', 'participant.competition')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('verification_status', $verificationStatus)
            ->get();
    }

    // protected static function newFactory(): AchievementFactory
    // {
    //     // return AchievementFactory::new();
    // }
}
