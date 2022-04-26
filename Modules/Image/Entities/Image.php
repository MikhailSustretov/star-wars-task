<?php

namespace Modules\Image\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Image\Database\factories\ImageFactory;

class Image extends Model
{

    use HasFactory;

    /**
     * @var array|string[]
     */
    protected array $fillable = ['title', 'person_id'];

    /**
     * @var string
     */
    protected string $table='images';
}
