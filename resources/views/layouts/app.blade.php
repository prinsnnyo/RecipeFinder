<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>RecipeFinder</title>
        <!-- Replace default favicon -->
        <link rel="icon" type="image/png" href="{{ asset('RF-logo.png') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
         <!-- Bootstrap JS Bundle with Popper -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white-100 dark:bg-white-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow dark:bg-white-800">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>

            <footer id="footer" class="footer dark-background mt-5">
            <div class="container">
                <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div class="address">
                    <h4>Address</h4>
                    <p>Brgy. Ampayon, Butuan City</p>
                    <p>Agusan Del Norte, Philippines, 8601</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                    <h4>Contact</h4>
                    <p>
                        <strong>Phone:</strong> <span>+639 923 2933 323</span><br>
                        <strong>Email:</strong> <span>recipefinder@gmail.com</span><br>
                    </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                    <h4>Opening Hours</h4>
                    <p>
                        <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br>
                        <strong>Sunday</strong>: <span>Closed</span>
                    </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                    <a href="https://www.facebook.com/profile.php?id=100083156787311" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/recipe.finder/?hl=en" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                </div>
            </div>

            <div class="container copyright text-center mt-4">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">RecipeFinder</strong> <span>All Rights Reserved</span></p>
                
            </div>
            </footer>

        </div>

        <style>
  /* Change icon color */
  #footer .bi {
      color:rgb(146, 71, 113);
  }
  #footer .sitename {
      color:rgb(146, 71, 113);
  }


  /* Optional: Hover effect for icons */
  #footer .bi:hover {
      color: #AA5486;
  }
</style>


        <script>
    // Auto-dismiss alerts after 5 seconds
    setTimeout(() => {
        const alerts = document.querySelectorAll('.custom-alert');
        alerts.forEach(alert => {
            const alertInstance = bootstrap.Alert.getOrCreateInstance(alert);
            alertInstance.close();
        });
    }, 1000);
</script>

    </body>
</html>
