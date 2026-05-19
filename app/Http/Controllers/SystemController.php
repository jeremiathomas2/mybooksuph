<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function system()
    {
        return view('pages.settings.system');
    }

    public function updateSettings(Request $request)
    {
        $settings = $request->except('_token');
        foreach ($settings as $key => $value) {
            \App\Models\Setting::set($key, $value);
        }
        return back()->with('success', 'Settings updated successfully!');
    }
}
