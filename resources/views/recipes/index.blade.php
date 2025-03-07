@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Recipe Finder</h2>

    <form action="{{ route('recipes.search') }}" method="GET" class="mb-4">
        <input type="text" name="query" class="form-control" placeholder="Search for a recipe..." required>
        <button type="submit" class="mt-2 btn btn-primary">Search</button>
    </form>

    @if(isset($recipes) && count($recipes) > 0)
        <div class="flex-wrap gap-3 row d-flex justify-content-center">
            @foreach($recipes as $recipe)
                <div class="col-md-4 col-sm-6">
                    <div class="border-0 shadow-sm card">
                        <img src="{{ $recipe['strMealThumb'] }}" class="card-img-top" alt="{{ $recipe['strMeal'] }}">
                        <div class="text-center card-body">
                            <h5 class="card-title">{{ $recipe['strMeal'] }}</h5>
                            <a href="{{ $recipe['strSource'] }}" class="btn btn-info" target="_blank">View Recipe</a>

                            <!-- Favorites Form -->
                            @auth  {{-- Only show the button if the user is logged in --}}
                            <form action="{{ route('favorites.store') }}" method="POST" class="mt-2">
                                @csrf
                                <input type="hidden" name="recipe_name" value="{{ $recipe['strMeal'] }}">
                                <input type="hidden" name="recipe_image" value="{{ $recipe['strMealThumb'] }}">
                                <button type="submit" class="btn btn-warning">Save to Favorites</button>
                            </form>
                            @endauth

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">No recipes found. Try searching again.</p>
    @endif
</div>
@endsection

