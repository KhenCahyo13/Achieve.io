<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Master\Database\Factories\StudentFactory;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'students';
    protected $fillable = [
        'user_id',
        'study_program_id',
        'address',
        'nip',
        'birth_date',
        'phone_number',
        'email',
    ];

    public function studyProgram(): BelongsTo {
        return $this->belongsTo(StudyProgram::class, 'study_program_id');
    }

    // protected static function newFactory(): StudentFactory
    // {
    //     // return StudentFactory::new();
    // }
}
