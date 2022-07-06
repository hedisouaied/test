        <meta charset="utf-8">
        @if (isset($meta))
            {!!$meta!!}
        @else
        <meta itemprop="name" content="HPC Group">
        <meta itemprop="description" content="Le groupe a pour dénomination sociale high-tech plastic center « hpc-group » spécialiste dans le secteur de la plasturgie.">
        <meta itemprop="image" content="{{asset('/frontend/logo-HPC.png')}}">
            <meta property="twitter:card" content="summary_large_image" />
            <meta property="twitter:url" content="{{asset('')}}" />
            <meta property="twitter:title" content="HPC Group" />
            <meta property="twitter:description" content="Le groupe a pour dénomination sociale high-tech plastic center « hpc-group » spécialiste dans le secteur de la plasturgie." />
            <meta property="twitter:image" content="{{asset('/frontend/logo-HPC.png')}}" />
            <meta property="twitter:site" content="@HPC" />
            <meta property="og:type" content="website" />
            <meta property="og:title" content="HPC Group" />
            <meta property="og:description" content="Le groupe a pour dénomination sociale high-tech plastic center « hpc-group » spécialiste dans le secteur de la plasturgie." />
            <meta property="og:image" content='{{asset('/frontend/logo-HPC.png')}}' />

        @endif
        @if (isset($title_page))
        <title>{{$title_page}}</title>
        @else
        <title>Plastic Maintenance Maroc</title>
        @endif

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
        <link rel="manifest" href="img/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>

<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">



 @yield('styles')
