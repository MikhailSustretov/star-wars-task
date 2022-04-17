<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeworldShowRequest;
use App\Services\HomeworldService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeworldController
{
    public HomeworldService $service;

    /**
     * @param HomeworldService $service
     */
    public function __construct(HomeworldService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('homeworld.index',
            ["homeworlds" => $this->service->index()]);
    }

    /**
     * @param HomeworldShowRequest $request
     * @return Application|Factory|View
     */
    public function show(HomeworldShowRequest $request)
    {
        $homeworld = $request->validated();

        extract($this->service->show($homeworld));

        return view('homeworld.index',
            [
                'column_names' => $column_names,
                "homeworlds" => $this->service->index(),
                'people' => $people,
                'homeworld_data' => $homeworld_data
            ]);
    }
}
