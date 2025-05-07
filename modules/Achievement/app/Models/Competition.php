<?php

namespace Modules\Achievement\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('poster')->singleFile();
    }

    // protected static function newFactory(): CompetitionFactory
    // {
    //     // return CompetitionFactory::new();
    // }
}
