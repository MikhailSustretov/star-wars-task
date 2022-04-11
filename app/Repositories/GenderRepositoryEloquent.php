<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GenderRepository;
use App\Models\Gender;
use App\Validators\GenderValidator;

/**
 * Class GenderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class GenderRepositoryEloquent extends BaseRepository implements GenderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Gender::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
