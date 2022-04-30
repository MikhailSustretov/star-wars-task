<?php

namespace Modules\Homeworld\Service;

use Modules\Homeworld\Repositories\HomeworldRepository;
use Modules\Person\Repositories\PersonRepository;

/**
 * This is a class with business logic for working on the Homeworld entity
 */
class HomeworldService
{

    /**
     * Gets all data for homeworld.show view
     *
     * @param int $homeworldId
     * @return array
     */
    public function getShowPageData(int $homeworldId): array
    {
        $HomeworldRepository = new HomeworldRepository;

        $people = (new PersonRepository)->getPeopleDataByHomeworld(['homeworld_id' => $homeworldId]);

        $homeworld_data = $HomeworldRepository->getHomeworldName($homeworldId);

        $homeworlds = $HomeworldRepository->getHomeworldsNames();

        $column_names = collect([
            'Name', 'Images', 'Height', 'Mass', 'Hair Color', 'Birth Year',
            'Gender', 'Homeworld', 'Films', 'Created', 'Url'
        ]);

        return compact('people', 'homeworld_data', 'column_names', 'homeworlds');
    }
}