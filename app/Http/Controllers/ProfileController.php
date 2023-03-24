<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Books;
use App\Models\ratings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function favourites(){
        $books = Books::with('favourites')->get();
        $user = Auth::user()->id;
        $rating = ratings::where('user_id', $user)->get();
        return view('profile.favourites',[
            'books' => $books,
            'pass' => 0,
            'pass1' => -1,
            'val' => 0,
            'rat' => 0,
            ]);
    }
    public function edit(Request $request): View
    {
        function makeInitialsFromSingleWord(string $name) : string
        {
            preg_match_all('#([A-Z]+)#', $name, $capitals);
            if (count($capitals[1]) >= 2) {
                return mb_substr(implode('', $capitals[1]), 0, 2, 'UTF-8');
            }
            return mb_strtoupper(mb_substr($name, 0, 2, 'UTF-8'), 'UTF-8');
        }
        $name = Auth::user()->name;
        $ini = makeInitialsFromSingleWord($name);
        return view('profile.edit', [
            'user' => $request->user(),
            'name' => $ini
        ]);
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
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
