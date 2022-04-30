<?php

namespace Modules\BaseModulesObjects;

use Illuminate\Database\Eloquent\Model;

/**
 *This is the parent class of all repositories.
 *It is needed so that each repository is automatically loaded with its model when it is created.
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * CoreRepository constructor
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract function getModelClass(): mixed;

    /**
     *Returns a clone of the repository model
     *
     * @return mixed
     */
    protected function startConditions(): mixed
    {
        return clone $this->model;
    }
}
