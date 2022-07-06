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

<!-- News Section -->
<section class="sidebar-page-container" >
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8">
                <div class="news-block-two blog-single-post">
                    <div class="inner-box">
                        <div class="upper-content">
                            <div class="category">[ <i class="far fa-folder-open"></i> @if ($blog->type_blog == "event")
                                Evenements
                            @else
                                News
                            @endif ]</div>
                            <h3>{{$blog->title}}</h3>
                            <ul class="post-meta">
                                <li><a href="#"><i class="far fa-user"></i>HPC Group</a></li>
                                <li><a href="#"><i class="far fa-clock"></i>@php
                                    $date = date('Y-m-d',strtotime($blog->updated_at));
                                    setlocale (LC_TIME, 'fr_FR.utf8','fra');
                                    echo (strftime("%A %d %B %Y",strtotime($date)));
                                @endphp</a></li>
                            </ul>
                        </div>
                        <div class="image">
                            <img src="{{$blog->photo}}" alt="">
                        </div>
                        <div class="lower-content">
                            <div class="text mb-40">
                                {!!$blog->description!!}
                            </div>

                            <div class="share-option">
                                <p>Partager Sur :</p>


                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_twitter"></a>
                                    <a class="a2a_button_linkedin"></a>
                                    </div>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                    <!-- AddToAny END -->
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <aside class="col-lg-4 sidebar">
                <div class="blog-sidebar">

                    
                    <div class="widget widget_categories">
                        <h4 class="widget_title">Actualités</h4>
                        <div class="widget-content">
                            <ul class="categories-list clearfix">
                               <li><a href="{{route('news.list')}}">News <span>({{\App\Models\Blog::where('type_blog','news')->count()}})</span></a></li>
                                <li><a href="{{route('event.list')}}"> Evenement <span>({{\App\Models\Blog::where('type_blog','event')->count()}})</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- news widget -->
                    <div class="news-widget widget">
                        <h4 class="widget_title">Latest Post</h4>
                        <div class="news-content">
                            @foreach ($related_blogs as $r_blog )
                            <h4><a href="{{route('blog.detail',$r_blog->slug)}}">{{$r_blog->title}} <i class="flaticon-arrow-1"></i></a></h4>
                            @endforeach

                        </div>
                    </div>

                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
