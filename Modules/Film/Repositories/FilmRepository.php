<?php

namespace Modules\Film\Repositories;

use Modules\BaseModulesObjects\CoreRepository;
use Modules\Film\Entities\Film as Model;

/**
 * This is a repository with special queries on the Films table
 */
class FilmRepository extends CoreRepository
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
     * Get all films titles
     * @return mixed
     */
    public function getFilmTitles(): mixed
    {
        return $this->startConditions()->all('id', 'title');
    }
}
