<?php

namespace Modules\BaseModulesObjects;

use Illuminate\Database\Eloquent\Model;

/**
 *
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
     * @return mixed
     */
    protected function startConditions(): mixed
    {
        return clone $this->model;
    }
}
