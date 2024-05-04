<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Audiens;
use App\Models\Kreators;
use App\Models\User;
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Simpan user ke dalam tabel audiens
        $newAudience = Audiens::create([
            'username' => $request->name,
            'noHP' => NULL,
            'email' => $request->email,
            'profilePict' => NULL,
        ]);
        // Simpan user ke dalam tabel kreators
        $newCreator = Kreators::create([
            'username' => $request->name,
            'noHP' => NULL,
            'email' => $request->email,
            'profilePict' => NULL,
            'rekening' => NULL,
        ]);

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
