@extends('Client.Layouts.cinemaLayout')

@section('contentCinema')

    <div id="cimaUpLogo">
        <img src="{{ asset('Images/cimaup.png') }}"/>
    </div>
    <h1>Cinema {{ $cinema->name  }}</h1>
    <br>
    <h3>{{ $cinema->address.' -- '.$cinema->additional_address.' '.$cinema->post_code.' , '.$cinema->city.' , '.$cinema->country }}</h3>
    <br>
    <hr>
    <br>
    <form id="mainform" class="needs-validation" novalidate>
        <br>
        <div class="form-row">
            <div class="col-md-2 mb-3">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonReservation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Date de Réservation
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">12:30</a>
                        <a class="dropdown-item" href="#">16:00</a>
                        <a class="dropdown-item" href="#">17:45</a>
                    </div>
                </div>
            </div>

            <div class="col-md-2 mb-3">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonPlaces" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nombre de places
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">1</a>
                        <a class="dropdown-item" href="#">2</a>
                        <a class="dropdown-item" href="#">3</a>
                        <a class="dropdown-item" href="#">4</a>
                        <a class="dropdown-item" href="#">5</a>
                    </div>
                </div>
            </div>

            <br>

            <div class="col-md-2 mb-3">
            <label id="totalPrice"> Prix total: 24.99 €</label>
            </div>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Accepter les termes et conditions
                </label>
                <div class="invalid-feedback">
                    Vous devez accepter avant de reserver.
                </div>
            </div>
        </div>
        <br>
        <br>
        <button id="ReservationBtn" class="btn btn-primary" type="submit">Réserver</button>
    </form>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
    </script>

@endsection
