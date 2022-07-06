<div class="header-top home-three">
    <div class="top-info">
        <div class="container">
            <div class="pull-left left-text">
                <p>Bienvenue chez <span>Plastic Maintenance Maroc!</span></p>
            </div><!-- /.pull-left -->
            <div class="pull-right social">
                <a href="#" class="fab fa-facebook-f"></a><!--
                --><a href="#" class="fab fa-twitter"></a><!--
                --><a href="#" class="fab fa-google-plus-g"></a><!--
                --><a href="#" class="fab fa-linkedin-in"></a>
            </div><!-- /.pull-right -->
        </div><!-- /.container -->
    </div><!-- /.top-info -->
    <div class="container">
        <div class="logo pull-left">
            <a href="index.html"><img src="{{asset('frontend/logo pmm.jpg')}}" /></a>
        </div><!-- /.logo -->
        <div class="header-right-info pull-right">

            <div class="single-header-right-info">
                <div class="icon-box">
                    <i class="industrio-icon-phone-call"></i>
                </div><!-- /.icon-box -->
                <div class="text-box">
                    <p>Téléphone Service commercial</p>
                    <h3>+212 (0) 661 99 23 05</h3>
                </div>
            </div>

            <div class="single-header-right-info">
                <div class="icon-box">
                    <i class="industrio-icon-phone-call"></i>
                </div><!-- /.icon-box -->
                <div class="text-box">
                    <p>Téléphone Service Technique</p>
                    <h3>+212 (0) 663 02 82 95</h3>
                </div><!-- /.text-box -->
            </div>
            <div class="single-header-right-info">
                <div class="icon-box">
                    <i class="industrio-icon-phone-call"></i>
                </div><!-- /.icon-box -->
                <div class="text-box">
                    <p>Téléphone Bureau</p>
                    <h3>+212 (0) 539 39 50 51 / 52 / 53</h3>
                </div><!-- /.text-box -->
            </div>

        </div><!-- /.header-right-info -->
    </div><!-- /.container -->
</div><!-- /.header-top home-one -->

<header class="header header-home-three">
    <nav class="navbar navbar-default header-navigation stricky">
        <div class="container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button class="side-nav-toggler side-nav-opener"><i class="fa fa-bars"></i></button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse main-navigation mainmenu " id="main-nav-bar">

                <ul class="nav navbar-nav navigation-box">
                    <li> <a href="{{route('home')}}">Accueil</a></li>
                    <li><a href="{{route('about.us')}}">A propos</a></li>

                    @foreach ( \App\Models\Category::where(['is_parent'=> 1,'status'=>'active'])->get() as $cat)
                    <li class="current">
                        <a>{{$cat->title}}</a>
                        <ul class="sub-menu">
                            @foreach ( \App\Models\Category::where(['is_parent'=> 0,'status'=>'active','parent_id'=> $cat->id])->orderby('title','ASC')->get() as $subcat )
                                <li><a href="{{route('local.ville',$subcat->slug)}}">{{$subcat->title}}</a></li>
                            @endforeach
                        </ul><!-- /.sub-menu -->
                    </li>
                    @endforeach

                    <li class="current">
                        <a >Expertise & Service</a>
                        <ul class="sub-menu">
                            @foreach ( \App\Models\Service::where(['status'=>'active'])->get() as $cat)
                            <li ><a href="{{route('service.detail',$cat->slug)}}">{{$cat->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="right-side-box">
                <a href="{{route('contact.us')}}" class="rqa-btn"><span class="inner">Contact <i class="fa fa-caret-right"></i></span></a>
            </div><!-- /.right-side-box -->
        </div><!-- /.container -->
    </nav>
</header><!-- /.header -->
