<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Person.
 *
 * @package namespace App\Models;
 */
class Person extends Model implements Transformable
{
    use TransformableTrait;

    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function homeworld()
    {
        return $this->belongsTo(Homeworld::class);
    }

}
