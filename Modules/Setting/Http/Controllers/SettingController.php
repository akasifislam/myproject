<?php

namespace Modules\Setting\Http\Controllers;

use App\Actions\Setting\UpdateSetting;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $settings = Setting::first();
        return view('setting::setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @return Renderable
     */
    public function show()
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Renderable
     */
    public function edit()
    {
        return view('setting::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param ReqSettingRequestuest $request
     * @param Setting $setting
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        try {
            $setting = UpdateSetting::update($request, $setting);
            if ($setting) {
                flashSuccess('Setting Updated Successfully');
                return redirect()->route('module.setting.index');
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
