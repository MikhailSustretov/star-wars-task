<?php

namespace App\Repositories;

use App\Models\Image;
use App\Validators\ImageRepositoryValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ImageRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ImageRepositoryEloquent extends BaseRepository implements ImageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Image::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
