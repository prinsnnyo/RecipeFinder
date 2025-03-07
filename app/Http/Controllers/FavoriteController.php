<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->favorites;
        return view('favorites.index', compact('favorites'));
    }

    public function store(Request $request)
    {
        Favorite::create([
            'user_id' => Auth::id(),
            'recipe_name' => $request->recipe_name,
            'recipe_image' => $request->recipe_image,
        ]);

        return back()->with('success', 'Recipe added to favorites!');
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
        return back()->with('success', 'Recipe removed from favorites.');
    }
}
