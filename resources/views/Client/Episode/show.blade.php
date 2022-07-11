@extends('Client.Layouts.episodeLayout')

@section('contentEpisode')
    <header>
        <a href="#" class="logo"><img src="{{ asset('Images/cimaup.png') }}" alt=""></a>
    <div class="toggle"><img src="{{ asset('Images/episode/toggle.png') }}" alt=""></div>
    </header>
    <div class="banner" style="background-image: url({{ $episode->getFirstMediaUrl('images_episodes') }});">
        <div class="content">
            <h2><span>{{ $episode->title }}</span></h2>
            <p>
             {{ $episode->description }}
            </p>
            <a href="#" class="play" onclick="toggle();"><img src="{{ asset('Images/episode/play.png') }}" alt="">watch trailer</a>
        </div>
    </div>
    <div class="trailer">
        <video src="{{ asset('vedios/trailer.mkv') }}" controls="true"></video>
        <img src="{{ asset('Images/episode/close.png') }}" alt="" class="close" onclick="toggle();">
    </div>
    <script>
        function toggle(){
            var trailer=document.querySelector('.trailer');
            let video=document.querySelector('.video');
            trailer.classList.toggle('active');
            video.currentTime = 0;
            video.pause();
        }
    </script>

@endsection
