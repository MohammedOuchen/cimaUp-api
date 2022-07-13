@extends('Client.Layouts.episodeLayout')

@section('contentEpisode')
    <header>
        <a href="{{ route('home') }}" class="logo"><img src="{{ asset('Images/cimaup.png') }}" alt=""></a>

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
            <a href="{{ route('subscription') }}" class="play" onclick="toggle();"><img src="{{ asset('Images/episode/play.png') }}" alt="">Regarder l'episode</a>
        </div>
    </div>
    <div class="trailer">
        <iframe width="1500" height="900" src="{{ $episode->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </iframe>
        <img src="{{ asset('Images/episode/close.png') }}" alt="" class="close" onclick="toggle();">
    </div>

 @if (count($cinemas))
    <!-- top rated movies section start -->
    <section id="TopRatedMovies">
        <div class="Container">
            <h2>Actuellement en salles</h2>
            <div class="row Movies">
                @php
                    $count = 0;
                @endphp
                    @foreach ($cinemas as $cinema)
                            @if ($count % 2 == 0)
                                <div class="col-lg-4 col-md-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ route('cinema.show',['cinema_id' => $cinema->id , 'episode_id' => $episode->id ] ) }}">
                                                <img src="{{ $cinema->getFirstMediaUrl('images_cinemas') }}">
                                            </a>
                                        </div>
                            @else

                                    <div class="col-6">
                                        <a href="{{ route('cinema.show',['cinema_id' => $cinema->id , 'episode_id' => $episode->id ] ) }}">
                                            <img src="{{ $cinema->getFirstMediaUrl('images_cinemas') }}">
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

    <!-- Comment and Avis section-->
    <section id="Cinemas">
        <div class="Container">
            <h2>Donnez votre avis </h2>
            <div class="rating"><!--
                --><a href="#5" title="Give 5 stars">☆</a><!--
                --><a href="#4" title="Give 4 stars">☆</a><!--
                --><a href="#3" title="Give 3 stars">☆</a><!--
                --><a href="#2" title="Give 2 stars">☆</a><!--
                --><a href="#1" title="Give 1 star">☆</a>
            </div>

            <div class="form-group">
                <label id="commentLabel" for="CommentSection">Commentaire</label>
                <textarea class="form-control" id="CommentSection" rows="3"></textarea>
            </div>
            <button id="SendComment" type="submit" class="btn btn-primary mb-2">Envoyer</button>
            <br>
            <br>
            <div>
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
