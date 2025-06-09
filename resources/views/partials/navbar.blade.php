<!-- Navbar Start -->
<nav class="main-nav navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('posts.index') }}">
            <img class="logo-main" src="{{ asset('images/logo.svg') }}" alt="logo" />
        </a>
        <!-- Toogle Button -->
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mainNav">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse nav-list" id="mainNav">
            <!-- Navigation Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">Home </a> <!-- main -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>

                {{-- ADDED LOGOUT AND LOGIN BUTTONS HERE --}}
                @auth {{-- Blade directive: Only show if a user is authenticated --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a> {{-- Example: link to create post --}}
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf {{-- CSRF token for security --}}
                            <button type="submit" class="nav-link btn btn-link" style="color: inherit; text-decoration: none; padding: .5rem 1rem;">
                                Logout ({{ Auth::user()->name }}) {{-- Optionally show username --}}
                            </button>
                        </form>
                    </li>
                @else {{-- Blade directive: Only show if no user is authenticated --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    {{-- If you have a registration route, you can add it here too --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li> --}}
                @endauth
                {{-- END ADDED LOGOUT AND LOGIN BUTTONS --}}

            </ul>
            <!-- Social Link -->
            <ul class="main-nav-social">
                <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End -->
<hr>
