<?php

namespace Modules\Homeworld\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Homeworld\Entities\Homeworld;

class HomeworldDatabaseSeeder extends Seeder
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

        $homeworld_id = Homeworld::firstOrCreate(['name' => $name])->id;

        return $homeworld_id;
    }
}
