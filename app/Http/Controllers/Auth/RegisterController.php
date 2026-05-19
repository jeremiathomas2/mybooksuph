<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'gender' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'baptism' => ['required', 'boolean'],
            'user_type' => ['required', 'string'],
            
            // Transport Company info
            'company_name' => ['required_if:user_type,transport_company', 'nullable', 'string'],
            'company_reg_number' => ['required_if:user_type,transport_company', 'nullable', 'string'],
            'transport_routes' => ['required_if:user_type,transport_company', 'nullable', 'string'],
            
            // Evangelist info
            'evangelist_ministry' => ['required_if:user_type,evangelist', 'nullable', 'string'],
            'evangelist_region' => ['required_if:user_type,evangelist', 'nullable', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'baptism' => $request->baptism,
            'user_type' => $request->user_type,
            'company_name' => $request->company_name,
            'company_reg_number' => $request->company_reg_number,
            'transport_routes' => $request->transport_routes,
            'evangelist_ministry' => $request->evangelist_ministry,
            'evangelist_region' => $request->evangelist_region,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
