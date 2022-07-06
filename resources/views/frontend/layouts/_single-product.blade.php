

@foreach ($products as $item)
@if (\App\Models\Category::where(['id' => $item->cat_id])->value('status') == 'active')
@if (\App\Models\Brand::where(['id' => $item->brand_id])->value('status') == 'active')


@php
    $photos = explode(",",$item->photo);
@endphp
<div class="col-lg-4 col-md-6 shop-block">
    <div class="inner-box">
        <div class="image"><a href="{{route('product.detail',$item->slug)}}"><img src="{{$item->photo}}" alt=""></a></div>
        <div class="content-upper">
            <h4><a href="{{route('product.detail',$item->slug)}}">{{$item->title}}</a></h4>

        </div>
        <div class="bottom-content" style="padding: 13%;">

            <div class="link"><a href="{{route('product.detail',$item->slug)}}"><i class="flaticon-arrow-1"></i></a></div>
        </div>
    </div>
</div>
@endif
@endif
@endforeach

