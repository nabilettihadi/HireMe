<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Company;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\CurriculumVitae;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Check the selected role
        if ($request->role === 'company') {
            // Store company as user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'Entreprise',
            ]);
            Company::create([
                'user_id' => $user->id,
                'name' => $request->name,
            ]);
            // Redirect company to their specific dashboard
            return redirect()->route('companies.profileform');
        } elseif ($request->role === 'admin') {
            // Store user as admin
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'Administrateur',
            ]);
            // Redirect admin to their specific dashboard
            return redirect()->route('admin.dashboard');
        } else {
            // Store user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'Utilisateur',
            ]);

            $cv = CurriculumVitae::create([
                'user_id' => $user->id, // Associer le CV à l'utilisateur
                // Ajoutez d'autres champs si nécessaire
            ]);
            UserProfile::create([
                'user_id' => $user->id,
                // Add other fields if needed
            ]);
            // Redirect user to their specific dashboard
            return redirect()->route('profile.completeForm');
        }
    }
}
