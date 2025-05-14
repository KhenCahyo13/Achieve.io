<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Master\Database\Factories\PeriodFactory;

class Period extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'periods';
    protected $fillable = [
        'title',
        'start_year',
        'end_year',
    ];

    // protected static function newFactory(): PeriodFactory
    // {
    //     // return PeriodFactory::new();
    // }
}
