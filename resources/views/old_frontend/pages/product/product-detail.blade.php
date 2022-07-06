@extends('frontend.layouts.master')

@section('content')
 <!-- Page Title -->
 <section class="page-title" style="background:black;">
    <div class="auto-container">
        <div class="content-box" style="padding: 63px 0px;">
            <div class="content-wrapper">

            </div>
        </div>
    </div>
</section>

<!-- shop-details -->
<section class="shop-details">
    <div class="auto-container">
        <div class="product-details-content">
            <div class="row clearfix">
                <div class="col-lg-6">
                    <div class="products-carousel">
                        <div class="single-product-view">
                            <div class="swiper-container product-content wow fadeInUp" data-wow-delay="300ms">
                                <div class="swiper-wrapper">
                                    @php
                                        $photos = explode(",",$product->photo)
                                    @endphp
                                    @foreach ($photos as $photo)
                                    <div class="swiper-slide">
                                        <div class="image"><img src="{{$photo}}" alt=""></div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 content-column">
                    <div class="product-details">
                        <div class="title-box">
                            <h3>{{$product->title}}</h3>
                        </div>
                        <div class="text">
                            <ul class="category clearfix">
                                <li>Categories:</li>
                                <li><a>{{\App\Models\Category::where('id',$product->cat_id)->value('title')}}</a></li>
                                <li>
                                    <a href="{{route('local.ville',\App\Models\Category::where('id',$product->child_cat_id)->value('slug'))}}">{{\App\Models\Category::where('id',$product->child_cat_id)->value('title')}}</a>
                                </li>
                            </ul>
                            <p>{!!$product->description!!}</p>
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

    </div>
</section>
<!-- shop-details end -->


@endsection
@section('upscripts')

@endsection
@section('scripts')


@endsection
