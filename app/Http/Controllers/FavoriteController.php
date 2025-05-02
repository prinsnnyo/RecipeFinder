<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class FavoriteController extends Controller
{

    public function index()
{
    $favorites = Auth::user()->favorites;

    // Fetch additional details for each favorite
    $detailedFavorites = $favorites->map(function ($favorite) {
        $response = Http::withOptions(['verify' => false])
            ->get('https://www.themealdb.com/api/json/v1/1/lookup.php', [
                'i' => $favorite->recipe_id,
            ]);

        if ($response->successful() && !empty($response->json()['meals'])) {
            $meal = $response->json()['meals'][0];
            $favorite->recipe_source = $meal['strSource'] ?? null;
            $favorite->recipe_video = $meal['strYoutube'] ?? null;
        }

        return $favorite;
    });

    return view('favorites.index', ['favorites' => $detailedFavorites]);
}

    public function store(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required',
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
            'recipe_source' => $request->recipe_source, // Add recipe source URL
            'recipe_video' => $request->recipe_video,   // Add recipe video URL
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
