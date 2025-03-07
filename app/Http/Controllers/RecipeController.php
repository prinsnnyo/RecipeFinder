<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{

    public function search(Request $request)
{
    $query = $request->input('query');
    $response = Http::withoutVerifying()->get("https://www.themealdb.com/api/json/v1/1/search.php?s={$query}");

    return view('recipes.index', ['recipes' => $response->json()['meals'] ?? []]);
}

}
