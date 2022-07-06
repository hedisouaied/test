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
<title>HPC GROUP</title>
@endif



<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>

<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">


<style>
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
        }
    body {
        top: 0px !important;
        }
        #goog-gt-tt
    {
         display: none!important;
    }
    .goog-text-highlight {
        background-color: transparent!important;
        box-shadow: none!important;
        }
</style>



 @yield('styles')
