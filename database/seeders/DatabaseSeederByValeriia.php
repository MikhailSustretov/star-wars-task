<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Film\Database\Seeders\FilmDatabaseSeeder;
use Modules\Gender\Database\Seeders\GenderDatabaseSeeder;
use Modules\Homeworld\Database\Seeders\HomeworldDatabaseSeeder;
use Modules\Person\Database\Seeders\PersonDatabaseSeeder;

class DatabaseSeederByValeriia extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $HomeworldSeeder = new HomeworldDatabaseSeeder();
        $GenderSeeder = new GenderDatabaseSeeder();
        $PersonSeeder = new PersonDatabaseSeeder();
        $FilmSeeder = new FilmDatabaseSeeder();

        $swapi_url = config('constants.swapi_url');

        while ($swapi_url !== null) {

            $swapi_inf = $this->getSwapiInf($swapi_url);
            $persons = $swapi_inf->results;

            foreach ($persons as $person) {

                $homeworld = $this->getSwapiInf($person->homeworld);
                $homeworld_id = $HomeworldSeeder->run($homeworld->name);

                $gender_id = $GenderSeeder->run($person->gender);

                $person_data = $this->collectPersonData($person, $gender_id, $homeworld_id);
                $addedPerson = $PersonSeeder->run($person_data);

                foreach ($person->films as $film) {

                    $film_object = $this->getSwapiInf($film);

                    $film_id = $FilmSeeder->run($film_object->title);

                    $addedPerson->films()->attach($film_id);
                }
            }

            $swapi_url = $swapi_inf->next;
        }
    }

    /**
     * Get info from swapi.dev by url
     *
     * @param $url - swapi.dev url address
     * @return mixed
     */
    private function getSwapiInf($url): mixed
    {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );

        return json_decode(file_get_contents($url,
            false, stream_context_create($arrContextOptions)));
    }

    private function getSwapiInfByValeriia($url): mixed
    {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );

        return json_decode(file_get_contents($url,
            false, stream_context_create($arrContextOptions)));
    }

    /**
     * @param $mass
     * @return int|null
     */
    private function numbers_validate($mass)
    {
        $mass = str_replace(',', '', $mass);

        return is_numeric($mass) ? (int)$mass : null;
    }

    private function numbers_validateByValeriia($mass)
    {
        $mass = str_replace(',', '', $mass);

        return is_numeric($mass) ? (int)$mass : null;
    }

    /**
     * Gathers a person's data into one array to add to the people table
     *
     * @param $person
     * @param $gender_id
     * @param $homeworld_id
     *
     * @return array
     */
    private function collectPersonData($person, $gender_id, $homeworld_id): array
    {
        $mass = $this->numbers_validate($person->mass);
        $height = $this->numbers_validate($person->height);

        return [
            'name' => $person->name,
            'height' => $height,
            'mass' => $mass,
            'hair_color' => $person->hair_color,
            'birth_year' => $person->birth_year,
            'gender_id' => $gender_id,
            'homeworld_id' => $homeworld_id,
            'created' => mb_substr($person->created, 0, 10),
            'url' => $person->url
        ];
    }


}
