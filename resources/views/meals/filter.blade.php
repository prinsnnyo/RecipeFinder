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
                            <h5 class="text-white card-title">{{ $meal['strMeal'] }}</h5>
                            <a href="#" class="text-white btn btn-info">View Recipe</a>
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
