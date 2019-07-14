<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Communication</title>

       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/communication.css') }}"> --}}

       <link rel="stylesheet" href="{{asset('assets/communiction/css/lib\bootstrap.min.css')}}" type="text/css" rel="stylesheet">
       <link rel="stylesheet" href="{{asset('assets/communiction/css/swipe.min.css')}}" type="text/css" rel="stylesheet">
       <link rel="stylesheet" href="{{asset('assets/communiction/img/favicon.png')}}" type="image/png" rel="icon">
        

    </head>
    <body>
        @yield('content')

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/communication.js') }}"></script> --}}
        <script src="{{asset('assets/communiction/js/vendor/jquery-slim.min.js')}}"></script>
        <script src="{{asset('assets/communiction/js/vendor/popper.min.js')}}"></script>
        <script src="{{asset('assets/communiction/js/vendor/feather.min.js')}}"></script>
        <script src="{{asset('assets/communiction/js/vendor/eva.min.js')}}"></script>
        <script src="{{asset('assets/communiction/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/communiction/js/swipe.min.js')}}"></script>
    </body>
</html>
