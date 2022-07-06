 <!-- Newsletter -->
 <section class="newsletter">
    <div class="auto-container">
        <div class="wrapper-box">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="icon"><img src="{{asset('frontend/assets/images/icons/icon-43.png')}}" alt=""></div>
                        <h3>Abonnez à Newsletter</h3>
                        <div class="text">Abonnez à Newletter & recevez les actualités par email.</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="newsletter-form">
                        <form action="" method="post" class="news_data">
                            <div class="form-group">
                                <input class="news_id" type="email" placeholder="Entrez votre adresse email..." id="subscription-email" name="email">
                                <button type="submit" class="theme-btn add-to-news-btn"><span><i class="flaticon-arrow-1"></i></span></button>
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Main Footer-->
<footer class="main-footer style-three" style="background-image: url({{asset('frontend/assets/images/background/bg-12.jpg')}});">
    <div class="upper-box">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget links-widget">
                        <h4 class="widget_title">Notre Groupe</h4>
                        <div class="widget-content">
                            <ul class="list">
                                <li><a href="{{route('home')}}">Accueil</a></li>
                                <li><a href="{{route('about.us')}}">A propos</a></li>
                                <li><a href="{{route('news.list')}}">News</a></li>
                                <li><a href="{{route('event.list')}}">Evenement</a></li>
                                <li><a href="{{route('contact.us')}}">Contact</a></li>
                                <li><a  href="{{get_setting('catalogue')}}" download >Télécharger Catalogue</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="widget links-widget">
                        <h4 class="widget_title">Expertise & Service</h4>
                        <div class="widget-content">
                            <ul class="list">
                                @foreach ( \App\Models\Service::where(['status'=>'active'])->get() as $cat)
                                 <li ><a href="{{route('service.detail',$cat->slug)}}">{{$cat->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widget estimate-widget">
                        <div class="widget-content">
                            <div class="icon">
                                <img src="{{asset('frontend/logo-white-HPC.png')}}" alt="">
                            </div>
                            <h4>HPC Group</h4>
                            <div class="text">Le groupe a pour dénomination sociale high-tech plastic center « hpc-group » spécialiste dans le secteur de la plasturgie.</div>
                            <div class="read-more-btn"><a href="{{route('about.us')}}">A propos de nous<i class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="wrapper-box">
                <div class="row m-0 align-items-center justify-content-between">
                    <div class="copyright-text">Copyright © 2021 <a href="https://tounesconnect.com/" target="_blank"> Tounes Connect.</a> All Rights Reserved.</div>

                </div>
            </div>
        </div>
    </div>
</footer>
<!--End Main Footer-->
