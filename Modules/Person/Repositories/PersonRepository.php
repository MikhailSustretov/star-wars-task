<?php

namespace Modules\Person\Repositories;

use Modules\BaseModulesObjects\CoreRepository;
use Modules\Person\Entities\Person as Model;

/**
 * This is a repository with special queries on the People table
 */
class PersonRepository extends CoreRepository
{

    /**
     * Get repository model class
     * @return string
     */
    function getModelClass(): string
    {
        return Model::class;
    }

    /**
     * Get data for a person's index page
     *
     * @return mixed
     */
    public function getIndexData(): mixed
    {
        $paginatedNumber = config('constants.paginated_people_number');

        return $this->startConditions()
            ->with(['films:id,title', 'images:id,title,person_id', 'homeworld:id,name', 'gender:id,name'])
            ->paginate($paginatedNumber);
    }

    /**
     * Get data for a person's create page
     *
     * @param array $data
     * @return mixed
     */
    public function createPerson(array $data): mixed
    {
        return $this->startConditions()->create($data);
    }

    /**
     * Get data for a person's edit page
     *
     * @param $personId
     * @return mixed
     */
    public function getEditPersonPage($personId): mixed
    {
        return $this->startConditions()->with(['films:id,title', 'images:id,title,person_id'])->find($personId);
    }

    /**
     * Update person data in storage
     *
     * @param array $personData
     * @param int $person
     * @return mixed
     */
    public function updatePerson(array $personData, int $person): mixed
    {
        return $this->startConditions()->find($person)->update($personData);
    }

    /**
     * Delete person data from storage
     *
     * @param int $personId
     * @return mixed
     */
    public function deletePerson(int $personId): mixed
    {
        return $this->startConditions()->destroy($personId);
    }

    /**
     * Get data about people with the given homeworld_id
     *
     * @param array $homeworldId
     * @return mixed
     */
    public function getPeopleDataByHomeworld(array $homeworldId): mixed
    {
        $paginatedNumber = config('constants.paginated_people_number');

        return $this->startConditions()
            ->where($homeworldId)
            ->with(['films:id,title', 'images:id,title,person_id', 'homeworld:id,name', 'gender:id,name'])
            ->paginate($paginatedNumber);
    }
}
