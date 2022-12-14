<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::SimplePaginate(10);
        return view('backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroup();
        return view('backend.roles.create', compact('permissions', 'permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => "required|unique:roles,name",
        ], [
            'name.required' => 'The role name field is required!',
            'name.unique' => 'This role has already been taken!'
        ]);

        try {
            $role = Role::create(['name' => $request->name]);
            if (!empty($request->permissions)) {
                $role->syncPermissions($request->permissions);
            }

            session()->flash('success', 'Role Created Successfully!');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroup();
        return view('backend.roles.edit', compact('permissions', 'permission_groups', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => "required|unique:roles,name,$id",
        ], [
            'name.required' => 'The role name field is required!',
            'name.unique' => 'This role has already been taken!'
        ]);

        try {
            $role = Role::findById($id);
            if (!empty($request->permissions)) {
                $role->name = $request->name;
                $role->save();
                $role->syncPermissions($request->permissions);
            }

            session()->flash('success', 'Role Updated Successfully!');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $role = Role::findById($id);
            if (!is_null($role)) {
                $role->delete();
            }
            session()->flash('success', 'Role Deleted Successfully!');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
