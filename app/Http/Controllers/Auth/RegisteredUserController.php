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
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register')
            ->with(['title' => 'Daftar']);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'telepon'  => ['required', 'string', 'max:255'],
            'alamat'   => ['required'],
        ]);

        $user = User::create([
            'name'     => $request->input('nama'),
            'slug'     => Str::slug($request->input('nama')),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'username' => $request->input('username'),
            'telepon'  => $request->input('telepon'),
            'alamat'   => $request->input('alamat'),
            'role'     => 'pembaca',
        ]);

        try {
            event(new Registered($user));
    
            Auth::login($user);
    
            toast('Berhasil mendaftar!', 'success');

            return redirect(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            dd($request, $user, $e);

            return redirect()->route('register');
        }
    }
}
