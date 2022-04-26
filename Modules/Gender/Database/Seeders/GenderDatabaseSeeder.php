<?php

namespace Modules\Gender\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Gender\Entities\Gender;
use Modules\Homeworld\Entities\Homeworld;

class GenderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param $name
     * @return int
     */
    public function run($name): int
    {
        Model::unguard();

        $gender_id = Gender::firstOrCreate(['name' => $name])->id;

        return $gender_id;
    }
}
