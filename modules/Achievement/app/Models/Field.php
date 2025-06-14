<?php

namespace Modules\Achievement\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Achievement\Database\Factories\FieldFactory;

class Field extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'fields';

    protected $fillable = [
        'name',
        'general_name',
    ];

    public function competitions()
    {
        return $this->belongsToMany(Competition::class, 'competition_fields');
    }

    // protected static function newFactory(): FieldFactory
    // {
    //     // return FieldFactory::new();
    // }
}
