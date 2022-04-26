<?php

namespace Modules\Person\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Film\Entities\Film;
use Modules\Gender\Entities\Gender;
use Modules\Homeworld\Entities\Homeworld;
use Modules\Image\Entities\Image;
use Modules\Person\Database\factories\PersonFactory;

class Person extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected array $fillable = ['name', 'height', 'mass', 'hair_color', 'birth_year',
        'gender_id', 'homeworld_id', 'created', 'url'];

    /**
     * @var string
     */
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
    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    /**
     * @return HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * @return BelongsTo
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * @return BelongsTo
     */
    public function homeworld()
    {
        return $this->belongsTo(Homeworld::class);
    }

}
