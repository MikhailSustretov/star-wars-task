<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Gender extends Model implements Transformable
{
    use TransformableTrait;

    use HasFactory;

    protected $guarded=[];

    public function people()
    {
        $this->hasMany(Person::class);
    }
}
