<?php

namespace Modules\Person\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Film\Entities\Film;
use Modules\Gender\Entities\Gender;
use Modules\Homeworld\Entities\Homeworld;
use Modules\Image\Entities\Image;
use Modules\Person\Database\factories\PersonFactory;

/**
 * Model for working with People table
 */
class Person extends Model
{

    use HasFactory;

    use SoftDeletes;

    protected array $fillable = ['name', 'height', 'mass', 'hair_color', 'birth_year',
        'gender_id', 'homeworld_id', 'created', 'url'];

    protected string $table = 'People';

    /**
     * @return PersonFactory
     */
    protected static function newFactory()
    {
        return PersonFactory::new();
    }

    /**
     * @return BelongsToMany
     */
    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class);
    }

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    /**
     * @return BelongsTo
     */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * @return BelongsTo
     */
    public function homeworld(): BelongsTo
    {
        return $this->belongsTo(Homeworld::class);
    }

}
