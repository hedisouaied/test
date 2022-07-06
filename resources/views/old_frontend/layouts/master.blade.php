<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.head')

</head>

<body class="_active-preloader-ovh">

    <div class="preloader"><div class="spinner"></div></div> <!-- /.preloader -->

    <!-- Header Area -->
@include('frontend.layouts.header')
    <!-- Header Area End -->

@yield('content')

    <!-- Footer Area -->

    <!-- Footer Area -->
    </div>
    @include('frontend.layouts.footer')


    <div class="scroll-to-top scroll-to-target" data-target="html"><i class="fa fa-angle-up"></i></div>

@include('frontend.layouts.script')


</body>
</html>
