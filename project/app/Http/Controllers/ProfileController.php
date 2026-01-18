<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
            'skills' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB max
        ]);

        // Handle CV upload
        if ($request->hasFile('cv')) {
            // Delete old CV if exists
            if ($user->cv_path) {
                Storage::disk('public')->delete($user->cv_path);
            }
            
            $cvPath = $request->file('cv')->store('cvs', 'public');
            $user->cv_path = $cvPath;
        }

        $user->phone = $request->phone;
        $user->bio = $request->bio;
        $user->skills = $request->skills;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }
}

