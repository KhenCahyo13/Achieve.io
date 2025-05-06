<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Master\Database\Factories\StudyProgramFactory;

class StudyProgram extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'study_programs';
    protected $fillable = [
        'department_id',
        'name'
    ];

    public static function getAll(int $perPage, string $search, array $sorts)
    {
        $query = self::with('department')->where('name', 'like', '%' . $search . '%');

        foreach ($sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        return $query->paginate($perPage);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    // protected static function newFactory(): StudyProgramFactory
    // {
    //     // return StudyProgramFactory::new();
    // }
}
