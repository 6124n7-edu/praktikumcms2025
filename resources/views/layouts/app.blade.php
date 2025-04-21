<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Laravel Blog')</title>

    <!--Meta For No Index-->
    <meta name="robots" content="noindex, Nofollow, Noimageindex">

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Theme Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon" />
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon" />
</head>
<body>

    @include('partials.navbar')

    <div class="container">
        @yield('content')
    </div>
    
    @include('partials.footer')

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9rV6yesIygoVKTD6QLf_iCa9eiIIHqZ0&libraries=geometry">
    </script>
    <!-- Vendor JS -->
    <script src="{{ asset('vendor/jQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('vendor/g-map/gmap.js') }}"></script>
    <!-- Main JS -->
    <script src="js/script.js"></script>
</body>
</html>
