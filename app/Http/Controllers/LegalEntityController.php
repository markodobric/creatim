<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LegalEntity\StoreLegalEntityRequest;
use App\Http\Requests\LegalEntity\UpdateLegalEntityRequest;
use App\Models\LegalEntity;
use App\Repository\LegalEntity\LegalEntityRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LegalEntityController extends Controller
{
    public function __construct(private LegalEntityRepositoryInterface $legalEntityRepository) {}

    public function index(): View
    {
        return view('legal_entities.index', [
            'legal_entities' => $this->legalEntityRepository->all(),
        ]);
    }

    public function show(LegalEntity $legalEntity): View
    {
        return view('legal_entities.show', [
            'legal_entity' => $legalEntity,
        ]);
    }

    public function create(): View
    {
        return view('legal_entities.create');
    }

    public function store(StoreLegalEntityRequest $request): RedirectResponse
    {
        $this->legalEntityRepository->create($request->validated());

        return redirect(route('legal_entities.index'));
    }

    public function edit(LegalEntity $legalEntity): View
    {
        return view('legal_entities.edit', [
            'legal_entity' => $legalEntity,
        ]);
    }

    public function update(LegalEntity $legalEntity, UpdateLegalEntityRequest $request): RedirectResponse
    {
        $this->legalEntityRepository->update($request->validated(), $legalEntity->id);

        return redirect(route('legal_entities.index'));
    }

    public function delete(LegalEntity $legalEntity): RedirectResponse
    {
        $this->legalEntityRepository->delete($legalEntity->id);

        return redirect(route('legal_entities.index'));
    }
}
