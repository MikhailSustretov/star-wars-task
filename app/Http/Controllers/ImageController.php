<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use App\Models\Image;

class ImageController extends Controller
{

    public ImageService $service;

    /**
     * @param ImageService $service
     */
    public function __construct(ImageService $service)
    {
        $this->service = $service;
    }

    public function destroy(Image $image)
    {
        if ($this->service->destroy($image)) {
            echo json_encode(['ok' => true]);
        }
    }
}
