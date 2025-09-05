    <title>{{ $title ?? 'Dahana WMS' }}</title>
    <link rel="icon" href="{{ asset('favi.ico') }}" type="image/x-icon">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta content="{{ $metaDescription ?? 'Waste Management and Recycling' }}" name="description" >
    <meta content="{{ $metaKeywords ?? '' }}" name="keywords" >
    <meta content="{{ $metaAuthor ?? '' }}" name="author" >
    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="{{ asset('css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css" >
    <!-- Icon fonts via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icofont@1.0.1/icofont.min.css">
    @stack('head')
