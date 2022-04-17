<?php

namespace App\Services;

use App\Repositories\HomeworldRepository;
use App\Repositories\PersonRepository;

class HomeworldService
{

    protected HomeworldRepository $homeworldRepository;
    protected PersonRepository $personRepository;

    /**
     * @param HomeworldRepository $homeworldRepository
     */
    public function __construct(HomeworldRepository $homeworldRepository, PersonRepository $personRepository)
    {
        $this->homeworldRepository = $homeworldRepository;
        $this->personRepository = $personRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->homeworldRepository->all();
    }

    /**
     * @param $homeworld
     * @return array
     */
    public function show($homeworld)
    {
        $people = $this->personRepository->with(['films', 'images'])->where($homeworld)->paginate(10);

        $homeworld_data = $this->homeworldRepository->find($homeworld['homeworld_id']);

        $column_names = collect([
            'Name', 'Images', 'Height', 'Mass', 'Hair Color', 'Birth Year',
            'Gender', 'Homeworld', 'Films', 'Created', 'Url'
        ]);

        return compact('people', 'homeworld_data', 'column_names');
    }
}
