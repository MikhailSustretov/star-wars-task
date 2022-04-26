<?php

namespace Modules\Gender\Repositories;

use Modules\BaseModulesObjects\CoreRepository;
use Modules\Gender\Entities\Gender as Model;

class GenderRepository extends CoreRepository
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
    public function getGenderNames(): mixed
    {
        return $this->startConditions()->all('id', 'name');
    }
}
