<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciname - Up</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body id="page-top">

    @yield('content')

    <!-- footer section start -->
    <footer id="footer">
        <i class="social-icon fa fa-facebook"></i>
        <i class="social-icon fa fa-twitter"></i>
        <i class="social-icon fa fa-instagram"></i>
        <i class="social-icon fa fa-envelope"></i>
        <i class="social-icon fa fa-pinterest"></i>
        <i class="social-icon fa fa-youtube"></i>
        <p>© Copyright 2020 FlickPlay</p>
    </footer>
    <!-- footer section end -->




    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
