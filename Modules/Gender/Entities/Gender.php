<?php

namespace Modules\Gender\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Gender\Database\factories\GenderFactory;

class Gender extends Model
{

    use HasFactory;

    /**
     * @var array|string[]
     */
    protected $fillable = ['name'];

    /**
     * @var string
     */
    protected $table='genders';

    /**
     * @return GenderFactory
     */
    protected static function newFactory()
    {
        return GenderFactory::new();
    }
}
