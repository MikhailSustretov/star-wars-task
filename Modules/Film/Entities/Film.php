<?php

namespace Modules\Film\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model
{
    use HasFactory;

    protected array $fillable = ['title'];

    protected string $table='films';

    protected static function newFactory()
    {
        return \Modules\Film\Database\factories\FilmFactory::new();
    }
}
