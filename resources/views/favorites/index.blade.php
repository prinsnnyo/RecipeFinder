@extends('layouts.app')

@section('content')
<div class="container min-h-[60vh]">
    <h1 class="bordered-heading">
        <span>My Favorites</span>
    </h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
            <strong><i class="fas fa-check-circle me-2"></i></strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
            <strong><i class="fas fa-exclamation-circle me-2"></i></strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (isset($favorites) && $favorites->isNotEmpty())
        <div class="row g-4">
            @foreach ($favorites as $favorite)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 rounded-4 shadow-lg border-0 meal-card">
                        <img src="{{ $favorite->recipe_image }}" class="card-img-top" alt="{{ $favorite->recipe_name }}" style="object-fit: cover; height: 230px;">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold text-dark" style="font-size: 1.2rem;">{{ $favorite->recipe_name }}</h5>
                            <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-pill text-white fw-bold px-4">
                                    <i class="fas fa-heart-broken me-1"></i> Remove from Favorites
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-dark">
            <i class="fas fa-frown me-2" style="color: #AA5486;"></i>
            You have no favorite recipes yet.
        </p>
    @endif
</div>

<style>
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
</style>
@endsection
