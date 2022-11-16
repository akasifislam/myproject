<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('backend.themes.index');
    }

    public function update(Request $request)
    {
        $theme = Theme::firstOrFail();
        $theme->update([
            'home_page' => $request->home_page,
        ]);

        return $this->index();
    }
}
