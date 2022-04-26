<?php

namespace Modules\Image\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
use Modules\Image\Repositories\ImageRepository;

class ImageService
{

    /**
     * @param int $imageId
     * @return mixed
     */
    public function destroy(int $imageId): mixed
    {
        try {
            Db::beginTransaction();

            $imageRepository = new ImageRepository();
            $image = $imageRepository->findImageEntity($imageId);

            Storage::delete($image->title);

            $deletedImage = $imageRepository->deleteImage($imageId);
            Db::commit();

        } catch (Exception $exception) {
            Db::rollBack();
            return $exception->getMessage();
        }
        return $deletedImage;
    }

    /**
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

                $imageRepository->createImage(['title' => $imagePath, 'person_id' => $person]);
            }
            Db::commit();

        } catch (Exception $exception) {
            Db::rollBack();
            abort(404, $exception->getMessage());
        }
    }
}