<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
class ProfileController extends Controller
{
    /**
     * Complete user profile.
     */
    public function completeProfile(Request $request)
{
    // Validez les données de la requête
    $validatedData = $request->validate([
        'title' => 'required|string',
        'current_position' => 'required|string',
        'industry' => 'required|string',
        'address' => 'required|string',
        'contact_information' => 'required|string',
        'about' => 'required|string',
        'photo' => 'required|image',
    ]);

    // Enregistrement de la photo
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    }

    
    $userId = Session::get('user_id');
    // Recherchez ou créez le profil utilisateur en fonction de l'ID de l'utilisateur
    $userProfile = UserProfile::firstOrNew(['user_id' => $userId]);
    
    // Mise à jour ou création du profil utilisateur
    $userProfile->user_id = $userId;
    $userProfile->title = $validatedData['title'];
    $userProfile->current_position = $validatedData['current_position'];
    $userProfile->industry = $validatedData['industry'];
    $userProfile->address = $validatedData['address'];
    $userProfile->contact_information = $validatedData['contact_information'];
    $userProfile->about = $validatedData['about'];
    $userProfile->photo = $imageName ?? null; // Utilisez le nom de l'image si disponible

    $userProfile->save();

    return redirect()->route('users.dashboard')->with('success', 'Profil complété avec succès !');
}

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        // Vérifier si l'utilisateur est un administrateur
        if ($user->isAdmin()) {
            return view('admin.profile.edit', compact('user'));
        }

        // Vérifier si l'utilisateur est une entreprise
        if ($user->isCompany()) {
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
        $user = Auth::user();

        $validatedData = $request->validated();

        // Enregistrement de la photo
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['photo'] = $imageName;
        }

        // Rechercher le profil utilisateur existant
        $userProfile = UserProfile::where('user_id', $user->id)->first();

        // Mettre à jour ou créer un nouveau profil utilisateur
        if ($userProfile) {
            $userProfile->update($validatedData);
        } else {
            $userProfile = new UserProfile($validatedData);
            $userProfile->user_id = $user->id;
            $userProfile->save();
        }

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
