<?php

namespace Modules\Achievement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Master\Models\User;

// use Modules\Achievement\Database\Factories\CompetitionParticipantFactory;

class CompetitionParticipant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'competition_participants';
    protected $fillable = [
        'leader_id',
        'competition_id',
        'team_name',
        'topic_title'
    ];

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'participant_members');
    }

    public function withMembers(array $memberIds)
    {
        return $this->members()->sync($memberIds);
    }

    // protected static function newFactory(): CompetitionParticipantFactory
    // {
    //     // return CompetitionParticipantFactory::new();
    // }
}
