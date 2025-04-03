@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center text-white">My Favorites</h2>


    @if (session('success'))
        <div class="text-white alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="text-white alert alert-danger">{{ session('error') }}</div>
    @endif


    @if (isset($favorites) && $favorites->isNotEmpty())
        <div class="row g-4">
            @foreach ($favorites as $favorite)
                <div class="col-md-4 col-sm-6">
                    <div class="shadow-sm card h-100">
                        <img src="{{ $favorite->recipe_image }}" class="card-img-top" alt="{{ $favorite->recipe_name }}">
                        <div class="text-center card-body">
                            <h5 class="text-white card-title">{{ $favorite->recipe_name }}</h5>
                            <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white btn btn-danger">Remove from Favorites</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-white">You have no favorite recipes yet.</p>
    @endif
</div>
@endsection
