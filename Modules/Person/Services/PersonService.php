<?php

namespace Modules\Person\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Modules\Film\Repositories\FilmRepository;
use Modules\Gender\Repositories\GenderRepository;
use Modules\Homeworld\Repositories\HomeworldRepository;
use Modules\Image\Repositories\ImageRepository;
use Modules\Person\Entities\Person;
use Modules\Person\Repositories\PersonRepository;

class PersonService
{

    /**
     * @param array $data
     * @return string
     */
    public function storeNewPerson(array $data): string
    {
        try {
            Db::beginTransaction();

            $films = $data['films'];
            $images = $data['image'];
            unset($data['films'], $data['image']);

            $personRepository = new PersonRepository;
            $newPerson = $personRepository->createPerson($data);

            $this->storeImages($images, $newPerson->id);

            $newPerson->films()->attach($films);

            Db::commit();

        } catch (Exception $exception) {
            Db::rollBack();
            abort(404, $exception->getMessage());
        }

        return $newPerson;
    }

    /**
     * @param $images
     * @param $personId
     * @return void
     */
    private function storeImages($images, $personId): void
    {
        $imageRepository = new ImageRepository();
        foreach ($images as $image) {

            $imagePath = $image->store('person_images');

            $imageRepository->createImage(['title' => $imagePath, 'person_id' => $personId]);
        }
    }

    /**
     * @param $personId
     * @return array
     */
    public function getEditPageData($personId): array
    {
        $films = (new FilmRepository)->getFilmTitles();
        $genders = (new GenderRepository)->getGenderNames();
        $homeworlds = (new HomeworldRepository)->getHomeworldsNames();
        $person = (new PersonRepository)->getEditPersonPage($personId);

        return compact('films', 'genders', 'homeworlds', 'person');
    }

    /**
     * @param Person $person
     * @param array $personData
     * @return string
     */
    public function updatePerson(Person $person, array $personData): string
    {
        try {
            Db::beginTransaction();

            $films = $personData['films'];
            unset($personData['films']);

            $updated_person = (new PersonRepository)->updatePerson($personData, $person->id);
            $person->films()->attach($films);

            Db::commit();

        } catch (Exception $exception) {
            Db::rollBack();
            abort(404, $exception->getMessage());
        }

        return $updated_person;
    }
}