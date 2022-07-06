@extends('frontend.layouts.master')

@section('content')
@if(isset($cart_data) && !empty($cart_data))
                    @if(Cookie::get('shopping_cart'))
                        @php $total="0" @endphp
<div class="container" style="padding-top: 150px;padding-bottom: 80px">
<div class="my-properties">
    <table class="table-responsive">
        <thead>
            <tr>
                <th class="pl-2">Ma sélection</th>
                <th class="p-0"></th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart_data as $data)
            @php
                $items_list = \App\Models\Product::find($data['item_id']);
            @endphp
            @if ($items_list)


            <tr class="cartpage">
                <input type="hidden" class="product_id" value="{{ $data['item_id'] }}" >
                <td class="image myelist">
                    <a href="{{route('product.detail',$items_list->slug)}}"><img alt="{{$items_list->title}}" src="{{$items_list->photo}}" class="img-fluid"></a>
                </td>
                <td>
                    <div class="inner">
                        <a href="{{route('product.detail',$items_list->slug)}}"><h2>{{$items_list->title}}</h2></a>
                        <figure><i class="fa fa-map-marker"></i> {{$items_list->address}}</figure>
                    </div>
                </td>
                <td class="actions" style="text-align: center;padding-right: 0">
                    <a class="delete_cart_data" href="#"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
            @endif
            @endforeach

        </tbody>
    </table>
</div>
</div>
@endif
@else
<div style="padding-top: 150px;padding-bottom: 50px">
    <div class="container my-properties">
    <div class="row">
        <div class="col-md-12 mycard py-5 text-center">
            <div class="mycards">
                <h4>Votre liste de selection est vide.</h4>
                <a href="{{ route('tous.locaux') }}" class="btn btn-upper btn-primary outer-left-xs mt-5 button border" >Explorer les locaux</a>
            </div>
        </div>
    </div>
    </div>
</div>
@endif
@endsection
@section('scripts')
<script>
// Delete Cart Data
    $(document).ready(function () {

        $('.delete_cart_data').click(function (e) {
            e.preventDefault();

            var product_id = $(this).closest(".cartpage").find('.product_id').val();
            var data = {
                '_token': $('input[name=_token]').val(),
                "product_id": product_id,
            };

         $(this).closest(".cartpage").remove();

            $.ajax({
                url: "{{route('deleteselection.status')}}",
                type: 'GET',
                data: data,
                success: function (response) {
                   if(response.count == 0){
                       $('.my-properties').html('<div class="row"><div class="col-md-12 mycard py-5 text-center"><div class="mycards"><h4>Votre liste de selection est vide.</h4><a href="{{ route('tous.locaux') }}" class="btn btn-upper btn-primary outer-left-xs mt-5 button border">Explorer les locaux</a></div></div></div>');
                   }
                    // window.location.reload();
                }
            });
        });

    });
</script>
@endsection
