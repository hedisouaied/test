@extends('frontend.layouts.master')

@section('content')

<style>
    @media only screen and (max-width: 600px) {
  .hedi-menu {
    height: 180px !important;
  }
}
</style>
<!-- Page Title -->
<section class="page-title hedi-menu" style="background:black;height: 128px;">
    <div class="auto-container">
        <div class="content-box" style="padding: 63px 0px;">
            <div class="content-wrapper">

            </div>
        </div>
    </div>
</section>

<!-- Project details -->
<div class="project-details">
    <div class="auto-container">
        <div class="row">

            <div class="col-lg-12">
                <div class="single-project-content">

                    <div class="image-gallery">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-block">
                                    <div class="category"># {{get_setting('heading')}}</div>
                                    <h2>Présentation HPC Group</h2>
                                    <div class="text">
                                        <p>{!!get_setting('content')!!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="image" style="height: 100%;">
                                    <img src="{{get_setting('image')}}" style="height: 100%;object-fit: cover;" alt="">
                                    <div class="video-box">
                                        <div class="video-btn"><a href="{{get_setting('video')}}" class="overlay-link play-now ripple" data-fancybox="gallery" data-caption=""><i class="flaticon-play-button"></i></a></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                    <div class="why-choose-us-block-two">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-clock-4"></i></div>
                            <h4>Solide expertise</h4>
                            <div class="text">{{get_setting('solide_desc')}}</div>
                            <ul class="list">
                                @foreach ( $solides as $solide )
                                <li>{{$solide->title}}</li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                        </div>
                        <div class="col-md-6">
                    <div class="why-choose-us-block-two">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-clock-4"></i></div>
                            <h4>Mission</h4>
                            <div class="text">{{get_setting('mission_desc')}}</div>
                            <ul class="list">
                                @foreach ( $missions as $mission )
                                <li>{{$mission->title}}</li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Team Section -->
<section class="team-section style-two" style="background-image: url({{asset('frontend/assets/images/background/bg-11.jpg')}});">
    <div class="auto-container">
        <div class="sec-title light text-center">
            <h2>Notre équipe </h2>
        </div>

        <div class="row">
            <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "4" }}}'>

                @foreach ($team as $teeem )
                <div class="col-lg-12 team-block">
                    <div class="inner-box">
                        <div class="image"><img style="height:270px;object-fit:cover;" src="{{$teeem->photo}}" alt=""></div>
                        <div class="content">
                            <div class="designation" style="width:100%;">{{$teeem->post}}</div>
                            <h4>{{$teeem->title}}</h4>
                            <div class="mail">
                                <a href="mailto:{{$teeem->email}}"><i class="flaticon-envelope" style="font-size: 13px;"></i> {{$teeem->email}}</a>
                            </div>
                            <div class="mail">
                                <a href="tel:{{$teeem->phone}}"><i class="fab fa-whatsapp" style="font-size: 13px;"></i> {{$teeem->phone}}</a>
                            </div>
                            <div class="hover-content" >
                                <ul class="social-icon" style="width: 170px;
                                text-align: center;">
                                    <li style="width: 100%;
                                    text-align: center;"><a href="{{$teeem->fb}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </div>
</section>

 <!-- History section -->
 <section class="history-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>Historique HPC Group</h2>
        </div>
        <div class="nav-tabs-wrapper">
            <div class="nav nav-tabs tab-btn-style-two">
                <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": false, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "2" }, "768" :{ "items" : "3" } , "992":{ "items" : "4" }, "1200":{ "items" : "4" }}}'>

                    @php
                        $ih = 0 ;
                    @endphp
                    @foreach ($history as $hist )

                    <ul class="item">
                        <li><a
                            @if ($ih == 0)
                            class="active"
                            @endif
                            data-toggle="tab" href="#tab-{{$hist->id}}">
                            <h4>{{$hist->year}}</h4>
                        </a></li>
                    </ul>
                    @php
                        $ih++ ;
                    @endphp
                    @endforeach


                </div>
            </div>
        </div>

        <div class="tab-content">
            @php
                $ih = 0 ;
            @endphp
            @foreach ($history as $hist )
            <div class="tab-pane fadeInUp animated
            @if ($ih == 0)
               active
            @endif
            " id="tab-{{$hist->id}}" role="tabpanel" aria-labelledby="tab-one">
                <div >
                    <div class="history-block">
                        <div class="row no-gutters">
                            <div class="col-md-2" style="padding: 50px;
                            padding-bottom: 45px;">
                                <div class="image"><img style="width: 100%;" src="{{$hist->photo}}" alt=""></div>
                            </div>
                            <div class="col-md-10">
                                <div class="content">
                                    <h4>{{$hist->title}} ({{$hist->year}})</h4>
                                    <div class="text">{!!$hist->description!!}</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                        $ih++ ;
                    @endphp
            @endforeach
        </div>
    </div>
</section>

@endsection
