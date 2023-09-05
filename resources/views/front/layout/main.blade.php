<!DOCTYPE html>
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="_token" content="{{csrf_token()}}" />
            <link href="/css/front/header.css" rel="stylesheet" type="text/css">
            <link href="/css/front/footer.css" rel="stylesheet" type="text/css">
            <link href="/css/front/style.css" rel="stylesheet" type="text/css">
            <link href="http://fonts.cdnfonts.com/css/sofia-pro" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

            @yield('style')

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
            <script src="/js/jquery.js"></script>
        </head>
        @include('front.layout.header')
        <body>
        @yield('content')
        </body>
        @extends('front.layout.footer')
    </html>
