<?php

namespace Modules\Gender\Repositories;

use Modules\BaseModulesObjects\CoreRepository;
use Modules\Gender\Entities\Gender as Model;

/**
 * This is a repository with special queries on the Genders table
 */
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
     * Get all genders names
     *
     * @return mixed
     */
    public function getGenderNames(): mixed
    {
        return $this->startConditions()->all('id', 'name');
    }
}
