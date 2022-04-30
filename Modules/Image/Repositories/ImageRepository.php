<?php

namespace Modules\Image\Repositories;

use Modules\BaseModulesObjects\CoreRepository;
use Modules\Image\Entities\Image as Model;

/**
 * This is a repository with special queries on the Images table
 */
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
     * Stores image to table
     *
     * @param array $array
     * @return mixed
     */
    public function storeImage(array $array): mixed
    {
      return $this->startConditions()->create($array);
    }

    /**
     * Deletes image from table
     *
     * @param int $id
     * @return mixed
     */
    public function deleteImage(int $id): mixed
    {
        return $this->startConditions()->destroy($id);
    }

    /**
     * Get images data from table
     *
     * @param int $imageId
     * @return mixed
     */
    public function getImageEntity(int $imageId): mixed
    {
        return $this->startConditions()->find($imageId);
    }


}