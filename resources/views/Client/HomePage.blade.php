@extends('Client.Layouts.app')

@section('content')

@include('Client.Layouts.sidebar')

<div id="cimaUpLogo">
    <img src="images/cimaup.png"/>
</div>
<!-- Header -->
<header class="masthead d-flex">
    <div class="container text-center my-auto">
        <h1 class="mb-1">Black Widow</h1>
        <h3 class="mb-5">
            <em>Coming Soon On CimaUp</em>
        </h3>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="Movies/BlackWidow.html">Watch Trailer
            Now</a>
    </div>
    <div class="overlay"></div>
</header>


<!-- upcoming movies section start -->
<section id="UpcomingMovies">
    <div class="Container">
        <div class="topnav">
            
        <div class="dropdown">
            <button class="dropbtn">
                Catégories
                <svg id="filtericon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
            </button>
            <div class="dropdown-content">
                <a href="#">Action</a>
                <a href="#">Drama</a>
                <a href="#">Comédie</a>
            </div>
        </div>

            <div class="search-container">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div> 
        <br>
        <br>
        <br>
        <h2>Upcoming Movies</h2>
        <div class="row Movies">
            <div class="col-lg-4 col-md-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/Venom2/Venom2.html"><img
                                src="{{ asset('Images/Venom2.jpg') }}"></a></div>
                    <div class="col-6"><a href="Movies/Morbius/Morbius.html"><img
                                src="{{ asset('Images/Morbius.jpg') }}"></a></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/TheBatman/TheBatman.html"><img
                                src="Images/TheBatman.jpg"></a></div>
                    <div class="col-6"><a href="Movies/WonderWoman1984/WonderWoman1984.html"><img
                                src="Images/WonderWoman1984.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/PeterRabbit2TheRunaway/PeterRabbit2TheRunaway.html"><img
                                src="Images/PeterRabbit2TheRunaway.jpg"></a></div>
                    <div class="col-6"><a href="Movies/JungleCruise/JungleCruise.html"><img
                                src="Images/JungleCruise.jpg"></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- upcoming movies section end -->


<!-- top rated movies section start -->
<section id="TopRatedMovies">
    <div class="Container">
        <h2>Top Rated Movies</h2>
        <div class="row Movies">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/JohnWick3/JohnWick3.html"><img
                                src="Images/JohnWick.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Bahubali2/Bahubali2.html"><img
                                src="Images/Bahubali2.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/Joker/joker.html"><img
                                src="Images/Joker.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Deadpool2/Deadpool2.html"><img
                                src="Images/Deadpool2.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/Incredibles2/Incredibles2.html"><img
                                src="Images/Incredibles2.jpg"></a></div>
                    <div class="col-6"><a href="Movies/AvengersEndGame/AvengersEndGame.html"><img
                                src="Images/AvengersEndGame.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a
                            href="Movies/SpiderManIntoTheSpiderVerse/SpiderManIntoTheSpiderVerse.html"><img
                                src="Images/SpiderManIntoTheSpiderVerse.jpg"></a></div>
                    <div class="col-6"><a href="Movies/GuardiansoftheGalaxy/GuardiansoftheGalaxy.html"><img
                                src="Images/GuardiansoftheGalaxy.jpg"></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- top rated movies section end -->


<!-- latest movies section start -->
<section id="LatestMovies">
    <div class="Container">
        <h2>Latest Movies</h2>
        <div class="row Movies">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/AntMan2/AntMan2.html"><img
                                src="Images/AntMan2.jpg"></a></div>
                    <div class="col-6"><a href="Movies/SpiderManFarFromHome/SpiderManFarFromHome.html"><img
                                src="Images/SpiderManFarFromHome.png"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/AvengersInfinityWar/AvengersInfinityWar.html"><img
                                src="Images/AvengersInfinityWar.jpg"></a></div>
                    <div class="col-6"><a href="Movies/WonderWoman/WonderWoman.html"><img
                                src="Images/WonderWoman.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/BlackPanther/BlackPanther.html"><img
                                src="Images/BlackPanther.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Bloodshot/Bloodshot.html"><img
                                src="Images/Bloodshot.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/ProjectPower/ProjectPower.html"><img
                                src="Images/ProjectPower.jpg"></a></div>
                    <div class="col-6"><a href="Movies/SonictheHedgehog/SonictheHedgehog.html"><img
                                src="Images/SonictheHedgehog.jpg"></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- latest movies section end -->


<!-- english movies section start -->
<section id="EnglishMovies">
    <div class="Container">
        <h2>English Movies</h2>
        <div class="row Movies">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/Aladdin/Aladdin.html"><img
                                src="Images/Aladdin.jpg"></a></div>
                    <div class="col-6"><a href="Movies/AntMan/AntMan.html"><img
                                src="Images/AntMan.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/ToyStory/ToyStory.html"><img
                                src="Images/ToyStory.jpg"></a></div>
                    <div class="col-6"><a href="Movies/TheDarkKnight/TheDarkKnight.html"><img
                                src="Images/TheDarkKnight.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/TheGodfatherPart2/TheGodfatherPart2.html"><img
                                src="Images/TheGodfatherPart2.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Inception/Inception.html"><img
                                src="Images/Inception.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/AmzingSpiderMan2/AmzingSpiderMan2.html"><img
                                src="Images/AmzingSpiderMan2.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Aquaman/Aquaman.html"><img
                                src="Images/Aquaman.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/CaptainMarvel/CaptainMarvel.html"><img
                                src="Images/CaptainMarvel.png"></a></div>
                    <div class="col-6"><a href="Movies/DoctorStrange/DoctorStrange.html"><img
                                src="Images/DoctorStrange.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/IntoTheWoods/IntoTheWoods.html"><img
                                src="Images/IntoTheWoods.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Kin/Kin.html"><img
                                src="Images/Kin.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">

                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">

                </div>
            </div>
        </div>
    </div>
</section>
<!-- english movies section end -->


<!-- hindi movies section start -->
<section id="HindiMovies">
    <div class="Container">
        <h2>Hindi Movies</h2>
        <div class="row Movies">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/Shivaay/Shivaay.html"><img
                                src="Images/Shivaay.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Sooryavanshi/Sooryavanshi.html"><img
                                src="Images/Sooryavanshi.jpg"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/Padmaavat/Padmaavat.html"><img
                                src="Images/Padmaavat.jpg"></a></div>
                    <div class="col-6"><a href="Movies/KabirSingh/KabirSingh.html"><img
                                src="Images/KabirSingh.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/BhootPartOne/BhootPartOne.html"><img
                                src="Images/BhootPartOne.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Dhaakad/Dhaakad.html"><img
                                src="Images/Dhaakad.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/Drive/Drive.html"><img
                                src="Images/Drive.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Darbar/Darbar.html"><img
                                src="Images/Darbar.jpg"></a></div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
