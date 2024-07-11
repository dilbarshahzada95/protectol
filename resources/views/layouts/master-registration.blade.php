<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Quiz Registration" />
    <meta name="keywords" content="Quiz Registration" />
    <meta name="robots" content="index, follow" />
    <link rel="icon" href="{{ asset('registration/assets/images/logo.ico') }}" type="image/x-icon" />
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('registration/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('registration/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('registration/assets/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('registration/assets/css/animation.css') }}" />

</head>

<body>
    <main>
        @yield('content')
        <div class="left-shape">
            <img src="{{ asset('registration/assets/images/top-left.png') }}" alt="" />
        </div>
        <div class="right-shape">
            <img src="{{ asset('registration/assets/images/top-right.png') }}" alt="" />
        </div>
    </main>


    <script src="{{ asset('registration/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('registration/assets/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('registration/assets/js/custom.js') }}"></script>


</body>

</html>
