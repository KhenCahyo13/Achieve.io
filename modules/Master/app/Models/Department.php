<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Master\Database\Factories\DepartmentFactory;

// use Modules\Master\Database\Factories\DepartmentFactory;

class Department extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'departments';
    protected $fillable = [
        'name'
    ];

    public static function getAll(int $perPage, string $search, array $sorts)
    {
        $query = self::where('name', 'like', '%' . $search . '%');

        foreach ($sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        return $query->paginate($perPage);
    }

    protected static function newFactory(): DepartmentFactory
    {
        return DepartmentFactory::new();
    }
}
