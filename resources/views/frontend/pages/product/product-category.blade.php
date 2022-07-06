@extends('frontend.layouts.master')

@section('content')

@if (count($gammes) !== 0)
<section class="portfolio-style-two sec-pad">
    <div class="container">
        <div class="gallery-filter">
            <ul class="post-filter masonary text-center">
                <li class="filter active" data-filter=".masonary-item"><span>Tous</span></li>
                @php
                $i = 0 ;
                @endphp
                @foreach ( $gammes as $gamme )
                <li class="filter" data-filter=".gamme-{{$gamme->id}}"><span>{{$gamme->title}}</span></li>
                @php
                if($i == 0){
                    $first_gamme = $gamme->id;
                }
                $i++ ;
                @endphp
                @endforeach
            </ul>

        </div><!-- /.gallery-filter -->
        <div class="row masonary-layout filter-layout" data-filter-class="filter" >

            @if (count( \App\Models\SousGamme::where('child_cat_id',$categories->id)->get()) == 0 )

            @php
            $i = 0 ;
            @endphp
            @foreach ( $products as $item )
                @php
                    $photos = explode(",",$item->photo);
                @endphp
                <div class="col-md-3 col-sm-6 col-xs-12  masonary-item  single-filter-item gamme-{{$item->gamme_id}} " >
                    <div class="single-portfolio-style-two">
                        <div class="img-box">
                        <img src="{{$item->photo}}" alt="{{$item->title}}" style="height: 250px;object-fit: contain;" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="{{route('product.detail',$item->slug)}}"><h3>{{$item->title}}</h3></a>
                                        <a href="{{route('product.detail',$item->slug)}}" class=" industrio-icon-next" style="color: #FE5A0E;
                                            font-size: 15px;
                                            position: absolute;
                                            top: 20px;
                                            right: 20px;"></a>
                                    </div><!-- /.content -->
                                </div><!-- /.box -->
                            </div><!-- /.overlay -->
                        </div><!-- /.img-box -->
                    </div><!-- /.single-portfolio-style-two -->
                </div>
                @php
                $i++ ;
                @endphp
            @endforeach


            @else

                @php
                $k = 0 ;
                $i = 0 ;
                @endphp
                @foreach ( $gammes as $gamme )

                    <div class="col-md-12 col-sm-12 col-xs-12 masonary-item single-filter-item gamme-{{$gamme->id}} ">
                        <div class="faq-style-one">
                            <div class="accrodion-grp" data-grp-name="faq-accrodion">

                                @php
                                    $i_sous = 0 ;
                                @endphp
                                @foreach (\App\Models\SousGamme::where('gamme_id',$gamme->id)->get() as $sous_gamme )

                                <div class="accrodion  active">
                                    <div class="accrodion-title">
                                        <h4>{{$sous_gamme->title}}</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <div class="row">
                                                @foreach ( $products as $item )
                                                @php
                                                    $photos = explode(",",$item->photo);
                                                @endphp
                                                @if ($item->sous_gamme_id == $sous_gamme->id)
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <div class="single-portfolio-style-two">
                                                        <div class="img-box">
                                                        <img src="{{$item->photo}}" alt="{{$item->title}}" style="height: 250px;object-fit: contain;" />
                                                            <div class="overlay">
                                                                <div class="box">
                                                                    <div class="content">
                                                                        <a href="{{route('product.detail',$item->slug)}}"><h3>{{$item->title}}</h3></a>
                                                                        <a href="{{route('product.detail',$item->slug)}}" class=" industrio-icon-next" style="color: #FE5A0E;
                                                                            font-size: 15px;
                                                                            position: absolute;
                                                                            top: 20px;
                                                                            right: 20px;"></a>
                                                                    </div><!-- /.content -->
                                                                </div><!-- /.box -->
                                                            </div><!-- /.overlay -->
                                                        </div><!-- /.img-box -->
                                                    </div>
                                                </div>
                                                @php
                                                $i++ ;
                                                @endphp
                                                @endif

                                            @endforeach
                                            </div>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                @php
                                $i_sous++ ;
                                @endphp
                                @endforeach
                            </div>
                            <!-- /.single-portfolio-style-two -->
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div><!-- /.container -->
</section>



@else
<!-- Shop section -->
<section class="shop-section" style="padding: 0px 0 90px;">
  empty
</section>
@endif



@endsection






@section('scripts')


@endsection

