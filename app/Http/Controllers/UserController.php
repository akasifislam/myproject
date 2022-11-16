<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Modules\Course\Entities\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
{
    use ValidatesRequests;

    public function dashboard()
    {
        // return view('backend.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', 1)->SimplePaginate(10);
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.users.create', compact('roles'));
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
            'name' => "required",
            'email' => "required|unique:users,email",
            'password' => "required|min:8",
            'roles' => "required",
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->has('image')) {
                $image = $request->image;
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs('public/user', $image, $fileName);
                $db_image = 'storage/user/' . $fileName;
                $user->image = $db_image;
            }
            $user->password = bcrypt($request->password);
            $user->save();

            if ($request->roles) {
                $user->assignRole($request->roles);
            }
            session()->flash('success', 'User Created Successfully!');
            return back();
        } catch (\Exception $e) {
            return responseError();
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
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.users.edit', compact('roles', 'user'));
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
            'name' => "required",
            'email' => "required|unique:users,email,$id",
            'roles' => "required",
        ]);

        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->has('image')) {
                $image = $request->image;
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs('public/user', $image, $fileName);
                $db_image = 'storage/user/' . $fileName;
                $user->image = $db_image;
            }
            if ($request->password) {
                $this->validate($request, [
                    'password' => "min:8",
                ]);
                $user->password = bcrypt($request->password);
            }
            $user->save();

            $user->roles()->detach();
            if ($request->roles) {
                $user->assignRole($request->roles);
            }
            session()->flash('success', 'User Updated Successfully!');
            return back();
        } catch (\Exception $e) {
            return responseError();
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
            $user = User::find($id);
            if (!is_null($user)) {
                $user->delete();
            }
            session()->flash('success', 'User Deleted Successfully!');
            return back();
        } catch (\Exception $e) {
            return responseError();
        }
    }
}
