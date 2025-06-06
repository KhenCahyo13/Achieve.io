<?php

namespace Modules\Achievement\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Master\Models\User;

// use Modules\Achievement\Database\Factories\CompetitionParticipantFactory;

class CompetitionParticipant extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'competition_participants';

    protected $fillable = [
        'leader_id',
        'lecturer_id',
        'competition_id',
        'team_name',
        'topic_title',
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function leader()
    {
        return $this->belongsTo(User::class, 'leader_id');
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'competition_participant_members',
            'participant_id',
            'user_id'
        )->withTimestamps();
    }

    public function withMembers(array $memberIds)
    {
        return $this->members()->sync($memberIds);
    }

    public static function getRegisteredUsers(string $competitionId)
    {
        return self::with('members')
            ->where('competition_id', $competitionId)
            ->get();
    }

    public static function getFollowedCompetitions(string $userId, int $perPage, string $search)
    {
        return self::with('competition', 'competition.fields')
            ->where(function ($query) use ($userId) {
                $query->where('leader_id', $userId)
                    ->orWhereHas('members', function ($subQuery) use ($userId) {
                        $subQuery->where('users.id', $userId);
                    });
            })
            ->whereHas('competition', function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->paginate($perPage);
    }

    public static function getTotalFollowedCompetitions()
    {
        return self::distinct('competition_id')
            ->where('leader_id', Auth::user()->id)
            ->orWhereHas('members', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })
            ->count('competition_id');
    }

    public static function getTotalSupervisedStudents()
    {
        $participantLeaders = self::where('lecturer_id', Auth::user()->id)
            ->pluck('leader_id')
            ->unique();

        $participantIds = self::where('lecturer_id', Auth::user()->id)
            ->pluck('id');

        $memberIds = DB::table('competition_participant_members')
            ->whereIn('participant_id', $participantIds)
            ->pluck('user_id')
            ->unique();

        $allUserIds = $participantLeaders->merge($memberIds)->unique();

        return $allUserIds->count();
    }

    public static function getTotalSupervisedCompetitions() {
        return self::where('lecturer_id', Auth::user()->id)
            ->distinct('competition_id')
            ->count('competition_id');
    }

    public static function getMembers(string $participantId) {
        return self::find($participantId)->members;
    }

    // protected static function newFactory(): CompetitionParticipantFactory
    // {
    //     // return CompetitionParticipantFactory::new();
    // }
}
