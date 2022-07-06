@extends('frontend.layouts.master')


@section('content')

@foreach ($societe as  $par)
<!--Search Popup-->
<div id="search-popup{{$par->id}}" class="search-popup">
    <div class="close-search theme-btn"><span class="flaticon-remove"></span></div>
    <div class="popup-inner">
        <div class="overlay-layer"></div>
        <div class="search-form" style="background: white;height:100%;">


    <section class="about-section-five pt-1" >
        <div class="auto-container">
            <div class="row">

                <div class="col-lg-12">

                        <div class="sec-title mb-0">

                            <h2 class="text-center">{{$par->title}}</h2>
                        </div>

                    <div class="image text-center" ><img src="{{$par->photo}}" style="width:10%;" alt=""></div>
                    <div class="text">
                        <p>{!!$par->description!!}</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

        </div>
    </div>
</div>

@endforeach

<!-- Bnner Section -->
<section class="banner-section style-three" >
    <div class="swiper-container banner-slider">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner )
            <div class="swiper-slide" style="background-image: url({{$banner->photo}});">
                <div class="content-outer">
                    <div class="content-box">
                        <div class="inner">
                            <h1 style="background: rgba(0,0,0,0.5);padding: 15px;">{{$banner->title}}</h1>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
    <div class="banner-slider-nav">
        <div class="banner-slider-control banner-slider-button-next"><span><i class="flaticon-arrow-1"></i></span> </div>
        <div class="banner-slider-control banner-slider-button-prev"><span><i class="flaticon-arrow-1"></i></span></div>
    </div>
</section>
<!-- End Bnner Section -->


<!-- Client logo section -->
<section class="clients-logo-section" style="border-top: solid #e33e29;border-bottom: solid #e33e29;background: white;padding:65px 0;">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>Sociétés Du Groupe</h2>
        </div>

        <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "2" }, "600" :{ "items" : "3" }, "768" :{ "items" : "4" } , "992":{ "items" : "5" }, "1200":{ "items" : "5" }}}'>

                @foreach ($societe as  $par)
                    <div class="single-client-logo" style="text-align: center;padding-left:15px;">
                        <img src="{{$par->photo}}" class="search-toggler{{$par->id}}" style="height: 80px;object-fit: contain;cursor:pointer;" alt="{{$par->title}}" title="{{$par->title}}">
                    </div>
                @endforeach


        </div>
    </div>
</section>

<!-- Testimonails section three -->
<section class="testimonials-section-three">
    <div class="auto-container">

        <div class="row " >
            <div class="col-lg-6">
                <iframe style="width: 100%;" width="560" height="315" src="https://www.youtube.com/embed/9GQAKZxpN7I?autoplay=1&mute=1&controls=0&rel=0&modestbranding=1&autohide=1&showinfo=0&playlist=9GQAKZxpN7I&loop=1"  ></iframe>

            </div>
            <div class="col-lg-6">
                <div class="sec-title mb-30">
                    <div class="sub-title">Mot du Président Du Groupe</div>
                    <h2><q style="font-size: 18px;">{!!get_setting('mot_president')!!}</q></h2>

                </div>
                <div class="row">

                        <div class="col-lg-12 testimonial-block-three">
                            <div class="inner-box">
                                <div class="image">
                                    <div class="image-wrapper"><img style="width:20%;" src="{{get_setting('photo_mot_president')}}" alt=""></div>
                                    <div class="quote-icon"><span class="flaticon-right-quote-1"></span></div>
                                </div>
                                <h4>{{get_setting('nom_mot_president')}}</h4>
                                <div class="designation">{{get_setting('poste_mot_president')}}</div>
                            </div>
                        </div>

                </div>
            </div>
            <div class="col-lg-12 pt-3" style="background:black;background-image: url({{asset('frontend/assets/images/shape/shape-4.png')}});background-size:cover;
            border-top: 7px #ee3032 solid;">
                <div class="text text-white" id="see_more" style="height: 140px;overflow: hidden;-webkit-mask-image: linear-gradient(#fff,#fff,rgba(255,255,255,0));">
                    {!!get_setting('desc_mot_president')!!}

                </div>
                <div style="text-align: center;">

                    <button id="btn_more" class="btn btn-primary " style="background:#ee3032;border-color: #ee3032;margin: auto;"  onclick="document.getElementById('see_more').style.cssText = 'height: auto;overflow: hidden;-webkit-mask-image: linear-gradient(#fff,#fff,rgba(255,255,255,1));';document.getElementById('btn_more').style.cssText ='display:none;background:#ee3032;border-color: #ee3032;margin: auto;';document.getElementById('btn_less').style.cssText ='display:block;background:#ee3032;border-color: #ee3032;margin: auto;';">Plus <i class="fa fa-angle-down"></i></button>

                    <button id="btn_less" class="btn btn-primary " style="display: none;background:#ee3032;border-color: #ee3032;margin: auto;" onclick="document.getElementById('see_more').style.cssText = 'height: 140px;overflow: hidden;-webkit-mask-image: linear-gradient(#fff,#fff,rgba(255,255,255,0));';document.getElementById('btn_more').style.cssText ='display:block;background:#ee3032;border-color: #e33e29;margin: auto;';document.getElementById('btn_less').style.cssText ='display:none;background:#ee3032;border-color: #ee3032;margin: auto;';">Moins <i class="fa fa-angle-up"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Whychoose us section two -->
