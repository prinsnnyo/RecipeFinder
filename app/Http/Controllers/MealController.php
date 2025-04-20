<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MealController extends Controller
{
    public function filter(Request $request)
    {
        $category = $request->input('category');
        $cuisine = $request->input('cuisine');

        // Fetch filtered meals with SSL verification disabled
        $response = Http::withOptions(['verify' => false])
            ->get('https://www.themealdb.com/api/json/v1/1/filter.php', [
                'c' => $category,
                'a' => $cuisine,
            ]);

        $meals = $response->successful() ? $response->json()['meals'] ?? [] : [];

        // Ensure $meals is an array
        if (!is_array($meals)) {
            $meals = [];
        }

        // Fetch full details for each meal with SSL verification disabled
        $detailedMeals = [];
        foreach ($meals as $meal) {
            $detailResponse = Http::withOptions(['verify' => false])
                ->get('https://www.themealdb.com/api/json/v1/1/lookup.php', [
                    'i' => $meal['idMeal'],
                ]);

            if ($detailResponse->successful() && !empty($detailResponse->json()['meals'])) {
                $detailedMeals[] = $detailResponse->json()['meals'][0];
            }
        }

        // Fetch categories and cuisines for dropdowns
        $categories = $this->fetchCategories();
        $cuisines = $this->fetchCuisines();

        return view('meals.filter', compact('detailedMeals', 'categories', 'cuisines'));
    }

    private function fetchCategories()
    {
        // Fetch categories with SSL verification disabled
        $response = Http::withOptions(['verify' => false])
            ->get('https://www.themealdb.com/api/json/v1/1/list.php?c=list');

        return $response->successful() ? $response->json()['meals'] ?? [] : [];
    }

    private function fetchCuisines()
    {
        // Fetch cuisines with SSL verification disabled
        $response = Http::withOptions(['verify' => false])
            ->get('https://www.themealdb.com/api/json/v1/1/list.php?a=list');

        return $response->successful() ? $response->json()['meals'] ?? [] : [];
    }
}
