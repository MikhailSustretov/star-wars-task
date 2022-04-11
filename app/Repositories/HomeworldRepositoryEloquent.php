<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\HomeworldRepository;
use App\Models\Homeworld;
use App\Validators\HomeworldValidator;

/**
 * Class HomeworldRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HomeworldRepositoryEloquent extends BaseRepository implements HomeworldRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Homeworld::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
