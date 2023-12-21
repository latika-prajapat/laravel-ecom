<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        @yield('title')
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.min.css') }}" rel="stylesheet">

</head>

<body>


    {{-- navbar Start --}}
    @include('layout.header')
    {{-- end navbar --}}

    {{-- middle content Start --}}
    <div class="content">

        @yield('content')

    </div>
    {{-- middle content End --}}


    @include('layout.footer')
    <!-- JavaScript Libraries -->


    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>


</body>

</html>
