<?php

namespace Modules\Film\Repositories;

use Modules\BaseModulesObjects\CoreRepository;
use Modules\Film\Entities\Film as Model;

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

    public function getFilmTitles()
    {
        return $this->startConditions()->all('id', 'title');
    }
}
