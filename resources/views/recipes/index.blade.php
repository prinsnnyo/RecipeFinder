@extends('layouts.app')

@section('content')
<div class="container">

<style>
    .category-img {
      border-radius: 50%;
      width: 80px;
      height: 80px;
      object-fit: cover;
    }
    .recipe-card img {
      width: 100%;
      height: auto;
      border-radius: 10px;
    }
    .recipe-title {
      background-color: #f1b43c;
      color: white;
      display: inline-block;
      padding: 5px 15px;
      font-weight: 600;
      margin-top: 10px;
      border-radius: 3px;
    }
    .tagline {
      font-size: 1.5rem;
      font-weight: 500;
      text-align: center;
      margin-bottom: 2rem;
    }
    .tagline span {
      font-family: 'Brush Script MT', cursive;
      color: #AA5486;
    }
  </style>
</head>
<body class="bg-light">

  <div class="container py-5">
    <!-- Tagline -->
    <div class="tagline text-bold text-dark mb-4">
      SIMPLE RECIPES MADE FOR <span>real, actual, everyday life.</span>
    </div>

    <!-- Featured Recipes -->
    <div class="row text-center mb-5">
      <div class="col-md-3 recipe-card">
        <img src="https://pinchofyum.com/cdn-cgi/image/width=360,height=514,fit=crop/wp-content/uploads/Pepperoncini-Chicken-6.jpg" alt="Dinner">
        <div class="recipe-title">DINNER</div>
      </div>
      <div class="col-md-3 recipe-card">
        <img src="https://pinchofyum.com/cdn-cgi/image/width=360,height=514,fit=crop/wp-content/uploads/Carrot-Cake-Coffee-Cake-1.jpg" alt="Most Popular">
        <div class="recipe-title">MOST POPULAR</div>
      </div>
      <div class="col-md-3 recipe-card">
        <img src="https://pinchofyum.com/cdn-cgi/image/width=360,height=514,fit=crop/wp-content/uploads/Mojo-Bowls-1.jpg" alt="Quick and Easy">
        <div class="recipe-title">QUICK AND EASY</div>
      </div>
      <div class="col-md-3 recipe-card">
        <img src="https://pinchofyum.com/cdn-cgi/image/width=360,height=514,fit=crop/wp-content/uploads/Crispy-Chicken-Cutlets-on-Plate.jpg" alt="Air Fryer">
        <div class="recipe-title">AIR FRYER</div>
      </div>
    </div>

<!-- Category Scroll Section -->
<div class="category-scroll-container">
  <div class="category-scroll">
    <!-- Repeatable Items -->
    <div class="category-item">
      <img src="https://media.cnn.com/api/v1/images/stellar/prod/170206162409-indian-frybread.jpg?q=w_1110,c_fill" class="category-img mb-2" alt="American">
      <div class="fw-bold">AMERICAN</div>
    </div>
    <div class="category-item">
      <img src="https://fullsuitcase.com/wp-content/uploads/2021/01/Traditional-British-food.jpg" class="category-img mb-2" alt="British">
      <div class="fw-bold">BRITISH</div>
    </div>
    <div class="category-item">
      <img src="https://maplefromcanada.ca/uploads/2022/09/recette-poutine-erable-1200x900-1-600x450.jpg" class="category-img mb-2" alt="Canadian">
      <div class="fw-bold">CANADIAN</div>
    </div>
    <div class="category-item">
      <img src="https://www.iamexpat.nl/sites/default/files/styles/ogimage_thumb/public/traditional-dutch-food.jpg" class="category-img mb-2" alt="Dutch">
      <div class="fw-bold">DUTCH</div>
    </div>
    <div class="category-item">
      <img src="https://hips.hearstapps.com/hmg-prod/images/delish-202002-coq-au-vin-0108-landscape-pf-1582306355.jpg?crop=0.667xw:1.00xh;0.154xw,0&resize=640:*" class="category-img mb-2" alt="French">
      <div class="fw-bold">FRENCH</div>
    </div>
    <div class="category-item">
      <img src="https://villagepipol.com/wp-content/uploads/2021/07/Bulalo.png" class="category-img mb-2" alt="Filipino">
      <div class="fw-bold">FILIPINO</div>
    </div>
    <div class="category-item">
      <img src="https://www.foodandwine.com/thmb/Unjh-U6zcT2lLQnOAVvMRoyfMC8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/Essential-Greek-Foods-You-Need-to-Try-FT-2-BLOG1122-29bf3ead8c1a4383b12d62dc65c9198c.jpg" class="category-img mb-2" alt="Greek">
      <div class="fw-bold">GREEK</div>
    </div>
    <div class="category-item">
      <img src="https://res.cloudinary.com/rainforest-cruises/images/c_fill,g_auto/f_auto,q_auto/w_1120,h_732,c_fill,g_auto/v1661347444/india-food-butter-chicken/india-food-butter-chicken-1120x732.jpg" class="category-img mb-2" alt="Indian">
      <div class="fw-bold">INDIAN</div>
    </div>
    <div class="category-item">
      <img src="https://images.immediate.co.uk/production/volatile/sites/30/2020/08/spaghetti-puttanesca_1-1ce4e81.jpg?quality=90&resize=440,400" class="category-img mb-2" alt="Italian">
      <div class="fw-bold">ITALIAN</div>
    </div>
  </div>
