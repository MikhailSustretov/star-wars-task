<?php

namespace Modules\Image\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{

    use HasFactory;

    use SoftDeletes;

    /**
     * @var array|string[]
     */
    protected array $fillable = ['title', 'person_id'];

    /**
     * @var string
     */
    protected string $table='images';
}
