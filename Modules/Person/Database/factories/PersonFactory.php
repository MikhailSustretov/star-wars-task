<?php

namespace Modules\Person\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Person\Entities\Person;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'height'=>$this->faker->numberBetween(10,300),
            'mass' => $this->faker->numberBetween(10, 10000),
            'hair_color' => $this->faker->colorName,
            'birth_year' => $this->faker->year,
            'gender_id'=>$this->faker->numberBetween(1,5),
            'homeworld_id'=>$this->faker->numberBetween(1,5),
            'created'=>$this->faker->dateTime
        ];
    }
}

