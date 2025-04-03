<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function index()
{
    // Retrieve the authenticated user's favorites
    $favorites = Auth::user()->favorites;

    // Pass the favorites to the view
    return view('favorites.index', compact('favorites'));
}

    public function store(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required', // Removed the `exists:recipes,id` rule
        ]);

        // Check if the recipe is already in favorites
        $exists = Favorite::where('user_id', Auth::id())
                          ->where('recipe_id', $request->recipe_id)
                          ->exists();

        if ($exists) {
            return back()->with('error', 'Recipe is already in your favorites!');
        }

        // Save the recipe to the favorites
        Favorite::create([
            'user_id' => Auth::id(),
            'recipe_id' => $request->recipe_id,
            'recipe_name' => $request->recipe_name, 
            'recipe_image' => $request->recipe_image,
        ]);

        return redirect()->route('favorites.index')->with('success', 'Recipe added to favorites!');
    }



    public function destroy(Favorite $favorite)
    {
        if ($favorite->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $favorite->delete();
        return back()->with('success', 'Recipe removed from favorites.');
    }
}
