<?php

namespace Modules\Image\Repositories;

use Modules\BaseModulesObjects\CoreRepository;
use Modules\Image\Entities\Image as Model;

class ImageRepository extends CoreRepository
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
     * @param array $array
     * @return mixed
     */
    public function createImage(array $array): mixed
    {
      return $this->startConditions()->create($array);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteImage(int $id): mixed
    {
        return $this->startConditions()->destroy($id);
    }

    /**
     * @param int $imageId
     * @return mixed
     */
    public function findImageEntity(int $imageId): mixed
    {
        return $this->startConditions()->find($imageId);
    }


}