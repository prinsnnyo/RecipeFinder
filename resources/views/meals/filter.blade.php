@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center text-white">Filter Meals</h2>

    {{-- Filter Form --}}
    <form action="{{ route('meals.filter') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <select name="category" class="form-control">
                    <option value="">All Categories</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat['strCategory'] }}" {{ request('category') == $cat['strCategory'] ? 'selected' : '' }}>
                            {{ $cat['strCategory'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <select name="cuisine" class="form-control">
                    <option value="">All Cuisines</option>
                    @foreach ($cuisines as $cui)
                        <option value="{{ $cui['strArea'] }}" {{ request('cuisine') == $cui['strArea'] ? 'selected' : '' }}>
                            {{ $cui['strArea'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary w-100" style="color: white;">Filter</button>
        </div>
    </form>

    {{-- Display Meals --}}
    @if (!empty($meals))
        <div class="row g-4">
            @foreach ($meals as $meal)
                <div class="col-md-4 col-sm-6">
                    <div class="shadow-sm card h-100">
                        <img src="{{ $meal['strMealThumb'] }}" class="card-img-top" alt="{{ $meal['strMeal'] }}">
                        <div class="text-center card-body">
                            {{-- Recipe Name --}}
                            <h5 class="text-black card-title">{{ $meal['strMeal'] }}</h5>

                            {{-- View Recipe Button --}}
                            <a href="#" class="mb-2 text-white btn btn-info">View Recipe</a>

                            {{-- Add to Favorites Button --}}
                            @auth
                                <form action="{{ route('favorites.store') }}" method="POST" class="mt-2">
                                    @csrf
                                    <input type="hidden" name="recipe_id" value="{{ $meal['idMeal'] }}">
                                    <input type="hidden" name="recipe_name" value="{{ $meal['strMeal'] }}">
                                    <input type="hidden" name="recipe_image" value="{{ $meal['strMealThumb'] }}">
                                    <button type="submit" class="text-white btn btn-warning">Add to Favorites</button>
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
        <p class="text-center text-white">No meals found. Try adjusting your filters.</p>
    @endif
</div>
@endsection
