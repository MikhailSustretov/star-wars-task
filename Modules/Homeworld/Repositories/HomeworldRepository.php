<?php

namespace Modules\Homeworld\Repositories;

use Modules\BaseModulesObjects\CoreRepository;
use Modules\Homeworld\Entities\Homeworld as Model;

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
     * @return mixed
     */
    public function getHomeworldsNames(): mixed
    {
        return $this->startConditions()->all('id', 'name');
    }

    /**
     * @param int $homeworldId
     * @return mixed
     */
    public function getHomeworldName(int $homeworldId): mixed
    {
        return $this->startConditions()->find($homeworldId);
    }


}
