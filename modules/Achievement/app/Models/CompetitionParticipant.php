<?php

namespace Modules\Achievement\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'topic_title'
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
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
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate($perPage);
    }

    // protected static function newFactory(): CompetitionParticipantFactory
    // {
    //     // return CompetitionParticipantFactory::new();
    // }
}
