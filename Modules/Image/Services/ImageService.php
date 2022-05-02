<?php

namespace Modules\Image\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
use Modules\Image\Repositories\ImageRepository;

/**
 * This is a class with business logic for working on the Image entity
 */
class ImageService
{

    /**
     * Image's soft delete
     *
     * @param int $imageId
     * @return mixed
     */
    public function destroy(int $imageId): mixed
    {
        try {
            Db::beginTransaction();

            $imageRepository = new ImageRepository();

            $deletedImage = $imageRepository->deleteImage($imageId);

            Db::commit();

        } catch (Exception $exception) {
            Db::rollBack();
            return $exception->getMessage();
        }
        return $deletedImage;
    }

    /**
     *Adds an image to the storage and its name to the table Images
     *
     * @param array $images
     * @param int $person
     */
    public function storeImages(array $images, int $person)
    {
        try {
            Db::beginTransaction();
            $imageRepository = new ImageRepository();
            foreach ($images as $image) {

                $imagePath = $image->store('person_images');

                $imageRepository->storeImage(['title' => $imagePath, 'person_id' => $person]);
            }
            Db::commit();

        } catch (Exception $exception) {
            Db::rollBack();
            abort(404, $exception->getMessage());
        }
    }
}