<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Actions\Admin\CreateAdmin;
use App\Actions\Admin\DeleteAdmin;
use App\Actions\Admin\UpdateAdmin;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Http\Requests\AdminFormRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $admins = Admin::where('id', '!=', auth('admin')->id())->latest()->get();
        return view('admin::index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AdminFormRequest $request)
    {
        try {
            $admin = CreateAdmin::create($request);

            if ($admin) {
                flashSuccess('Admin Added Successfully');
                return back();
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Admin $admin)
    {
        return view('admin::show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Admin $admin)
    {
        return view('admin::edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(AdminFormRequest $request, Admin $admin)
    {
        try {
            $admin = UpdateAdmin::update($request, $admin);

            if ($admin) {
                flashSuccess('Admin Updated Successfully');
                return redirect()->route('module.admin.index');
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Admin $admin)
    {
        try {
            $admin = DeleteAdmin::delete($admin);

            if ($admin) {
                flashSuccess('Admin Deleted Successfully');
                return back();
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
