@extends('Client.Layouts.app')

@section('content')

@include('Client.Layouts.sidebar')

<!-- Header -->
<header class="masthead d-flex">
    <div class="container text-center my-auto">
        <h1 class="mb-1">Black Widow</h1>
        <h3 class="mb-5">
            <em>Coming Soon On FLICK PLAY</em>
        </h3>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="Movies/BlackWidow/BlackWidow.html">Watch Trailer
            Now</a>
    </div>
    <div class="overlay"></div>
</header>


<!-- upcoming movies section start -->
<section id="UpcomingMovies">
    <div class="Container">
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
                                src="Images/UpcomingMoviesimages/TheBatman.jpg"></a></div>
                    <div class="col-6"><a href="Movies/WonderWoman1984/WonderWoman1984.html"><img
                                src="Images/UpcomingMoviesimages/WonderWoman1984.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/PeterRabbit2TheRunaway/PeterRabbit2TheRunaway.html"><img
                                src="Images/UpcomingMoviesimages/PeterRabbit2TheRunaway.jpg"></a></div>
                    <div class="col-6"><a href="Movies/JungleCruise/JungleCruise.html"><img
                                src="Images/UpcomingMoviesimages/JungleCruise.jpg"></a></div>
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
                                src="Images/TopRatedMoviesImages/JohnWick.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Bahubali2/Bahubali2.html"><img
                                src="Images/TopRatedMoviesImages/Bahubali2.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/Joker/joker.html"><img
                                src="Images/TopRatedMoviesImages/Joker.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Deadpool2/Deadpool2.html"><img
                                src="Images/TopRatedMoviesImages/Deadpool2.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/Incredibles2/Incredibles2.html"><img
                                src="Images/TopRatedMoviesImages/Incredibles2.jpg"></a></div>
                    <div class="col-6"><a href="Movies/AvengersEndGame/AvengersEndGame.html"><img
                                src="Images/TopRatedMoviesImages/AvengersEndGame.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a
                            href="Movies/SpiderManIntoTheSpiderVerse/SpiderManIntoTheSpiderVerse.html"><img
                                src="Images/TopRatedMoviesImages/SpiderManIntoTheSpiderVerse.jpg"></a></div>
                    <div class="col-6"><a href="Movies/GuardiansoftheGalaxy/GuardiansoftheGalaxy.html"><img
                                src="Images/TopRatedMoviesImages/GuardiansoftheGalaxy.jpg"></a></div>
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
                                src="Images/LatestMoviesImages/AntMan2.jpg"></a></div>
                    <div class="col-6"><a href="Movies/SpiderManFarFromHome/SpiderManFarFromHome.html"><img
                                src="Images/LatestMoviesImages/SpiderManFarFromHome.png"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/AvengersInfinityWar/AvengersInfinityWar.html"><img
                                src="Images/LatestMoviesImages/AvengersInfinityWar.jpg"></a></div>
                    <div class="col-6"><a href="Movies/WonderWoman/WonderWoman.html"><img
                                src="Images/LatestMoviesImages/WonderWoman.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/BlackPanther/BlackPanther.html"><img
                                src="Images/LatestMoviesImages/BlackPanther.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Bloodshot/Bloodshot.html"><img
                                src="Images/LatestMoviesImages/Bloodshot.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/ProjectPower/ProjectPower.html"><img
                                src="Images/LatestMoviesImages/ProjectPower.jpg"></a></div>
                    <div class="col-6"><a href="Movies/SonictheHedgehog/SonictheHedgehog.html"><img
                                src="Images/LatestMoviesImages/SonictheHedgehog.jpg"></a></div>
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
                                src="Images/EnglishMoviesImages/Aladdin.jpg"></a></div>
                    <div class="col-6"><a href="Movies/AntMan/AntMan.html"><img
                                src="Images/EnglishMoviesImages/AntMan.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/ToyStory/ToyStory.html"><img
                                src="Images/EnglishMoviesImages/ToyStory.jpg"></a></div>
                    <div class="col-6"><a href="Movies/TheDarkKnight/TheDarkKnight.html"><img
                                src="Images/EnglishMoviesImages/TheDarkKnight.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/TheGodfatherPart2/TheGodfatherPart2.html"><img
                                src="Images/EnglishMoviesImages/TheGodfatherPart2.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Inception/Inception.html"><img
                                src="Images/EnglishMoviesImages/Inception.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/AmzingSpiderMan2/AmzingSpiderMan2.html"><img
                                src="Images/EnglishMoviesImages/AmzingSpiderMan2.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Aquaman/Aquaman.html"><img
                                src="Images/EnglishMoviesImages/Aquaman.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/CaptainMarvel/CaptainMarvel.html"><img
                                src="Images/EnglishMoviesImages/CaptainMarvel.png"></a></div>
                    <div class="col-6"><a href="Movies/DoctorStrange/DoctorStrange.html"><img
                                src="Images/EnglishMoviesImages/DoctorStrange.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/IntoTheWoods/IntoTheWoods.html"><img
                                src="Images/EnglishMoviesImages/IntoTheWoods.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Kin/Kin.html"><img
                                src="Images/EnglishMoviesImages/Kin.jpg"></a></div>
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
                                src="Images/HindiMoviesImages/Shivaay.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Sooryavanshi/Sooryavanshi.html"><img
                                src="Images/HindiMoviesImages/Sooryavanshi.jpg"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/Padmaavat/Padmaavat.html"><img
                                src="Images/HindiMoviesImages/Padmaavat.jpg"></a></div>
                    <div class="col-6"><a href="Movies/KabirSingh/KabirSingh.html"><img
                                src="Images/HindiMoviesImages/KabirSingh.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/BhootPartOne/BhootPartOne.html"><img
                                src="Images/HindiMoviesImages/BhootPartOne.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Dhaakad/Dhaakad.html"><img
                                src="Images/HindiMoviesImages/Dhaakad.jpg"></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-6"><a href="Movies/Drive/Drive.html"><img
                                src="Images/HindiMoviesImages/Drive.jpg"></a></div>
                    <div class="col-6"><a href="Movies/Darbar/Darbar.html"><img
                                src="Images/HindiMoviesImages/Darbar.jpg"></a></div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
