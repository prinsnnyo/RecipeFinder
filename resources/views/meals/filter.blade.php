<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

@extends('layouts.app')

@section('content')
<div class="container py-5 bg-white">
<h1 class="text-center mb-5 text-dark" style="font-family: 'Poppins', sans-serif; font-size: 2.8rem; font-weight: 700;">
    Discover Delicious Meals
</h1>


    {{-- Filter Form --}}
    <form action="{{ route('meals.filter') }}" method="GET" class="mb-6 p-5 rounded-5 shadow-lg" style="max-width: 900px; margin: 0 auto; background-color: #AA5486;">
    <div class="row g-3 align-items-end text-white">
        <div class="col-md-5">
            <label class="form-label fw-semibold">Category</label>
            <select name="category" class="form-select p-3 rounded-4 shadow-sm text-dark">
                <option value="">All Categories</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat['strCategory'] }}" {{ request('category') == $cat['strCategory'] ? 'selected' : '' }}>
                        {{ $cat['strCategory'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-5">
            <label class="form-label fw-semibold">Cuisine</label>
            <select name="cuisine" class="form-select p-3 rounded-4 shadow-sm text-dark">
                <option value="">All Cuisines</option>
                @foreach ($cuisines as $cui)
                    <option value="{{ $cui['strArea'] }}" {{ request('cuisine') == $cui['strArea'] ? 'selected' : '' }}>
                        {{ $cui['strArea'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-light rounded-pill fw-bold shadow py-1 w-100 mt-4">
                <i class="fas fa-search me-1"></i> Filter Meals
            </button>
        </div>
    </div>
</form>


    {{-- Display Meals --}}
    @if (!empty($detailedMeals))
        <div class="row g-4 mt-4">
            @foreach ($detailedMeals as $meal)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 rounded-4 shadow-lg border-0 meal-card">
                        <img src="{{ $meal['strMealThumb'] }}" class="card-img-top" alt="{{ $meal['strMeal'] }}" style="object-fit: cover; height: 230px;">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold text-dark" style="font-size: 1.2rem;">{{ $meal['strMeal'] }}</h5>

                            @if (!empty($meal['strSource']))
                                <a href="{{ $meal['strSource'] }}" target="_blank" class="btn rounded-pill px-4 mb-2" style="background-color: #AA5486; color: white;"><i class="fas fa-book-open me-1"></i> View Recipe</a>
                            @elseif (!empty($meal['strYoutube']))
                                <a href="{{ $meal['strYoutube'] }}" target="_blank" class="btn rounded-pill px-4 mb-2" > <i class="fas fa-play me-1"></i> Watch Video</a>
                            @else
                                <p class="mb-2" style="color: #AA5486;">Recipe source not available.</p>
                            @endif

                            @auth
                                <form action="{{ route('favorites.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="recipe_id" value="{{ $meal['idMeal'] }}">
                                    <input type="hidden" name="recipe_name" value="{{ $meal['strMeal'] }}">
                                    <input type="hidden" name="recipe_image" value="{{ $meal['strMealThumb'] }}">
                                    <button type="submit" class="btn btn-warning rounded-pill text-white fw-bold px-4">
                                    <i class="fas fa-heart me-1"></i> Favorite
                                    </button>
                                </form>
                            @else
                                <p class="mt-2 text-danger">
                                    Please <a href="{{ route('login') }}" class="fw-bold text-info">log in</a> to save recipes.
                                </p>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-dark mt-5 fs-5"><i class="fas fa-frown text-[#AA5486] me-2"></i> No meals found. Try adjusting your filters.</p>
    @endif

    
</div>





{{-- Optional: Custom CSS for hover effects --}}
@push('styles')
<style>
    .meal-card:hover {
        transform: translateY(-5px);
        transition: 0.3s ease-in-out;
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    }
</style>
@endpush
@endsection
