<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile page (NEW)
     */
    public function show(Request $request): View
    {
        return view('profile.show', [
            'user' => $request->user()
        ]);
    }

    /**
     * Display the user's profile edit form
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.show')->with('status', 'Profile updated successfully!');
    }

    /**
     * Update the user's profile image
     */
        public function updateImage(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = $request->user();
        
        // Store the image
        $path = $request->file('image')->store('profile-images', 'public');
        
        // Delete old image if exists
        if ($user->profile_image) {
            Storage::disk('public')->delete($user->profile_image);
        }

        $user->profile_image = $path;
        $user->save();

        return back()->with('status', 'Profile image updated!');
    }

    /**
     * Delete the user's profile image
     */
    public function deleteImage(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->profile_image) {
            Storage::delete('public/' . $user->profile_image);
            $user->profile_image = null;
            $user->save();
        }

        return back()->with('status', 'Profile image removed!');
    }

    /**
     * Delete the user's account
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Delete profile image if exists
        if ($user->profile_image) {
            Storage::delete('public/' . $user->profile_image);
        }

        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}