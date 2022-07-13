@extends('Client.Layouts.contactLayout')

@section('contentContact')

    <div id="cimaUpLogo">
        <a href="{{ route('home') }}">
            <img src="images/cimaup.png"/>
        </a>
    </div>
    <h1>Nous Contacter : </h1>
    <br>
    <h3>Merci de renseigner vos informations</h3>
    <br>
    <hr>
    <br>
    <form id="mainform" class="needs-validation" action="{{ route('contact') }}" method="POST" novalidate>
        @csrf

        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="validationCustom01">Nom</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="first_name" value="Mark" required>
                <div class="valid-feedback">
                    Cela semble bon!
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom02">Prénom</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" name="last_name" value="Otto" required>
                    <div class="valid-feedback">
                        Cela semble bon!
                    </div>
            </div>
        </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustomUsername">Email</label>
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                <div class="invalid-feedback">
                    Veuillez choisir un Email.
                </div>
            </div>


        </div>

        <br>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label id="messageLabel" for="MessageSection">Message : </label>
                <textarea name="message" class="form-control" id="MessageSection" rows="3"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Accepter les termes et conditions
                </label>
                <div class="invalid-feedback">
                    Vous devez accepter avant d'envoyer votre message.
                </div>
            </div>
        </div>
        <br>
        <br>
        <button id="SendMessageBtn" class="btn btn-primary" type="submit">Envoyer</button>
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
