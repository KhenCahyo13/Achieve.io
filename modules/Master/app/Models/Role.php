<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

// use Modules\Master\Database\Factories\RoleFactory;

class Role extends SpatieRole
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $primaryKey = 'uuid';

    protected $fillable = [];

    public static function getAll(int $perPage, string $search, array $sorts)
    {
        $query = self::with('permissions')->where('name', 'like', '%'.$search.'%');

        foreach ($sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        return $query->paginate($perPage);
    }

    // protected static function newFactory(): RoleFactory
    // {
    //     // return RoleFactory::new();
    // }
}
