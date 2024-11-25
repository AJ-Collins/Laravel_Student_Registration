<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
public function showProfile($id) {
    $user = User::find($id);
    if (!$user) {
        return redirect()->route('home')->with('error', 'User not found');
    }
    return view('profile', compact('user'));
    }

    public function updateProfile(Request $request) {
        $user = auth()->user();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'course' => 'nullable|string',
            'admission_number' => 'nullable|string',
            'year' => 'nullable|string',
            'semester' => 'nullable|string',
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->course = $request->course;
        $user->admission_number = $request->admission_number;
        $user->year = $request->year;
        $user->semester = $request->semester;
        $user->save();
    
        return response()->json(['message' => 'Profile updated successfully!']);
    }
}
