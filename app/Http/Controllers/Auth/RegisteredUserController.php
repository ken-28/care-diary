<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('auth.register');
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
            'image' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.FamilyUser::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $family_user = FamilyUser::create([
            'name' => $request->name,
            'name_kana' => $request->name_kana,
            'birth' => $request->birth,
            'sex' => $request->sex,
            'image' => $request->image,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($family_user));

        Auth::login($family_user); 

        return redirect(RouteServiceProvider::FAMILY_USER_HOME);
    }
}
