@extends('frontend.layouts.master')


@section('content')



<div id="minimal-bootstrap-carousel" class="carousel slide carousel-fade slider-home-one slider-home-three" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

        @php
            $i = 1 ;
        @endphp
        @foreach ($banners as $banner )

        <div class="item @if ($i == 1)
            active
        @endif slide-{{$i}}" style="background-image: url({{$banner->photo}});background-position: center center;">

            <div class="carousel-caption">
                <div class="container">
                    <div class="box valign-middle">
                        <div class="content text-center">
                            <h2 data-animation="animated fadeInUp" style="background: rgba(0,0,0,0.5);padding: 15px;" >{{$banner->title}}</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $i++ ;
        @endphp
        @endforeach



    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#minimal-bootstrap-carousel" role="button" data-slide="prev">
        <i class="fas fa-angle-left"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#minimal-bootstrap-carousel" role="button" data-slide="next">
        <i class="fas fa-angle-right"></i>
        <span class="sr-only">Next</span>
    </a>

    <ul class="carousel-indicators list-inline custom-navigation">
        @php
            $i = 0 ;
        @endphp
        @foreach ($banners as $banner )
        <li data-target="#minimal-bootstrap-carousel" data-slide-to="{{$i}}" class="@if ($i == 0)
        active
    @endif"></li>
        @php
            $i++ ;
        @endphp
        @endforeach

    </ul>
</div>


<section class="about-style-two sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="about-content">
                    <h3><span>Mot du Président Du Groupe</span></h3>

                    <div class="quote-box">
                        <img src="{{asset('frontend/img/about-quote.png')}}" alt="Awesome Image"/>
                        <p>{!!get_setting('mot_president')!!}</p>
                        <h4>{{get_setting('nom_mot_president')}}, {{get_setting('poste_mot_president')}}</h4>
                    </div>
                    <!-- /.qoute-box -->


                    <div  id="see_more" style="height: 140px;overflow: hidden;-webkit-mask-image: linear-gradient(#fff,#fff,rgba(255,255,255,0));">
                        {!!get_setting('desc_mot_president')!!}

                    </div>
                    <div >

                        <button id="btn_more" class="btn btn-primary" style="background:#ee3032;border-color: #ee3032;"  onclick="document.getElementById('see_more').style.cssText = 'height: auto;overflow: hidden;-webkit-mask-image: linear-gradient(#fff,#fff,rgba(255,255,255,1));';document.getElementById('btn_more').style.cssText ='display:none;background:#ee3032;border-color: #ee3032;';document.getElementById('btn_less').style.cssText ='display:block;background:#ee3032;border-color: #ee3032;';">Plus <i class="fa fa-angle-down"></i></button>

                        <button id="btn_less" class="btn btn-primary " style="display: none;background:#ee3032;border-color: #ee3032;" onclick="document.getElementById('see_more').style.cssText = 'height: 140px;overflow: hidden;-webkit-mask-image: linear-gradient(#fff,#fff,rgba(255,255,255,0));';document.getElementById('btn_more').style.cssText ='display:block;background:#ee3032;border-color: #e33e29;';document.getElementById('btn_less').style.cssText ='display:none;background:#ee3032;border-color: #ee3032;';">Moins <i class="fa fa-angle-up"></i></button>
                    </div>


                </div>
                <!-- /.about-content -->
            </div><!-- /.col-md-7 -->
            <div class="col-md-5">
                <div class="video-box">
                    <iframe style="width: 100%;" width="560" height="315" src="https://www.youtube.com/embed/9GQAKZxpN7I?autoplay=1&mute=1&controls=0&rel=0&modestbranding=1&autohide=1&showinfo=0&playlist=9GQAKZxpN7I&loop=1"  ></iframe>
                </div><!-- /.video-box -->
            </div><!-- /.col-md-5 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>



<!-- Whychoose us section two -->


