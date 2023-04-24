<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
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
        $departments = Department::all();
        return view('auth.register', compact('departments'));
    }

    public function professor(): View
    {
        $departments = Department::all();
        return view('auth.register-professor', compact('departments'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
        {
        $request->validate([

            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'regex:/(.*)@umak.edu.ph/i', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::min(8)->mixedCase()->numbers()->symbols()],
            'id_number' => ['required', 'string', 'max:255', 'unique:'.User::class ],
            'department' => ['required', 'string', 'max:255'],
            'year_level' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
        ]);

        
        $role = "student";
        $user_type = "N/A";

        $user = User::create([
            'name' => $request->first_name." ".$request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_number' => $request->id_number,
            'department' => $request->department,
            'year_level' => $request->year_level,
            'gender' => $request->gender,
            'candidate_role' => $role,
            'user_type' => $user_type,
        ])->assignRole('student');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function storeProfessor(Request $request): RedirectResponse
     {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'regex:/(.*)@umak.edu.ph/i', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::min(8)->mixedCase()->numbers()->symbols()],
            'id_number' => ['required', 'string', 'max:255', 'unique:'.User::class ],
            'department' => ['required', 'string', 'max:255'],
            'user_type' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
        ]);

        $role = "professor";
        $year_level = "N/A";

        $user = User::create([
            'name' => $request->first_name." ".$request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_number' => $request->id_number,
            'department' => $request->department,
            'year_level' => $year_level,
            'gender' => $request->gender,
            'candidate_role' => $role,
            'user_type' => $request->user_type,
        ])->assignRole('professor');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
