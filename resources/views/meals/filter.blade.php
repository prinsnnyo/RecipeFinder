@extends('layouts.app')

@section('content')
<div class="container py-5 bg-white">
<h1 class="text-center mb-5 text-dark" style="font-family: 'Poppins', sans-serif; font-size: 2.8rem; font-weight: 700;">
    Discover Delicious Meals
</h1>


    {{-- Filter Form --}}
    <form action="{{ route('meals.filter') }}" method="GET" class="mb-6 p-5 rounded-5 shadow-lg" style="max-width: 900px; margin: 0 auto; background-color: #653450;">
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
           <button type="submit" class="btn btn-light rounded-4 fw-bold shadow p-3 w-500 mt-4 hover:text-[#fff] hover:bg-[#AA5486]" style="white-space: nowrap;">
            <i class="fas fa-search me-1"></i> Find Meals
        </button>


        </div>
    </div>
</form>


    {{-- Display Meals --}}
    @if (!empty($detailedMeals))
    <div class="row g-4 mt-4">
    @foreach ($detailedMeals as $meal)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm h-100" style="border-radius: 10px; border: 1px solid #653450;">
                
                <!-- Image -->
                <img src="{{ $meal['strMealThumb'] }}" class="card-img-top" alt="{{ $meal['strMeal'] }}" style="height: 220px; object-fit: cover; border-radius: 10px 10px 0 0;">
                
                <!-- Card Body -->
                <div class="card-body text-center"style="padding: 1.25rem;">
                    <h5 class="card-title mb-3" style="color: #653450; font-weight: 600;">
                        {{ $meal['strMeal'] }}
                    </h5>

                    <!-- Buttons Wrapper -->
                  <div class="d-flex justify-content-center gap-2">
                        @if (!empty($meal['strSource']))
                            <div class="mb-2 flex-fill" style="min-width: 150px;">
                                <a href="{{ $meal['strSource'] }}" target="_blank"
                                    class="btn w-100"
                                    style="background-color: #653450; color: white; border: none; border-radius: 6px;">
                                    <i class="fas fa-book-open me-1"></i> View Recipe
                                </a>
                            </div>
                        @elseif (!empty($meal['strYoutube']))
                            <div class="mb-2 flex-fill" style="min-width: 150px;">
                                <a href="{{ $meal['strYoutube'] }}" target="_blank"
                                    class="btn w-100"
                                    style="background-color: #653450; color: white; border: none; border-radius: 6px;">
                                    <i class="fas fa-play me-1"></i> Watch Video
                                </a>
                            </div>
                        @else
                            <p class="mb-2" style="color: #653450;">Recipe source not available.</p>
                        @endif

<<<<<<< HEAD
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
=======
                        @auth
                            <form action="{{ route('favorites.store') }}" method="POST" class="mb-2 flex-fill" style="min-width: 150px;">
                                @csrf
                                <input type="hidden" name="recipe_id" value="{{ $meal['idMeal'] }}">
                                <input type="hidden" name="recipe_name" value="{{ $meal['strMeal'] }}">
                                <input type="hidden" name="recipe_image" value="{{ $meal['strMealThumb'] }}">
                                <button type="submit" class="btn w-100"
                                    style="background-color: #f1b43c; color: white; border: none; border-radius: 6px;">
                                    <i class="fas fa-heart me-1"></i> Favorite
                                </button>
                            </form>
                        @endauth
>>>>>>> itom
                    </div>

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

    .bordered-heading {
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin: 40px 0;
    }

    .bordered-heading::before,
    .bordered-heading::after {
        content: "";
        flex: 1;
        height: 3px;
        background-color: #AA5486;
        margin: 0 15px;
        box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
    }
    .btn-no-wrap {
    white-space: nowrap;
}

</style>
@endpush
@endsection
