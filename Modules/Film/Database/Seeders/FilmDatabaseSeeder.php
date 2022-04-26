<?php

namespace Modules\Film\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Film\Entities\Film;

class FilmDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param $title
     * @return Film
     */
    public function run($title): Film
    {
        Model::unguard();

        $film_id = Film::firstOrCreate(['title' => $title]);

        return $film_id;
    }
}
