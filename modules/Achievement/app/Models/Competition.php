<?php

namespace Modules\Achievement\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

// use Modules\Achievement\Database\Factories\CompetitionFactory;

class Competition extends Model implements HasMedia
{
    use HasFactory, HasUuids, HasRichText, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'competitions';

    protected $fillable = [
        'name',
        'description',
        'level',
        'category',
        'start_reg_date',
        'end_reg_date',
        'start_date',
        'end_date',
        'verification_status',
        'created_by',
    ];

    protected $richTextAttributes = [
        'description',
    ];

    public static function getAll(int $perPage, string $search, array $sorts)
    {
        $query = self::with('createdBy')->where('name', 'like', '%'.$search.'%');

        foreach ($sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        return $query->paginate($perPage);
    }

    public static function getAvailable(int $perPage, string $search, array $sorts)
    {
        $query = self::where('name', 'like', '%'.$search.'%');

        foreach ($sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        return $query->paginate($perPage);
    }

    public function createdBy(): BelongsTo {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('poster')->singleFile();
    }

    // protected static function newFactory(): CompetitionFactory
    // {
    //     // return CompetitionFactory::new();
    // }
}
