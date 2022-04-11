<?php

namespace App\Services;

use App\Models\Person;
use App\Repositories\FilmRepository;
use App\Repositories\GenderRepository;
use App\Repositories\HomeworldRepository;
use App\Repositories\ImageRepository;
use App\Repositories\PersonRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class PersonService
{
    protected PersonRepository $personRepository;
    protected FilmRepository $filmRepository;
    protected HomeworldRepository $homeworldRepository;
    protected GenderRepository $genderRepository;
    protected ImageRepository $imageRepository;

    public function __construct(PersonRepository    $personRepository, FilmRepository $filmRepository,
                                HomeworldRepository $homeworldRepository, GenderRepository $genderRepository,
                                ImageRepository     $imageRepository)
    {
        $this->personRepository = $personRepository;
        $this->filmRepository = $filmRepository;
        $this->homeworldRepository = $homeworldRepository;
        $this->genderRepository = $genderRepository;
        $this->imageRepository = $imageRepository;

    }

    public function store($data)
    {
        try {
            Db::beginTransaction();

            $films = $data['films'];
            $images = $data['image'];

            unset($data['films'], $data['image']);

            $images_id = $this->storeImages($images);

            $newPerson = $this->personRepository->create($data);

            $newPerson->films()->attach($films);
            $newPerson->images()->attach($images_id);

            Db::commit();

        } catch (Exception $exception) {
            Db::rollBack();
            return $exception->getMessage();
        }

        return $newPerson;
    }

    /**
     *The function provides all the necessary data
     * for the "people / index" view - the main page of the site with a table of data about persons.
     *
     * @return array with two nested arrays: $column_name are the names of the table columns
     * and $people is the data of these columns
     */
    public function index()
    {
        $column_names = collect([
            'Name', 'Images', 'Height', 'Mass', 'Hair Color', 'Birth Year',
            'Gender', 'Homeworld', 'Films', 'Created', 'Url'
        ]);

        $people = $this->personRepository->with('films')->with('images')->paginate(10);

        return compact('column_names', 'people');
    }

    /**
     *The function provides all the necessary data
     * for the "people / create" view.
     *
     * @return array with three nested arrays: $homeworlds, $films and $genders
     */
    public function create()
    {
        $homeworlds = $this->homeworldRepository->all();
        $films = $this->filmRepository->all();
        $genders = $this->genderRepository->all();

        return compact('homeworlds', 'films', 'genders');
    }

    public function edit(Person $person)
    {
        $films = $this->filmRepository->all();
        $genders = $this->genderRepository->all();
        $homeworlds = $this->homeworldRepository->all();
        $personData = $this->personRepository->with('films')->with('images')->find($person->id);


        return compact('films', 'genders', 'homeworlds', 'personData');
    }

    public function update(mixed $updated_data, Person $person)
    {
        try {
            Db::beginTransaction();

            $films = $updated_data['films'];
            unset($updated_data['films']);

            $updated_person = $this->personRepository->update($updated_data, $person->id);
            $person->films()->sync($films);

            Db::commit();

        } catch (Exception $exception) {
            Db::rollBack();
            return $exception->getMessage();
        }

        return $updated_person;
    }

    public function destroy(Person $person)
    {
        $this->personRepository->delete($person->id);
    }

    public function updateImages(Person $person, mixed $images)
    {
        try {
            Db::beginTransaction();

            $images_id = $this->storeImages($images);

            $images_id = $this->addExistingImgsIds($images_id, $person->images()->get());

            $updated_result = $person->images()->sync($images_id);

            Db::commit();

        } catch (Exception $exception) {

            Db::rollBack();
            return $exception->getMessage();
        }

        return $updated_result;
    }

    private function storeImages($images): array
    {
        $images_id = [];
        foreach ($images as $image) {

            $imagePath = $image->store('person_images');

            $newImage = $this->imageRepository->create(['title' => $imagePath]);

            $images_id[] = $newImage->id;
        }

        return $images_id;
    }

    private function addExistingImgsIds($images_id, $images): array
    {
        foreach ($images as $image) {
            $images_id[] = $image->id;
        }

        return $images_id;
    }
}