<section class="fact-counter-section">
    <div class="container">
        <div class="sec-title text-center light">
            <h3>Pourquoi <span>Nous Choisir</span> ?</h3>
        </div><!-- /.sec-title text-center light -->
        <div class="row">

            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="progress-box">
                    <p>
                        <img style="width:100%;" src="{{get_setting('photo_wcu')}}" alt="">
                    </p>

                </div><!-- /.progress-box -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="fact-counter row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="single-fact-counter">
                            <div class="icon-box">
                                <i class="industrio-icon-innovation"></i>
                            </div>
                            <div class="text-box">
                                <h3 >{{get_setting('title1_wcu')}}</h3>
                                <p>{{get_setting('desc1_wcu')}}</p>
                            </div><!-- /.text-box -->
                        </div><!-- /.single-fact-counter -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="single-fact-counter">
                            <div class="icon-box">
                                <i class="industrio-icon-factory-1"></i>
                            </div>
                            <div class="text-box">
                                <h3 >{{get_setting('title2_wcu')}}</h3>
                                <p>{{get_setting('desc2_wcu')}}</p>
                            </div><!-- /.text-box -->
                        </div><!-- /.single-fact-counter -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="single-fact-counter">
                            <div class="icon-box">
                                <i class="fa fa-thumbs-up"></i>
                            </div><!-- /.icon-box -->
                            <div class="text-box">
                                <h3 >{{get_setting('title3_wcu')}}</h3>
                                <p>{{get_setting('desc3_wcu')}}</p>
                            </div><!-- /.text-box -->
                        </div><!-- /.single-fact-counter -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="single-fact-counter">
                            <div class="icon-box">
                                <i class="fa fa-globe"></i>
                            </div><!-- /.icon-box -->
                            <div class="text-box">
                                <h3 >{{get_setting('title4_wcu')}}</h3>
                                <p>{{get_setting('desc4_wcu')}}</p>
                            </div><!-- /.text-box -->
                        </div><!-- /.single-fact-counter -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.fact-counter -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>


<section class="blog-style-one sec-pad pb0">
    <div class="container">
        <div class="sec-title">
            <h3>Nos <span>Partenaires</span></h3>
        </div><!-- /.sec-title -->

    </div><!-- /.container -->
</section><!-- /.blog-style-one -->

<section class="brand-carousel-area" style="padding-top: 0;">
    <div class="container">
        <div class="brand-carousel owl-carousel owl-theme" ata-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 1000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "2" }, "600" :{ "items" : "3" }, "768" :{ "items" : "4" } , "992":{ "items" : "5" }, "1200":{ "items" : "5" }}}'>
            @foreach ($partenaires as  $par)
            <div class="item">
                <img src="{{$par->photo}}" style="height: 80px;object-fit: contain;" alt="{{$par->title}}" title="{{$par->title}}">
            </div><!-- /.item -->
            @endforeach
        </div><!-- /.brand-carousel owl-carousel owl-theme -->
    </div><!-- /.container -->
</section><!-- /.brand-carousel-area -->






<section class="service-style-three sec-pad">
    <div class="container">
        <div class="sec-title text-center">
            <h3>Expertise <span>&</span> Service</h3>
        </div><!-- /.sec-title -->
        <div class="row">
            @foreach ($services as $service )
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-service-style-three">
                    <div class="img-box">
                        <img src="{{$service->photo}}" style="width: 100%;height: 290px;object-fit: cover;" alt="{{$service->title}}"/>
                        <div class="text-box text-center">
                            <div class="inner hvr-bounce-to-bottom" style="width: 100%">

                                <a href="{{route('service.detail',$service->slug)}}"><h3>{{$service->title}}</h3></a>
                                <a href="{{route('service.detail',$service->slug)}}" class="more">Lire Plus <i class="fa fa-arrow-right"></i></a>
                            </div><!-- /.inner -->
                        </div><!-- /.text-box -->
                    </div><!-- /.img-box -->
                </div><!-- /.single-service-style-three -->
            </div>
            @endforeach
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.service-style-three -->



@endsection


@section('scripts')


@endsection

