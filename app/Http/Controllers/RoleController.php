<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Resources\RoleResource;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\PermissionResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('role_access');

        $roles = RoleResource::collection(Role::with('permissions')->get());

        return inertia('Roles/index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('role_create');
        $permissions = PermissionResource::collection(Permission::all());
        //dd($permissions);
        return inertia('Roles/create', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        Gate::authorize('role_create');
        $validated = $request->validated();

        $role = Role::create(Arr::except($validated, ['selectedPermissions']));

        $role->permissions()->sync($validated['selectedPermissions']);

        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        Gate::authorize('role_edit');
        $role->load('permissions');
        //dd('role', $role);
        return inertia('Roles/edit', [
            'role' => RoleResource::make($role),
            'permissions' => PermissionResource::collection(Permission::all())
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
         Gate::authorize('role_edit');

        $validated = $request->validated();

        $role->update(Arr::except($validated, ['selectedPermissions']));

        $role->permissions()->sync($validated['selectedPermissions']);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        Gate::authorize('role_delete');
        $role->delete();

        return redirect()->route('roles.index');
    }
}
