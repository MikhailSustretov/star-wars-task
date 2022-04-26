<?php

namespace Modules\Person\Repositories;

use Modules\BaseModulesObjects\CoreRepository;
use Modules\Person\Entities\Person as Model;

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
     * @return mixed
     */
    public function getIndexData(): mixed
    {
        $paginatedNumber = config('constants.paginated_people_number');

        return $this->startConditions()->with(['films', 'images'])->paginate($paginatedNumber);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createPerson(array $data): mixed
    {
        return $this->startConditions()->create($data);
    }

    /**
     * @param $personId
     * @return mixed
     */
    public function getEditPersonPage($personId): mixed
    {
        return $this->startConditions()->with(['films', 'images'])->find($personId);
    }

    /**
     * @param array $personData
     * @param int $person
     * @return mixed
     */
    public function updatePerson(array $personData, int $person): mixed
    {
        return $this->startConditions()->find($person)->update($personData);
    }

    /**
     * @param int $personId
     * @return mixed
     */
    public function deletePerson(int $personId): mixed
    {
        return $this->startConditions()->destroy($personId);
    }

    /**
     * @param array $homeworldId
     * @return mixed
     */
    public function getPeopleDataByHomeworld(array $homeworldId): mixed
    {
        $paginatedNumber = config('constants.paginated_people_number');

        return $this->startConditions()->where($homeworldId)->with(['films', 'images'])->paginate($paginatedNumber);
    }
}
