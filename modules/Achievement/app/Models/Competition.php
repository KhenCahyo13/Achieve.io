<?php

namespace Modules\Achievement\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

// use Modules\Achievement\Database\Factories\CompetitionFactory;

class Competition extends Model implements HasMedia
{
    use HasFactory, HasRichText, HasUuids, InteractsWithMedia;

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
        'verification_status',
        'created_by',
    ];

    protected $richTextAttributes = [
        'description',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'competition_fields')->withTimestamps();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('poster')->singleFile();
    }

    public function withFields(array $fieldIds)
    {
        return $this->fields()->sync($fieldIds);
    }

    public static function getAll(int $perPage, string $search, array $sorts)
    {
        $query = self::with('createdBy')->where('name', 'like', '%' . $search . '%');

        foreach ($sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        if (Auth::user()->hasRole(['Student', 'Supervisor'])) {
            $query->where('created_by', Auth::user()->id);
        }

        return $query->paginate($perPage);
    }

    public static function getAvailable(int $perPage, string $search, array $sorts, array $filters)
    {
        $query = self::with('fields')->where('name', 'like', '%' . $search . '%')->where('verification_status', 'Approved');

        foreach ($sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        foreach ($filters as $field => $value) {
            $query->where($field, $value);
        }

        return $query->paginate($perPage);
    }

    public static function approveCompetition(string $competitionId, string $value)
    {
        $competition = Competition::find($competitionId);

        if ($competition) {
            $competition->verification_status = $value;
            $competition->save();
        }
    }

    public static function getTotalPendingCompetitions()
    {
        $results = self::where('verification_status', 'On Process');

        if (!Auth::user()->hasRole('Admin')) {
            $results->where('created_by', Auth::user()->id);
        }

        return $results->count();
    }

    public static function getTotalApprovedCompetitions()
    {
        $results = self::where('verification_status', 'Approved');

        if (!Auth::user()->hasRole('Admin')) {
            $results->where('created_by', Auth::user()->id);
        }

        return $results->count();
    }

    public static function getTotalRejectedCompetitions()
    {
        $results = self::where('verification_status', 'Rejected');

        if (!Auth::user()->hasRole('Admin')) {
            $results->where('created_by', Auth::user()->id);
        }

        return $results->count();
    }

    public static function getTotalAvailableCompetitions()
    {
        return self::where('verification_status', 'Approved')->count();
    }

    public static function getRecommendedCompetitions(string $generalName, string $category, string $level)
    {
        return self::whereHas('fields', function ($query) use ($generalName) {
            $query->where('general_name', $generalName);
        })->where('category', $category)
          ->where('level', $level)
          ->where('verification_status', 'Approved')
          ->get();
    }

    // protected static function newFactory(): CompetitionFactory
    // {
    //     // return CompetitionFactory::new();
    // }
}
