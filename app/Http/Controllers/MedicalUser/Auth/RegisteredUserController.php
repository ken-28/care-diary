<?php

namespace App\Http\Controllers\MedicalUser\Auth;

use App\Http\Controllers\Controller;
use App\Models\MedicalUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('medical_user.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255'],
            'birth' => ['required', 'date'],
            'sex' => ['required', 'integer'],
            'job' => ['required', 'integer'],
            'image' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = MedicalUser::create([
            'name' => $request->name,
            'name_kana' => $request->name_kana,
            'birth' => $request->birth,
            'sex' => $request->sex,
            'job' => $request->job,
            'image' => $request->image,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard('medical_user')->login($user);

        return redirect(RouteServiceProvider::MEDICAL_USER_HOME);
    }
}
