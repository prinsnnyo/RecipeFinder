<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MealController extends Controller
{

    public function filter(Request $request)
    {
        // Retrieve filters from the request
        $category = $request->input('category');
        $cuisine = $request->input('cuisine');

        // Fetch meals based on filters
        $meals = $this->fetchMeals($category, $cuisine);

        // Fetch categories and cuisines for dropdowns
        $categories = $this->fetchCategories();
        $cuisines = $this->fetchCuisines();

        // Pass data to the view
        return view('meals.filter', compact('meals', 'categories', 'cuisines', 'category', 'cuisine'));
    }

    private function fetchMeals($category, $cuisine)
    {
        // Fetch meals from an external API with SSL disabled
        $response = Http::withOptions(['verify' => false])
            ->get('https://www.themealdb.com/api/json/v1/1/filter.php', [
                'c' => $category,
                'a' => $cuisine,
            ]);

        // Log the response to check the API result
        Log::info('API Response:', ['response' => $response->body()]);

        // Check if the response is successful and contains the 'meals' key
        if ($response->successful()) {
            $meals = $response->json()['meals'] ?? [];

            // Ensure the data is an array before returning
            return is_array($meals) ? $meals : [];
        }

        return [];
    }

    /**
     * Fetch categories for the dropdown.
     */
    private function fetchCategories()
    {
        // Fetch categories with SSL verification disabled for testing
        $response = Http::withOptions(['verify' => false])
            ->get('https://www.themealdb.com/api/json/v1/1/list.php?c=list');

        // Return categories if the response is successful
        return $response->successful() ? $response->json()['meals'] ?? [] : [];
    }

    /**
     * Fetch cuisines for the dropdown.
     */
    private function fetchCuisines()
    {
        // Fetch cuisines with SSL verification disabled for testing
        $response = Http::withOptions(['verify' => false])
            ->get('https://www.themealdb.com/api/json/v1/1/list.php?a=list');

        // Return cuisines if the response is successful
        return $response->successful() ? $response->json()['meals'] ?? [] : [];
    }
}
