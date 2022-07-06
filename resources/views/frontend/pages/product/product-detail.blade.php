@extends('frontend.layouts.master')

@section('content')

<section class="project-details">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                @php
                    $photos = explode(",",$product->photo)
                @endphp
                @foreach ($photos as $photo)
                <img src="{{$photo}}" />
                @endforeach
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="project-details-content">
                    <h3>{{$product->title}}</h3>
                    <br />
                    <ul class="meta-info">
                        <li><i class="fa fa-tag"></i><span>Categories:</span>{{\App\Models\Category::where('id',$product->cat_id)->value('title')}} , <a href="{{route('local.ville',\App\Models\Category::where('id',$product->child_cat_id)->value('slug'))}}">{{\App\Models\Category::where('id',$product->child_cat_id)->value('title')}}</a></li>
                    </ul>
                    <br />
                    <p>{!!$product->description!!}</p>
                    <br />


                </div>
            </div>
        </div>
    </div>
</section>



@endsection
@section('upscripts')

@endsection
@section('scripts')


@endsection
