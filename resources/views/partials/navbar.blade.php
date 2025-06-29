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
