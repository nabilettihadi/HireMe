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
use App\Models\UserProfile;
class ProfileController extends Controller
{
    public function completeProfile(Request $request)
{
    // Validation des données
    // dd($request);
    $validatedData = $request->validate([
        'title' => 'required|string',
        'current_position' => 'required|string',
        'industry' => 'required|string',
        'address' => 'required|string',
        'contact_information' => 'required|string',
        'about' => 'required|string',
        'photo' => 'required|image',
    ]);
    // dd($validatedData);

    // Enregistrement de la photo
    if ($request->hasFile('photo')) {
        $image = request()->file('photo');
        $imageName = time() . '.' .$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    }

    // Création d'un nouvel enregistrement UserProfile
    $userProfile = new UserProfile();
    $userProfile->user_id = auth()->user()->id; 
    $userProfile->title = $validatedData['title'];
    $userProfile->current_position = $validatedData['current_position'];
    $userProfile->industry = $validatedData['industry'];
    $userProfile->address = $validatedData['address'];
    $userProfile->contact_information = $validatedData['contact_information'];
    $userProfile->about = $validatedData['about'];
    $userProfile->photo = $imageName;


    $userProfile->save();

    // Redirection avec un message flash
    return Redirect::route('users.dashboard')->with('success', 'Profil complété avec succès !');
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