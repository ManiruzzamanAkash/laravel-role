<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index(): Renderable
    {
        $this->checkAuthorization(auth()->user(), ['role.view']);

        return view('backend.pages.roles.index', [
            'roles' => Role::all(),
        ]);
    }

    public function create(): Renderable
    {
        $this->checkAuthorization(auth()->user(), ['role.create']);

        return view('backend.pages.roles.create', [
            'all_permissions' => Permission::all(),
            'permission_groups' => User::getpermissionGroups(),
        ]);
    }

    public function store(RoleRequest $request): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['role.create']);

        // Process Data.
        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);

        // $role = DB::table('roles')->where('name', $request->name)->first();
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        session()->flash('success', 'Role has been created.');
        return redirect()->route('admin.roles.index');
    }

    public function edit(int $id): Renderable|RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['role.edit']);

        $role = Role::findById($id, 'admin');
        if (!$role) {
            session()->flash('error', 'Role not found.');
            return back();
        }

        return view('backend.pages.roles.edit', [
            'role' => $role,
            'all_permissions' => Permission::all(),
            'permission_groups' => User::getpermissionGroups(),
        ]);
    }

    public function update(RoleRequest $request, int $id): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['role.edit']);

        $role = Role::findById($id, 'admin');
        if (!$role) {
            session()->flash('error', 'Role not found.');
            return back();
        }

        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }

        session()->flash('success', 'Role has been updated.');
        return back();
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['role.delete']);

        $role = Role::findById($id, 'admin');
        if (!$role) {
            session()->flash('error', 'Role not found.');
            return back();
        }

        $role->delete();
        session()->flash('success', 'Role has been deleted.');
        return redirect()->route('admin.roles.index');
    }
}