</div>
  </div>


    {{-- Recipe Search Form --}}
    <form action="{{ route('recipes.search') }}" method="GET" class="mt-6 mb-6 w-full max-w-2xl mx-auto">
    <div class="flex items-center bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-full shadow-md overflow-hidden">
        
        <!-- Icon -->
        <div class="flex items-center pl-4">
            <i class="fas fa-magnifying-glass text-gray-400 text-sm"></i>
        </div>

        <!-- Input -->
        <input 
            type="text" 
            name="query" 
            class="flex-grow py-3 px-4 text-sm text-black-800 dark:text-black-200 bg-transparent border-none focus:outline-none focus:ring-0" 
            placeholder="Search for a recipe..." 
            required
        >

        <!-- Button -->
        <button 
            type="submit" 
            class="h-full px-6 py-3 bg-[#653450] hover:bg-[#4b2738] text-white text-sm font-medium rounded-r-full transition-all duration-300"
        >
            Search
        </button>
    </div>
</form>


    
    {{-- Display Recipes --}}
    @if(isset($recipes) && count($recipes) > 0)
        <h3 class="text-center text-white">Recipe Results</h3>
        <div class="row g-4">
            @foreach($recipes as $recipe)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="shadow-sm card h-100">
                        <img src="{{ $recipe['strMealThumb'] }}" class="card-img-top" alt="{{ $recipe['strMeal'] }}">
                        <div class="text-center card-body">
                            <h5 class="text-black card-title">{{ $recipe['strMeal'] }}</h5>
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
        <p class="mt-4 text-center text-dark"><i class="fas fa-frown text-[#AA5486] me-2"></i>No recipes found. Try searching again.</p>
    @endif
</div>

<style>
    .category-scroll-container {
      overflow: hidden;
      width: 100%;
      background-color: #f9f9f9;
      padding: 20px 0;
    }

    .category-scroll {
      display: flex;
      width: max-content;
      animation: scroll-left 40s linear infinite;
    }

    .category-item {
      min-width: 160px;
      text-align: center;
      padding: 0 12px;
    }

    .category-img {
      width: 100px;
      height: 80px;
      object-fit: cover;
      border-radius: 10px;
    }

    @keyframes scroll-left {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-50%);
      }
    }
  </style>

<!-- JavaScript to clone items for infinite scroll -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const scroll = document.querySelector('.category-scroll');
    scroll.innerHTML += scroll.innerHTML; // Clone items for looping effect
  });
</script>
@endsection
