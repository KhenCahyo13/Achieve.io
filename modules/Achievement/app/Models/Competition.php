<?php

namespace Modules\Achievement\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Achievement\Database\Factories\CompetitionFactory;

class Competition extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'competitions';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'level',
        'category',
        'start_reg_date',
        'end_reg_date',
        'start_date',
        'end_date',
        'verification_status',
    ];

    // protected static function newFactory(): CompetitionFactory
    // {
    //     // return CompetitionFactory::new();
    // }
}
