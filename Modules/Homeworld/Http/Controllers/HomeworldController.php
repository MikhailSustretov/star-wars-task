<?php

namespace Modules\Homeworld\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Homeworld\Http\Requests\HomeworldShowRequest;
use Modules\Homeworld\Repositories\HomeworldRepository;
use Modules\Homeworld\Service\HomeworldService;

class HomeworldController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param HomeworldRepository $homeworldRepository
     * @return Renderable
     */
    public function index(HomeworldRepository $homeworldRepository): Renderable
    {
        $homeworlds = $homeworldRepository->getHomeworldsNames();

        return view('homeworld::index', compact('homeworlds'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('homeworld::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @param HomeworldService $homeworldService
     * @return Renderable
     */
    public function show(HomeworldShowRequest $homeworldShowRequest, HomeworldService $homeworldService): Renderable
    {
        $data = $homeworldShowRequest->all();

        $showPageData = $homeworldService->getShowPageData($data['homeworld_id']);

        return view('homeworld::show', $showPageData);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('homeworld::edit');
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
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
