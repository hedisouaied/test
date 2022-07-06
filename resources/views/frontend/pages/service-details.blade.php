@extends('frontend.layouts.master')

@section('content')

<section class="service-page service-details-page">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="single-sidebar service-sidebar">
                        <ul class="service-list">
                            @foreach ($related_blogs as $all )
                            <li
                            @if ($all->id == $blog->id)
                            class="active"
                            @endif

                            >
                            <a href="{{route('service.detail',$all->slug)}}">
                                {{$all->title}}
                            </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="service-item-box service-details-content">
                    <div class="img-box">
                        <img src="{{$blog->photo}}" style="width: 100%;" />
                    </div>
                    <br />
                    <br />
                    <h3>{{$blog->title}}</h3>
                    <br />
                    <p>{!!$blog->description!!}</p>
                    <br />

                </div>
            </div>
        </div>
    </div>
</section>



@endsection
