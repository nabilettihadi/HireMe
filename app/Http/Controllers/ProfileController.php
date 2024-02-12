<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;

use App\Models\Admin;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
class ProfileController extends Controller
{   public function completeProfile()
    {
        $user = Auth::user();
        
        if ($user instanceof Company) {
            // Rediriger l'utilisateur vers la page de l'entreprise s'il est une entreprise
            return redirect()->route('company.profile');
        } else {
            // Rediriger l'utilisateur vers sa propre page de profil
            return redirect()->route('user.profile');
        }
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        // Vérifier si l'utilisateur est un administrateur
        if ($user instanceof Admin) {
            return view('admin.profile.edit', compact('user'));
        }

        // Vérifier si l'utilisateur est une entreprise
        if ($user instanceof Company) {
            return view('company.profile.edit', compact('user'));
        }

        // Si l'utilisateur est un utilisateur standard
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
