<?php

namespace Modules\Achievement\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
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
        $query = self::with('student', 'period', 'participant', 'participant.lecturer')->where('title', 'like', '%' . $search . '%');

        foreach ($sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        if (Auth::user()->hasRole('Student')) {
            $query->where('student_id', Auth::user()->id);
        } else if (Auth::user()->hasRole('Lecturer')) {
            $query->where('lecturer_id', Auth::user()->id);
        }

        return $query->paginate($perPage);
    }

    // protected static function newFactory(): AchievementFactory
    // {
    //     // return AchievementFactory::new();
    // }
}
