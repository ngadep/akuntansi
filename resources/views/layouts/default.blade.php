<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Cahya Bagus Sanjaya">
        <meta name="description" content="Akuntansi Umum">
        <title>Akuntansi Darut Taqwa</title>
        <script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        @section('js-atas')
        @show
        @section('css')
            <link rel="stylesheet" href="{{asset('assets/css/akuntansi-duta.css')}}"/>
        @show

    </head>

    <body>
      @section('navbar')
            @include('layouts/navbar')
      @show

    <div class="container">
      @include('layouts/notifications')
      @yield('content')
    </div>
      @section('js-bawah')
      @show
    </body>
</html>
