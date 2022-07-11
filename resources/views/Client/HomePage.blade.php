@extends('Client.Layouts.app')

@section('content')

@include('Client.Layouts.sidebar')


<!-- Header -->
<header class="masthead d-flex" style="background-image: url(/images/BlackWidow.jpg);">
<div id="cimaUpLogo">
    <img src="images/cimaup.png"/>
</div>
    <div class="container text-center my-auto" >
        <h1 class="mb-1">Black Widow</h1>
        <h3 class="mb-5">
            <em>Coming Soon On CimaUp</em>
        </h3>
        <a id="button1" class="btn btn-primary btn-xl js-scroll-trigger" href="Movies/BlackWidow.html">Regarde la bande-annonce</a>
        <br>
        <br>
        <a id="button2" class="btn btn-primary btn-xl js-scroll-trigger" href="Movies/BlackWidow.html">Réserver un billet cinéma</a>
        <br>
        <br>
        <a id="button3" class="btn btn-primary btn-xl js-scroll-trigger" href="Movies/BlackWidow.html">S'abonner à CimaUp</a>
    </div>
    <div class="overlay"></div>
</header>


@if (count($search))
<!-- top rated movies section start -->
<section id="TopRatedMovies">
    <div class="Container">
         <div class="topnav">
             <div class="search-container">
                 <form action="{{ route('home') }}" method="GET">
                     <input type="text" placeholder="Titre, genres .." id="searchZone" name="search" value="{{ $metaSearch }}">
                     <button type="submit"><i class="fa fa-search"></i></button>
                 </form>
             </div>
         </div>


        <div class="row Movies">
            @php
                $count = 0;
            @endphp
                @foreach ($search as $episode)
                        @if ($count % 2 == 0)
                            <div class="col-lg-4 col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="Movies/Venom2/Venom2.html">
                                            <img src="{{ $episode->getFirstMediaUrl('images_episodes') }}">
                                        </a>
                                    </div>
                        @else

                                <div class="col-6">
                                    <a href="Movies/Morbius/Morbius.html">
                                        <img src="{{ $episode->getFirstMediaUrl('images_episodes') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @php
                        $count++;
                    @endphp

                @endforeach
        </div>
    </div>
</section>
<!-- top rated movies section end -->
@endif


<!-- upcoming movies section start -->
<section id="UpcomingMovies">
    <div class="Container">
        @if (!count($search))
        <div class="topnav">
            <div class="search-container">
                <form action="{{ route('home') }}" method="GET">
                    <input type="text" placeholder="Titre, genres .." name="search" value="{{ $metaSearch }}">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        @endif
        <h2>Tendances actuelles</h2>
        <div class="row Movies">
            @php
                $count = 0;
            @endphp
                @foreach ($bestEpisodes as $episode)
                        @if ($count % 2 == 0)
                            <div class="col-lg-4 col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="Movies/Venom2/Venom2.html">
                                            <img src="{{ $episode->getFirstMediaUrl('images_episodes') }}">
                                        </a>
                                    </div>
                        @else

                                <div class="col-6">
                                    <a href="Movies/Morbius/Morbius.html">
                                        <img src="{{ $episode->getFirstMediaUrl('images_episodes') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @php
                        $count++;
                    @endphp

                @endforeach
        </div>
    </div>
</section>
<!-- upcoming movies section end -->

@if (count($actionEpisodes))
<!-- top rated movies section start -->
<section id="TopRatedMovies">
    <div class="Container">
        <h2>Action</h2>
        <div class="row Movies">
            @php
                $count = 0;
            @endphp
                @foreach ($actionEpisodes as $episode)
                        @if ($count % 2 == 0)
                            <div class="col-lg-4 col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="Movies/Venom2/Venom2.html">
                                            <img src="{{ $episode->getFirstMediaUrl('images_episodes') }}">
                                        </a>
                                    </div>
                        @else

                                <div class="col-6">
                                    <a href="Movies/Morbius/Morbius.html">
                                        <img src="{{ $episode->getFirstMediaUrl('images_episodes') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @php
                        $count++;
                    @endphp

                @endforeach
        </div>
    </div>
</section>
<!-- top rated movies section end -->
@endif


@if (count($drameEpisodes))
<!-- top rated movies section start -->
<section id="TopRatedMovies">
    <div class="Container">
        <h2>Drames</h2>
        <div class="row Movies">
            @php
                $count = 0;
            @endphp
                @foreach ($drameEpisodes as $episode)
                        @if ($count % 2 == 0)
                            <div class="col-lg-4 col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="Movies/Venom2/Venom2.html">
                                            <img src="{{ $episode->getFirstMediaUrl('images_episodes') }}">
                                        </a>
                                    </div>
                        @else

                                <div class="col-6">
                                    <a href="Movies/Morbius/Morbius.html">
                                        <img src="{{ $episode->getFirstMediaUrl('images_episodes') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @php
                        $count++;
                    @endphp

                @endforeach
        </div>
    </div>
</section>
<!-- top rated movies section end -->
@endif


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
