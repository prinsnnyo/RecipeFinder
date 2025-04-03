@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center text-white">Recipe & Meal Finder</h2>

    {{-- Recipe Search Form --}}
    <form action="{{ route('recipes.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search for a recipe..." required>
            <button type="submit" class="text-white btn btn-primary">Search</button>
        </div>
    </form>

    {{-- Meal Filter Form --}}
    <form action="{{ route('meals.filter') }}" method="GET" class="mb-4">
        <div class="input-group">
            <!-- <input type="text" name="search" class="form-control" placeholder="Filter meals..." value="{{ request('search') }}"> -->
            <button type="submit" class="text-white btn btn-primary">Filter</button>
        </div>
    </form>

    {{-- Display Recipes --}}
    @if(isset($recipes) && count($recipes) > 0)
        <h3 class="text-center text-white">Recipe Results</h3>
        <div class="row g-4">
            @foreach($recipes as $recipe)
                <div class="col-md-4 col-sm-6">
                    <div class="shadow-sm card h-100">
                        <img src="{{ $recipe['strMealThumb'] }}" class="card-img-top" alt="{{ $recipe['strMeal'] }}">
                        <div class="text-center card-body">
                            <h5 class="text-white card-title">{{ $recipe['strMeal'] }}</h5>
                            <a href="{{ $recipe['strSource'] }}" class="mb-2 text-white btn btn-info" target="_blank">View Recipe</a>

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
        <p class="mt-4 text-center text-white">No recipes found. Try searching again.</p>
    @endif

    {{-- Display Meals --}}
    @if (!empty($meals))
        <h3 class="mt-5 text-center text-white">Filtered Meals</h3>
        <div class="row g-4">
            @foreach ($meals as $meal)
                <div class="col-md-4 col-sm-6">
                    <div class="shadow-sm card h-100">
                        <img src="{{ $meal['strMealThumb'] }}" class="card-img-top" alt="{{ $meal['strMeal'] }}">
                        <div class="text-center card-body">
                            <h5 class="text-white card-title">{{ $meal['strMeal'] }}</h5>
                            <a href="{{ $meal['strSource'] }}" class="text-white btn btn-info" target="_blank">View Recipe</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="mt-4 text-center text-white">No meals found. Try filtering again.</p>
    @endif
</div>
@endsection

