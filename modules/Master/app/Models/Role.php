<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Master\Database\Factories\RoleFactory;

class Role extends SpatieRole
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $primaryKey = 'uuid';
    protected $fillable = [];

    // protected static function newFactory(): RoleFactory
    // {
    //     // return RoleFactory::new();
    // }
}
