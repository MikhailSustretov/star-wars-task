<?php

namespace Modules\Homeworld\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Homeworld\Entities\Homeworld;

class HomeworldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Homeworld::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->city()
        ];
    }
}

