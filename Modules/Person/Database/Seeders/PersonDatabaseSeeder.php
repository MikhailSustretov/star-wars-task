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
     */
    public function run($person_data)
    {
        Model::unguard();

        $person = Person::firstOrCreate($person_data);

        return $person;
    }
}
