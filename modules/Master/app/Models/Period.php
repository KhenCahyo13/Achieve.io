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

    public static function getAll(int $perPage, string $search, array $sorts)
    {
        $query = self::where('title', 'like', '%' . $search . '%');

        foreach ($sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        return $query->paginate($perPage);
    }

    // protected static function newFactory(): PeriodFactory
    // {
    //     // return PeriodFactory::new();
    // }
}
