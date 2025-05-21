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
                <div class="card shadow-sm h-100" style="border-radius: 12px; border: 1px solid #653450; box-shadow: 0 6px 9px rgba(0, 0, 0, 0.1);">
                    <img src="{{ $favorite->recipe_image }}" class="card-img-top" alt="{{ $favorite->recipe_name }}"
                        style="height: 220px; object-fit: cover; border-radius: 12px 12px 0 0;">
                    
                        <div class="card-body text-center" style="padding: 1.25rem;">
                    <h5 class="card-title mb-4" style="color: #653450; font-weight: bold;">{{ $favorite->recipe_name }}</h5>

                    <div class="d-flex justify-content-center gap-2">
                    @if (!empty($favorite->recipe_source))
                        <a href="{{ $favorite->recipe_source }}" target="_blank"
                        class="btn w-100" style="background-color: #653450; color: white; border: none; border-radius: 6px; max-width: 180px;">
                            <i class="fas fa-book-open me-1"></i> View Recipe
                        </a>
                    @elseif (!empty($favorite->recipe_video))
                        <a href="{{ $favorite->recipe_video }}" target="_blank"
                        class="btn w-100" style="background-color: #653450; color: white; border: none; border-radius: 6px; max-width: 180px;">
                            <i class="fas fa-play me-1"></i> Watch Video
                        </a>
                    @else
                        <p class="text-danger">Recipe source not available.</p>
                    @endif

                    <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST" style="width: 100%; max-width: 180px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn w-100"
                                style="background-color: #f1b43c; color: white; border: none; border-radius: 6px;">
                            <i class="fas fa-heart-broken me-1"></i> Remove 
                        </button>
                    </form>
                </div>

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
