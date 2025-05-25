<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Master\Database\Factories\LecturerFactory;

class Lecturer extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'lecturers';
    protected $fillable = [
        'user_id',
        'department_id',
        'address',
        'nip',
        'birth_date',
        'phone_number',
    ];

    public function department(): BelongsTo {
        return $this->belongsTo(Department::class);
    }

    // protected static function newFactory(): LecturerFactory
    // {
    //     // return LecturerFactory::new();
    // }
}
