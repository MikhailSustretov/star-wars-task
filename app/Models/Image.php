<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Film.
 *
 * @package namespace App\Models;
 */
class Image extends Model implements Transformable
{
    use TransformableTrait;

    use HasFactory;

    protected $guarded = [];

    public function people()
    {
        return $this->belongsToMany(Person::class);
    }
}
