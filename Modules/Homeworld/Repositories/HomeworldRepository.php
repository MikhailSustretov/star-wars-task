<?php

namespace Modules\Homeworld\Repositories;

use Modules\BaseModulesObjects\CoreRepository;
use Modules\Homeworld\Entities\Homeworld as Model;

/**
 * This is a repository with special queries on the Homeworlds table
 */
class HomeworldRepository extends CoreRepository
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
     * Get all homeworlds names
     *
     * @return mixed
     */
    public function getHomeworldsNames(): mixed
    {
        return $this->startConditions()->all('id', 'name');
    }

    /**
     * Get homeworld name by its id
     *
     * @param int $homeworldId
     * @return mixed
     */
    public function getHomeworldName(int $homeworldId): mixed
    {
        return $this->startConditions()->find($homeworldId);
    }


}
