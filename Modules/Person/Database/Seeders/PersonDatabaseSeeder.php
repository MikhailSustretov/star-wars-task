<?php

namespace Modules\Person\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Gender\Entities\Gender;
use Modules\Person\Entities\Person;

class PersonDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param array $person_data
     * @return Person
     */
    public function run(array $person_data): Person
    {
        Model::unguard();

        $person = Person::factory()->create($person_data);

        return $person;
    }
}
