<?php

namespace Modules\Person\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Modules\Film\Repositories\FilmRepository;
use Modules\Gender\Repositories\GenderRepository;
use Modules\Homeworld\Repositories\HomeworldRepository;
use Modules\Person\Entities\Person;
use Modules\Person\Http\Requests\PersonStoreRequest;
use Modules\Person\Http\Requests\PersonUpdateRequest;
use Modules\Person\Repositories\PersonRepository;
use Modules\Person\Services\PersonService;

/**
 * This is controller for CRUD work with Person entity
 */
class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PersonRepository $personRepository
     * @return Renderable
     */
    public function index(PersonRepository $personRepository): Renderable
    {
        $peopleData = $personRepository->getIndexData();

        $column_names = collect([
            'Name', 'Images', 'Height', 'Mass', 'Hair Color', 'Birth Year',
            'Gender', 'Homeworld', 'Films', 'Created', 'Url'
        ]);

        return view('person::index', compact('peopleData', 'column_names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param GenderRepository $genderRepository
     * @param FilmRepository $filmRepository
     * @param HomeworldRepository $homeworldRepository
     * @return Renderable
     */
    public function create(GenderRepository    $genderRepository, FilmRepository $filmRepository,
                           HomeworldRepository $homeworldRepository): Renderable
    {
        $genders = $genderRepository->getGenderNames();
        $films = $filmRepository->getFilmTitles();
        $homeworlds = $homeworldRepository->getHomeworldsNames();

        return view('person::create', compact('genders', 'films', 'homeworlds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonStoreRequest $request
     * @param PersonService $personService
     * @return RedirectResponse
     */
    public function store(PersonStoreRequest $request, PersonService $personService): RedirectResponse
    {
        $data = $request->all();

        $personService->storeNewPerson($data);

        return redirect()->back()->with('success', 'Your person has been successfully added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $personId
     * @param PersonService $personService
     * @return Renderable
     */
    public function edit($personId, PersonService $personService): Renderable
    {
        $editPageData = $personService->getEditPageData($personId);

        return view('person::edit', $editPageData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Person $person
     * @param PersonUpdateRequest $request
     * @param PersonService $personService
     * @return RedirectResponse
     */
    public function update(Person $person, PersonUpdateRequest $request, PersonService $personService): RedirectResponse
    {
        $data = $request->all();

        $personService->updatePerson($person, $data);

        return redirect()->back()->with('success', 'Your person has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param PersonRepository $personRepository
     * @return RedirectResponse
     */
    public function destroy(int $id, PersonRepository $personRepository): RedirectResponse
    {
        $personRepository->deletePerson($id);

        return back();
    }
}
