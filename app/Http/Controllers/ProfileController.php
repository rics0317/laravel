<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // Show profile page
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    // Update Email with Current Password Check
    public function update(Request $request)
    {
        // Validate the fields
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'current_password' => 'required',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Update the email
        $user->email = $request->email;
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Email updated successfully.');
    }

    // Update Password
    public function updatePassword(Request $request)
    {
        // Validate password fields
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Update the password
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    // Delete Account
    public function destroy(Request $request)
    {
        // Validate password field
        $request->validate([
            'password' => 'required',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the password is correct
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password is incorrect']);
        }

        // Delete the user's account
        $user->delete();

        // Redirect to home or login after account deletion
        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}