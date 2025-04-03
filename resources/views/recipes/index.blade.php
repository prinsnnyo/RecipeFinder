@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center text-white">Recipe Finder</h2> <!-- Changed text to white -->

    <!-- Search Form -->
    <form action="{{ route('recipes.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search for a recipe..." required>
            <button type="submit" class="text-white btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Display Recipes -->
    @if(isset($recipes) && count($recipes) > 0)
        <div class="row g-4">
            @foreach($recipes as $recipe)
                <div class="col-md-4 col-sm-6">
                    <div class="shadow-sm card h-100">
                        <img src="{{ $recipe['strMealThumb'] }}" class="card-img-top" alt="{{ $recipe['strMeal'] }}">
                        <div class="text-center card-body">
                            <h5 class="text-white card-title">{{ $recipe['strMeal'] }}</h5> <!-- Changed text to white -->
                            <a href="{{ $recipe['strSource'] }}" class="mb-2 text-white btn btn-info" target="_blank">View Recipe</a>

                            <!-- Favorites Form -->
                            @auth
                                <form action="{{ route('favorites.store') }}" method="POST" class="mt-2">
                                    @csrf
                                    <input type="hidden" name="recipe_id" value="{{ $recipe['idMeal'] }}">
                                    <input type="hidden" name="recipe_name" value="{{ $recipe['strMeal'] }}">
                                    <input type="hidden" name="recipe_image" value="{{ $recipe['strMealThumb'] }}">
                                    <button type="submit" class="text-white btn btn-warning">Save to Favorites</button>
                                </form>
                            @else
                                <p class="mt-2 text-danger">
                                    Please <a href="{{ route('login') }}">log in</a> to save recipes to your favorites.
                                </p>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="mt-4 text-center text-white">No recipes found. Try searching again.</p> <!-- Changed text to white -->
    @endif
</div>
@endsection

