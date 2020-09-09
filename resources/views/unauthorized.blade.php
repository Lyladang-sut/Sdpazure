<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Umega App - 400 Bad Request</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/PACE/themes/blue/pace-theme-flash.css') }}">
    <script type="text/javascript" src="{{ asset('plugins/PACE/pace.min.js') }}"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/css/fourth-layout.css') }}">
</head>

<body style="background-image: url('build/images/backgrounds/16.jpg')" class="body-bg-full">
    <div class="container page-container">
        <div class="page-content">
            <div class="logo"><img src="{{ asset('build/images/logo/logo-sm-light.png') }}" alt="" width="80"></div>
            <h1 style="font-size: 130px" class="m-0 text-muted fw-300">4<i class="ti-face-sad fs-100"></i><i class="ti-face-sad fs-100"></i></h1>
            <h4 class="fs-16 text-white fw-300">Bad Request!</h4>
            <p class="text-muted mb-15">Your browser sent a request that this server could not understand.</p><a href="{{ url('/') }}" role="button" style="width: 130px" class="btn btn-primary btn-rounded">Return home</a>
        </div>
    </div>
    <!-- jQuery-->
    <script type="text/javascript" src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="{{ asset('build/js/fourth-layout/extra-demo.js') }}"></script>
</body>

</html>