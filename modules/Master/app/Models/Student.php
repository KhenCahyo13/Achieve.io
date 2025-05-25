<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Master\Database\Factories\StudentFactory;

class Student extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'students';
    protected $fillable = [
        'user_id',
        'study_program_id',
        'address',
        'nim',
        'birth_date',
        'phone_number',
    ];

    public function studyProgram(): BelongsTo {
        return $this->belongsTo(StudyProgram::class);
    }

    // protected static function newFactory(): StudentFactory
    // {
    //     // return StudentFactory::new();
    // }
}
