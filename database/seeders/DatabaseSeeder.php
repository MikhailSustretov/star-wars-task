<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Gender;
use App\Models\Homeworld;
use App\Models\Person;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Gender::factory()->create(['gender' => 'male']);
        Gender::factory()->create(['gender' => 'female']);
        Gender::factory()->create(['gender' => 'n/a']);

        $swapi_url = 'https://swapi.dev/api/people';
        $gender_default_id = Gender::where('gender', 'n/a')->first()->id;

        while ($swapi_url !== null) {
            $swapi_inf = $this->getSwapiInf($swapi_url);

            $persons = $swapi_inf->results;

            foreach ($persons as $person) {

                $homeworld = $this->getSwapiInf($person->homeworld);
                $homeworld_id = Homeworld::firstOrCreate(['name' => $homeworld->name]);

                $gender_object = Gender::where('gender', $person->gender)->first();

                $gender_id = $gender_object == null ? $gender_default_id : $gender_object->id;

                $mass = $this->numbers_validate($person->mass);
                $height = $this->numbers_validate($person->height);

                $person_id = Person::factory()->create([
                    'name' => $person->name,
                    'height' => $height,
                    'mass' => $mass,
                    'hair_color' => $person->hair_color,
                    'birth_year' => $person->birth_year,
                    'gender_id' => $gender_id,
                    'homeworld_id' => $homeworld_id,
                    'created' => mb_substr($person->created, 0, 10),
                    'url' => $person->url
                ]);

                foreach ($person->films as $film) {
                    $film_object = $this->getSwapiInf($film);

                    $film_id = Film::firstOrCreate(['title' => $film_object->title]);

                    $person_id->films()->attach($film_id);
                }
            }

            $swapi_url = $swapi_inf->next;
        }
    }

    private function getSwapiInf($url)
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

    private function numbers_validate($mass)
    {
        $mass = str_replace(',', '', $mass);

        return is_numeric($mass) ? (int)$mass : null;
    }


}
