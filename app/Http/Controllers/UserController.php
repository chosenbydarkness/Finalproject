<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $preferences = Auth::user()->preferences->pluck('preference')->toArray();
        return view('profile.edit', compact('preferences'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect()->route('profile.edit')->with('status', 'Profile updated successfully.');
    }

    public function updatePreferences(Request $request)
    {
        $user = Auth::user();
        $preferences = array_filter(array_map('trim', explode(',', $request->preferences)));
        
        $preferenceIds = [];
        foreach ($preferences as $preferenceName) {
            $preference = Preference::firstOrCreate(['preference' => $preferenceName]);
            $preferenceIds[] = $preference->id;
        }
        
        $user->preferences()->sync($preferenceIds);
        return redirect()->route('profile.edit')->with('status', 'Preferences updated successfully.');
    }
}









