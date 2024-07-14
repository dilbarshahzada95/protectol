<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('quiz/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('quiz/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('quiz/assets/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="wrapper position-relative">
        @yield('content')
    </div>
    <!-- jQuery-js include -->
    <script src="{{ asset('quiz/assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- Countdown-js include -->
    <script src="{{ asset('quiz/assets/js/countdown.js') }}"></script>
    <!-- Bootstrap-js include -->
    <script src="{{ asset('quiz/assets/js/bootstrap.min.js') }}"></script>
    <!-- jQuery-validate-js include -->
    <script src="{{ asset('quiz/assets/js/jquery.validate.min.js') }}"></script>
    <!-- Custom-js include -->
    <script src="{{ asset('quiz/assets/js/script.js') }}"></script>
    @yield('scripts')
</body>

</html>
