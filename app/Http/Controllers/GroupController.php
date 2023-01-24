<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Group\CreateGroupAction;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Repository\Group\GroupRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class GroupController extends Controller
{
    public function __construct(private GroupRepositoryInterface $groupRepository)
    {
    }

    public function store(StoreGroupRequest $request): RedirectResponse
    {
        (new CreateGroupAction($this->groupRepository))($request->validated());

        return redirect(route('individuals.index'));
    }
}
