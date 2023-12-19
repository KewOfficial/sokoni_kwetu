<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('user.show', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function updateUserProfile(Request $request)
    {
        $user = auth()->user();
    
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Add more fields as needed
        ]);
    
        // Update user profile
        User::where('id', $user->id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Add more fields as needed
        ]);
    
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }
}    
