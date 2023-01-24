<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Individual\StoreIndividualRequest;
use App\Http\Requests\Individual\UpdateIndividualRequest;
use App\Models\Individual;
use App\Repository\Individual\IndividualRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IndividualController extends Controller
{
    public function __construct(private IndividualRepositoryInterface $individualRepository) {}

    public function index(): View
    {
        return view('individuals.index', [
            'individuals' => $this->individualRepository->all(),
        ]);
    }

    public function show(Individual $individual): View
    {
        return view('individuals.show', [
            'individual' => $individual,
        ]);
    }

    public function create(): View
    {
        return view('individuals.create');
    }

    public function store(StoreIndividualRequest $request): RedirectResponse
    {
        $this->individualRepository->create($request->validated());

        return redirect(route('individuals.index'));
    }

    public function edit(Individual $individual): View
    {
        return view('individuals.edit', [
            'individual' => $individual,
        ]);
    }

    public function update(Individual $individual, UpdateIndividualRequest $request): RedirectResponse
    {
        $this->individualRepository->update($request->validated(), $individual->id);

        return redirect(route('individuals.index'));
    }

    public function delete(Individual $individual): RedirectResponse
    {
        $this->individualRepository->delete($individual->id);

        return redirect(route('individuals.index'));
    }
}
