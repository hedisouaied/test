<header class="main-header header-style-three">
    <div class="header-top">
        <div class="auto-container">
            <div class="inner-container">
                <div class="left-column">
                    <ul class="contact-info">
                        <li><a href="tel:{{get_setting('phone')}}"><i class="flaticon-phone-call"></i>{{get_setting('phone')}}</a></li>
                        <li><a href="mailto:{{get_setting('email')}}"><i class="flaticon-envelope"></i>{{get_setting('email')}}</a></li>
                    </ul>
                </div>
                <div class="right-column">
                    <ul class="header-menu">
                        <li><a href="{{route('news.list')}}">News</a></li>
                        <li><a href="{{route('event.list')}}">Evenements</a></li>
                    </ul>
                    <div class="language">
                        <i class="flaticon-earth-grid-select-language-button"></i>
                        <form action="#" class="language-switcher">
                            <select class="selectpicker lang-select" >

                                <option class="lang-es " data-lang="fr" value="fr" <?php if(isset($_COOKIE['googtrans'])) {if($_COOKIE['googtrans'] == '/fr/fr') {echo "selected";}}?> >Français</option>

                                <option class="lang-es " data-lang="en" value="en" <?php if(isset($_COOKIE['googtrans'])) {if($_COOKIE['googtrans'] == '/fr/en') {echo "selected";} }?>>Anglais</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-upper">
        <div class="auto-container">
            <div class="inner-container" style="background: rgba(0,0,0,0.5);">
                <div class="left-column">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo" style="background: white;"><a href="{{route('home')}}"><img src="{{asset('frontend/logo-HPC.png')}}" alt=""></a></div>
                    </div>
                    <!--Nav Box-->
                    <div class="nav-outer">
                        <div class="mobile-nav-toggler"><img src="{{asset('frontend/assets/images/icons/icon-bar-4.png')}}" alt=""></div>

                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation">
                                    <li><a href="{{route('home')}}">Accueil</a></li>
                                    <li><a href="{{route('about.us')}}">A propos</a></li>
                                    <li class="dropdown"><a>Nos Produits</a>
                                        <ul>
                                            @foreach ( \App\Models\Category::where(['is_parent'=> 1,'status'=>'active'])->get() as $cat)
                                            <li class="dropdown"><a>{{$cat->title}}</a>
                                                <ul>
                                                    @foreach ( \App\Models\Category::where(['is_parent'=> 0,'status'=>'active','parent_id'=> $cat->id])->orderby('title','ASC')->get() as $subcat )
                                                        <li><a href="{{route('local.ville',$subcat->slug)}}">{{$subcat->title}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a>Expertise & Service</a>
                                        <ul>
                                            @foreach ( \App\Models\Service::where(['status'=>'active'])->get() as $cat)
                                            <li ><a href="{{route('service.detail',$cat->slug)}}">{{$cat->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="index.html">Actualités</a>
                                        <ul>
                                            <li><a href="{{route('news.list')}}">News</a></li>
                                            <li><a href="{{route('event.list')}}">Evenement</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('contact.us')}}">Contact</a></li>
                                    <li><a href="{{get_setting('catalogue')}}" download><i class="fa fa-download"></i>  Télécharger Catalogue</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="right-column">

                    <div class="navbar-right-info">
                        <ul class="social-links">
                            <li><a href="{{get_setting('facebook')}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{get_setting('instagram')}}"><i class="fab fa-instagram" target="_blank"></i></a></li>
                            <li><a href="{{get_setting('twitter')}}"><i class="fab fa-twitter" target="_blank"></i></a></li>
                            <li><a href="{{get_setting('linkedin')}}"><i class="fab fa-linkedin" target="_blank"></i></a></li>
                            <li><a href="{{get_setting('youtube')}}"><i class="fab fa-youtube" target="_blank"></i></a></li>
                        </ul>
                        <div class="side-menu-nav sidemenu-nav-toggler"><img src="{{asset('frontend/assets/images/icons/icon-bar-5.png')}}" alt=""></div>
                        <div class="link-btn"><a href="#"><span>S.A.V</span> <i class="flaticon-right-arrow-3"></i> </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="left-column">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo" style="background: white;"><a href="{{route('home')}}"><img src="{{asset('frontend/logo-HPC.png')}}" alt=""></a></div>
                        </div>
                        <!--Nav Box-->
                        <div class="nav-outer">

                            <div class="mobile-nav-toggler"><img src="{{asset('frontend/assets/images/icons/icon-bar-3.png')}}" alt=""></div>

                            <nav class="main-menu navbar-expand-md navbar-light">
                            </nav>
                        </div>
                    </div>
                    <div class="right-column">

                        <div class="navbar-right-info">
                            <ul class="social-links">
                                <li><a href="{{get_setting('facebook')}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{get_setting('instagram')}}"><i class="fab fa-instagram" target="_blank"></i></a></li>
                            <li><a href="{{get_setting('twitter')}}"><i class="fab fa-twitter" target="_blank"></i></a></li>
                            <li><a href="{{get_setting('linkedin')}}"><i class="fab fa-linkedin" target="_blank"></i></a></li>
                            <li><a href="{{get_setting('youtube')}}"><i class="fab fa-youtube" target="_blank"></i></a></li>
                            </ul>
                            <div class="side-menu-nav sidemenu-nav-toggler"><img src="{{asset('frontend/assets/images/icons/icon-bar-5.png')}}" alt=""></div>
                            <div class="link-btn"><a href="#"><span>S.A.V</span> <i class="flaticon-right-arrow-3"></i> </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Sticky Menu -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-remove"></span></div>

        <nav class="menu-box">
            <div class="nav-logo" style="background: white;width: 80%;"><a href="{{route('home')}}"><img src="{{asset('frontend/logo-HPC.png')}}" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="{{get_setting('facebook')}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{get_setting('instagram')}}"><i class="fab fa-instagram" target="_blank"></i></a></li>
                    <li><a href="{{get_setting('twitter')}}"><i class="fab fa-twitter" target="_blank"></i></a></li>
                    <li><a href="{{get_setting('linkedin')}}"><i class="fab fa-linkedin" target="_blank"></i></a></li>
                    <li><a href="{{get_setting('youtube')}}"><i class="fab fa-youtube" target="_blank"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="nav-overlay">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div>
</header>

<section class="hidden-sidebar close-sidebar">
    <div class="wrapper-box">
        <div class="content-wrapper">
            <div class="hidden-sidebar-close"><span class="flaticon-close"></span></div>
            <div class="text-widget sidebar-widget">
                <div class="logo"><a href="{{route('home')}}"><img src="{{asset('frontend/logo-white-HPC.svg')}}" style="background: white;padding:3px;" alt=""></a></div>

                <div class="text">Le groupe a pour dénomination sociale high-tech plastic center « hpc-group » spécialiste dans le secteur de la plasturgie.</div>
            </div>
            <div class="new-widget-two widget">
                <h4 class="widget_title">News & Evenements</h4>
                <div class="content-widget">
                    @foreach (\App\Models\Blog::where(['status' => 'active'])->orderBy('id', 'DESC')->limit('2')->get(); as $blog_side )
                    <article class="post">
                        <figure class="post-thumb">
                            <a href="{{route('blog.detail',$blog_side->slug)}}">
                            <img src="{{$blog_side->photo}}" style="width: 80px;height:80px;object-fit: cover;" alt="">
                            </a>
                        </figure>
                        <div class="content">
                            <div class="post-info"><i class="far fa-clock"></i> @php
                                $date = date('Y-m-d',strtotime($blog_side->updated_at));
                                setlocale (LC_TIME, 'fr_FR.utf8','fra');
                                echo (strftime("%A %d %B %Y",strtotime($date)));
                            @endphp</div>
                            <h5><a href="{{route('blog.detail',$blog_side->slug)}}">{{$blog_side->title}}</a></h5>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="brochure-widget widget">
                <h4 class="widget_title">Catalogue</h4>
                <div class="widget-content">
                    <div class="single-brochure"><a href="{{get_setting('catalogue')}}" download ><i class="flaticon-pdf-file-format-symbol"></i> Catalogue.pdf</a></div>
                </div>
            </div>
            <div class="copyright-text">Copyright © 2022 <a href="https://tounesconnect.com/" target="_blank"> Tounes Connect.</a> All Rights Reserved.</div>
        </div>
    </div>
</section>


