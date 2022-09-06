<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.pages.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:permissions',
            'guard_name' => 'required|max:100',
            'group_name' => 'required|max:100'
        ], [
            'name.requried' => 'Please give a permission name',
            'guard_name.requried' => 'Please give a guard name',
            'group_name.requried' => 'Please give a group name',
        ]);

        // Process Data
        Permission::create($request->all());
        $role_superadmin = Role::findById(1, 'admin');
        $role_superadmin->syncPermissions(Permission::all()->pluck('name'));

        session()->flash('success', 'Permission has been created !!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $permission = Permission::find($id);
        return view('backend.pages.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {

        // TODO: You can delete this in your local. This is for heroku publish.
        // This is only for Super Admin role,
        // so that no-one could delete or disable it by somehow.
        if ($id === 1) {
            session()->flash('error', 'Sorry !! You are not authorized to edit this permission !');
            return back();
        }

        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:permissions',
            'guard_name' => 'required|max:100',
            'group_name' => 'required|max:100'
        ], [
            'name.requried' => 'Please give a permission name',
            'guard_name.requried' => 'Please give a guard name',
            'group_name.requried' => 'Please give a group name',
        ]);

        $permission = Permission::find($id);

        if (!empty($permission)) {
            $permission->update($request->all());
        }

        session()->flash('success', 'Permission has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if (is_null($this->user) || !$this->user->can('role.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any permission !');
        }

        // TODO: You can delete this in your local. This is for heroku publish.
        // This is only for Super Admin role,
        // so that no-one could delete or disable it by somehow.
        if ($id === 1) {
            session()->flash('error', 'Sorry !! You are not authorized to delete this permission !');
            return back();
        }

        $permission = Permission::find($id);
        if (!is_null($permission)) {
            $permission->delete();
        }

        session()->flash('success', 'Permission has been deleted !!');
        return back();
    }
}
