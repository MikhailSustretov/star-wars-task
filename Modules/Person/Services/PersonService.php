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

/**
 * This is a class with business logic for working on the Person entity
 */
class PersonService
{

    /**
     * Saves the new person and his movies in the appropriate tables.
     * Adds images of a person to storage and their names to a table
     *
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

            $newPerson->films()->sync($films);

            Db::commit();

        } catch (Exception $exception) {
            Db::rollBack();
            abort(404, $exception->getMessage());
        }

        return $newPerson;
    }

    /**
     * Adds images to storage
     *
     * @param $images
     * @param $personId
     * @return void
     */
    private function storeImages($images, $personId): void
    {
        $imageRepository = new ImageRepository();
        foreach ($images as $image) {

            $imagePath = $image->store('person_images');

            $imageRepository->storeImage(['title' => $imagePath, 'person_id' => $personId]);
        }
    }

    /**
     * Retrieve information from movies, genders, homeworlds, and people for the person editing page.
     *
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
     * Updates the given person and his movies' data in the appropriate tables.
     *
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
            $person->films()->sync($films);

            Db::commit();

        } catch (Exception $exception) {
            Db::rollBack();
            abort(404, $exception->getMessage());
        }

        return $updated_person;
    }
}