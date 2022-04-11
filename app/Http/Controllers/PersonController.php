<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonStoreRequest;
use App\Http\Requests\PersonUpdateImagesRequest;
use App\Http\Requests\PersonUpdateRequest;
use App\Models\Film;
use App\Models\Gender;
use App\Models\Homeworld;
use App\Models\Person;
use App\Services\PersonService;

class PersonController
{
    public PersonService $service;

    public function __construct(PersonService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        extract($this->service->index());

        return view('people.index', [
            'people' => $people,
            'column_names' => $column_names
        ]);
    }

    public function create()
    {
        extract($this->service->create());

        return view('people.create', [
            'homeworlds' => $homeworlds,
            'films' => $films,
            'genders' => $genders
        ])->with('success', 'Your person has been successfully added');
    }

    public function store(PersonStoreRequest $request)
    {
        $data = $request->validated();

        $store_result = $this->service->store($data);

        return $store_result instanceof Person ?
            redirect()->back()->with('success', 'Your person has been successfully added')
            : abort(404, $store_result);
    }

    public function edit(Person $person)
    {
        extract($this->service->edit($person));
        return view('people.edit', [
            'person' => $personData,
            'genders' => $genders,
            'films' => $films,
            'homeworlds' => $homeworlds
        ]);
    }

    public function update(Person $person, PersonUpdateRequest $request)
    {
        $updated_data = $request->validated();

        $update_result = $this->service->update($updated_data, $person);

        return $update_result instanceof Person ?
            redirect()->back()->with('success', 'Your person has been successfully updated')
            : abort(404, $update_result);
    }

    public function destroy(Person $person)
    {
        $this->service->destroy($person);
        return back();
    }

    public function updateImages(Person $person, PersonUpdateImagesRequest $request)
    {
        $data = $request->validated();

        $update_result = $this->service->updateImages($person, $data['image']);

        return is_array($update_result) ?
            redirect()->back()->with('success', "Your images have been successfully added to person $person->name")
            : abort(404, $update_result);
    }
}
