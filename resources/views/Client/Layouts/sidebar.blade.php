
<a class="menu-toggle rounded" href="#">
    <i class="fa fa-bars"></i>
</a>

<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a class="js-scroll-trigger" href="#page-top">CIMAUP</a>
        </li>
        @guest
        <li class="sidebar-brand">
            <a class="js-scroll-trigger" href="{{ route('register') }}">S'inscrire</a>
        </li>
        @endguest
        @auth
        <li class="sidebar-brand">
            <a class="js-scroll-trigger" href="{{ route('profile.show') }}">Profile</a>
        </li>
        @endauth

        <li class="sidebar-brand">
            <a class="js-scroll-trigger" href="{{ route('contact') }}">Nous contacter</a>
        </li>

        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#UpcomingMovies">Tendances actuelles</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#TopRatedMovies">Action</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#LatestMovies">Drames</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#EnglishMovies">English Movies</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#HindiMovies">Hindi Movies</a>
        </li>
    </ul>
</nav>
