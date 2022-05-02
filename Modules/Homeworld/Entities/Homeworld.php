<?php

namespace Modules\Homeworld\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Homeworld\Database\factories\HomeworldFactory;

class Homeworld extends Model
{
    use HasFactory;

    /**
     * @var array|string[]
     */
    protected $fillable = ['name'];

    /**
     * @var string
     */
    protected $table = 'homeworlds';

    /**
     * @return HomeworldFactory
     */
    protected static function newFactory()
    {
        return HomeworldFactory::new();
    }
}
