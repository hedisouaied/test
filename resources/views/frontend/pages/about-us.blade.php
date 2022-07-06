@extends('frontend.layouts.master')

@section('content')






<section class="about-style-three">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="about-img-box">
                    <img src="{{get_setting('image')}}" alt="About us" style="width: 100%;"/>
                    <div class="content">
                        <span>{{get_setting('heading')}}</span>
                        <h3>A propos de <br/> NOUS</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div>
                    <p>{!!get_setting('content')!!}</p>
                </div><!-- /.about-content -->
            </div>

        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.about-style-three -->




@endsection
