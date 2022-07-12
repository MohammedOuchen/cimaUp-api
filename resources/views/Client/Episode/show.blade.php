@extends('Client.Layouts.episodeLayout')

@section('contentEpisode')
    <header>
        <a href="{{ route('home') }}" class="logo"><img src="{{ asset('Images/cimaup.png') }}" alt=""></a>
    <div class="toggle"><img src="{{ asset('Images/episode/toggle.png') }}" alt=""></div>
    </header>
    <div class="banner" style="background-image: url({{ $episode->getFirstMediaUrl('images_episodes') }});">
        <div class="content">
            <h2><span>{{ $episode->title }}</span></h2>
            <p>
             {{ $episode->description }}
            </p>
            <a href="#" class="play" onclick="toggle();"><img src="{{ asset('Images/episode/play.png') }}" alt="">Regarder bande d'annonce</a>
            <br>
            <br>
            <a href="#" class="play" onclick="toggle();"><img src="{{ asset('Images/episode/play.png') }}" alt="">Regarder l'episode</a>
        </div>
    </div>
    <div class="trailer">
        <iframe width="1500" height="900" src="{{ $episode->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </iframe>
        <img src="{{ asset('Images/episode/close.png') }}" alt="" class="close" onclick="toggle();">
    </div>

    <!-- top rated movies section start -->
<section id="Cinemas">
    <div class="Container">
        <h2>Actuellement en salles</h2>
        <div class="row Movies">
                <div class="col-lg-4 col-md-6">
                    <div class="row">
                        <div class="col-6"><a href="Movies/Venom2/Venom2.html"><img
                                    src="images/CinemaParado.png"></a></div>
                        <div class="col-6"><a href="Movies/Morbius/Morbius.html"><img
                                    src="images/CinemaParado.png"></a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="row">
                        <div class="col-6"><a href="Movies/TheBatman/TheBatman.html"><img
                                    src="Images/CinemaParado.png"></a></div>
                        <div class="col-6"><a href="Movies/WonderWoman1984/WonderWoman1984.html"><img
                                    src="Images/CinemaParado.png"></a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="row">
                        <div class="col-6"><a href="Movies/PeterRabbit2TheRunaway/PeterRabbit2TheRunaway.html"><img
                                    src="Images/CinemaParado.png"></a></div>
                        <div class="col-6"><a href="Movies/JungleCruise/JungleCruise.html"><img
                                    src="Images/CinemaParado.png"></a></div>
                    </div>
                </div>
            </div>
    </div>
</section>

    <script>
        function toggle(){
            var trailer=document.querySelector('.trailer');
            let video=document.querySelector('.video');
            trailer.classList.toggle('active');
            video.currentTime = 0;
            video.pause();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

@endsection