<section class="whychoose-us-section-two" style="padding-top: 60px !important;">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>Pourquoi Nous Choisir ?</h2>
        </div>
        <div class="wrapper-box">
            <div class="row">
                <div class="col-lg-4 left-column">
                    <div class="why-choose-us-block-two inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-clock-4"></i></div>
                            <h4>{{get_setting('title1_wcu')}}</h4>
                            <div class="text">{{get_setting('desc1_wcu')}}</div>
                        </div>
                    </div>
                    <div class="why-choose-us-block-two inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="3000ms">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-robot-arm-1"></i></div>
                            <h4>{{get_setting('title2_wcu')}}</h4>
                            <div class="text">{{get_setting('desc2_wcu')}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 right-column order-lg-2">
                    <div class="why-choose-us-block-two inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-winner-1"></i></div>
                            <h4>{{get_setting('title3_wcu')}}</h4>
                            <div class="text">{{get_setting('desc3_wcu')}}</div>
                        </div>
                    </div>
                    <div class="why-choose-us-block-two inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="3000ms">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-global-warming"></i></div>
                            <h4>{{get_setting('title4_wcu')}}</h4>
                            <div class="text">{{get_setting('desc4_wcu')}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="image" style="text-align: center"><img style="width:75%;" src="{{get_setting('photo_wcu')}}" alt=""></div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Client logo section -->
<section class="clients-logo-section" style="border-top: solid #e33e29;border-bottom: solid #e33e29;background: white;">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>Nos Partenaires</h2>
        </div>
        <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 1000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "2" }, "600" :{ "items" : "3" }, "768" :{ "items" : "4" } , "992":{ "items" : "5" }, "1200":{ "items" : "5" }}}'>

                @foreach ($partenaires as  $par)
                    <div class="single-client-logo" style="text-align: center;padding-left:15px;">
                        <img src="{{$par->photo}}" style="height: 80px;object-fit: contain;" alt="{{$par->title}}" title="{{$par->title}}">
                    </div>
                @endforeach


        </div>
    </div>
</section>

<!-- Projects section three -->
<section class="projects-section-three">
    <div class="auto-container">
        <div class="row m-0 top-content justify-content-between align-items-center">
            <div class="sec-title">
                <h2>Expertise & Service</h2>
            </div>
        </div>
        <div class="wrapper-box">
            <div class="row">
                <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "3" }}}'>



                    @foreach ($services as $service )
                    <div class="col-lg-12 project-block-three">
                        <div class="inner-box">
                            <div class="image"><img src="{{$service->photo}}" alt="" style="height: 280px;object-fit: cover;"></div>
                            <div class="lower-content">
                                <h5>#Expertise & service</h5>
                                <h4>{{$service->title}}</h4>
                                <div class="link-btn"><a href="{{route('service.detail',$service->slug)}}"><i class="flaticon-arrow-1"></i></a></div>
                            </div>
                        </div>
                    </div>

                    @endforeach

            </div>
        </div>
    </div>
</section>

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




<!-- News Section style-three -->
<section class="news-section style-three">
    <div class="auto-container">
        <div class="sec-title text-center">
            <div class="sub-title">News & Evenements</div>
            <h2>Dérniers Actualités</h2>
        </div>
        <div class="row">

                @foreach ( $blog as $bloo)
                <div class="col-lg-4 news-block">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{$bloo->photo}}" style="height: 270px;object-fit: cover;" alt="">
                            <div class="overlay-two">
                                <a href="{{route('blog.detail',$bloo->slug)}}"><span class="fa fa-chevron-right"></span></a>
                            </div>
                            <div class="date"><i class="far fa-clock"></i>@php
                                $date = date('Y-m-d',strtotime($bloo->updated_at));
                                setlocale (LC_TIME, 'fr_FR.utf8','fra');
                                echo (strftime("%A %d %B %Y",strtotime($date)));
                            @endphp</div>
                        </div>
                        <div class="lower-content">
                            <div class="category">[<i class="fas fa-folder"></i>
                                @if ($bloo->type_blog == "event")
                                    Evenements
                                @else
                                    News
                                @endif
                                ]</div>
                            <h3><a href="{{route('blog.detail',$bloo->slug)}}">{{$bloo->title}}</a></h3>
                            <div class="post-meta-two">
                                <div class="read-more-btn"><a href="{{route('blog.detail',$bloo->slug)}}">Lire plus<i class="flaticon-right-arrow-3"></i></a></div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

        </div>
    </div>
</section>


@endsection


@section('scripts')
<script>

    @foreach ($societe as  $par)





                    //Show Popup
                    $('.search-toggler{{$par->id}}').on('click', function() {
                        $('#search-popup{{$par->id}}').addClass('popup-visible');
                    });
                    $(document).keydown(function(e){
                        if(e.keyCode === 27) {
                            $('#search-popup{{$par->id}}').removeClass('popup-visible');
                        }
                    });
                    //Hide Popup
                    $('.close-search,.search-popup .overlay-layer').on('click', function() {
                        $('#search-popup{{$par->id}}').removeClass('popup-visible');
                    });




    @endforeach
</script>
@endsection

