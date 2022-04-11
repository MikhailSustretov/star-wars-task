<?php

namespace App\Services;

use App\Models\Image;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Mockery\Exception;

class ImageService
{
    protected ImageRepository $imageRepository;

    /**
     * @param ImageRepository $imageRepository
     */
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }


    public function destroy(Image $image)
    {
        try {
            Db::beginTransaction();

            dd(File::delete($image->title));

            $deletedPerson = $this->imageRepository->delete($image->id);
            Db::commit();

        } catch (Exception $exception) {
            Db::rollBack();
            return $exception->getMessage();
        }
        return $deletedPerson;
    }
}
