<?php

namespace Modules\Image\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Image\Entities\Image;
use Modules\Image\Http\Requests\ImageStoreRequest;
use Modules\Image\Repositories\ImageRepository;
use Modules\Image\Services\ImageService;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('image::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('image::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ImageStoreRequest $imageStoreRequest
     * @param ImageService $imageService
     * @return RedirectResponse
     */
    public function store(ImageStoreRequest $imageStoreRequest, ImageService $imageService): RedirectResponse
    {
        $imagesStoreData = $imageStoreRequest->all();

        $imageService->storeImages($imagesStoreData['image'], $imagesStoreData['person']);

        return redirect()->back()->with('success', "Your images have been successfully added to person");
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('image::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('image::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $imageId
     * @param ImageService $imageService
     * @return JsonResponse
     */
    public function destroy(int $imageId, ImageService $imageService): JsonResponse
    {
        if ($imageService->destroy($imageId)) {
            return response()->json(['ok' => true]);
        } else {
            return response()->json(['ok' => false]);
        }
    }
}
