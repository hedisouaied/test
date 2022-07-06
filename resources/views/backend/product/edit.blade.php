@extends('backend.layouts.master')


@section('content')


<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-9">
                <div class="box-content card white">
                    <h4 class="box-title">Modifier local</h4>
                    <!-- /.box-title -->
                    <div class="col-md-12">

                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)

                                        <li>{{$error}}</li>

                                        @endforeach

                                    </ul>
                                </div>
                        @endif
                    </div>
                    <div class="card-content">
                        <form action="{{route('product.update',$product->id)}}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" placeholder="Nom" value="{{$product->title}}" name="title">
                            </div>

                            <div class="m-t-20">
                                <label>Photos</label>

                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$product->photo}}">
                                  </div>
                                <div id="holder" style="margin-top:15px;">
                                @php
                                    $ph = explode(',',$product->photo);

                                @endphp
                                @foreach ($ph as $p)
                                    <img src="{{$p}}" style="margin-top:15px;max-height:100px;" />
                                @endforeach
                                </div>
                            </div>

                            <div class="form-group margin-bottom-20">
                                <label for="exampleInputEmail1">Partenaires</label>
                                <select class="form-control" name="brand_id">
                                    <option value="">--Partenaires--</option>
                                    @foreach (\App\Models\Brand::get() as $brand)

                                    <option value="{{$brand->id}}" {{$product->brand_id==$brand->id? 'selected' : ''}}>{{$brand->title}}</option>


                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group margin-bottom-20">
                                <label for="exampleInputEmail1">Catégories</label>
                                <select id="cat_id" class="form-control" name="cat_id">
                                    <option value="">--Catégories--</option>
                                    @foreach (\App\Models\Category::where('is_parent',1)->get() as $cat)
                                    <option value="{{$cat->id}}" {{$product->cat_id==$cat->id? 'selected' : ''}}>{{$cat->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div id="child_cat_div" class="form-group margin-bottom-20 display-none">
                                <label for="exampleInputEmail1">Sous-catégories</label>
                                <select id="child_cat_id" class="form-control" name="child_cat_id">

                                </select>
                            </div>
                            <div id="gamme_div" class="form-group margin-bottom-20 display-none">
                                <label for="exampleInputEmail1">Gamme</label>
                                <select id="gamme_id" class="form-control" name="gamme_id" >

                                </select>
                            </div>
                            <div id="sous_gamme_div" class="form-group margin-bottom-20 display-none">
                                <label for="exampleInputEmail1">Sous Gamme</label>
                                <select id="sous_gamme_id" class="form-control" name="sous_gamme_id" >

                                </select>
                            </div>

                            <div class="m-t-20">
                                <label for="exampleInputEmail1">Description</label>

                                <textarea name="description" id="description" class="form-control" maxlength="225" rows="2" placeholder="Write some text....">{{$product->description}}</textarea>
                            </div>




                            <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Enregistrer</button>
                        </form>
                    </div>
                    <!-- /.card-content -->
                </div>
                <!-- /.box-content -->
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.main-content -->
</div>

@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>

<script>
    $(document).ready(function() {
        $('#description').summernote();
    });
  </script>

  <script>
      var child_cat_id = {{$product->child_cat_id}};
      $('#cat_id').change(function(){
        var cat_id=$(this).val();
       // alert(cat_id);
        if(cat_id != null){
            $.ajax({
                url: "/admin/localisation/"+cat_id+"/child",
                type: "POST",
                data:{
                    _token:"{{csrf_token()}}",
                    cat_id:cat_id
                },
                success:function(response){
                    var html_option="";
                    if(response.status){
                        $('#child_cat_div').removeClass('display-none');
                        $.each(response.data,function(id,title){
                            html_option +="<option value='"+id+"' "+(child_cat_id==id ? 'selected' : '')+">"+title+"</option>"
                        });
                    }
                    else{
                        $('#child_cat_div').addClass('display-none');
                    }
                    $('#child_cat_id').html(html_option);
                    $('#child_cat_id').change();
                }
            });
        }


      });
      if(child_cat_id !=null){
         $('#cat_id').change();
     }
  </script>


<script>
var gamme_id = {{$product->gamme_id}};
    $("#child_cat_id").change(function(){


            var child_cat_id=$(this).val();


                if(child_cat_id != null){
                    //alert(cat_id);
                    $.ajax({
                        url:"/admin/gamme/"+child_cat_id+"/child",
                        type:"POST",
                        data:{
                            _token:"{{csrf_token()}}",
                            child_cat_id:child_cat_id
                        },
                        success:function(response){
                            var html_option = "";
                            if(response.status){
                        //alert(cat_id);
                            $('#gamme_div').removeClass('display-none');
                            $.each(response.data,function(id,title){
                                html_option += "<option value='"+id+"' "+(gamme_id==id ? 'selected' : '')+" >"+title+"</option>";
                            });
                            }else{
                                $('#gamme_div').addClass('display-none');

                            }
                            $('#gamme_id').html(html_option);
                    $('#gamme_id').change();

                        }
                    });
                }
            });





</script>


<script>
    @if ($product->sous_gamme_id != null)
    var gamme_id = {{$product->sous_gamme_id}};
    @else
    var gamme_id = 0;
    @endif

        $("#gamme_id").change(function(){


                var child_cat_id=$(this).val();


                    if(child_cat_id != null){
                        //alert(cat_id);
                        $.ajax({
                            url:"/admin/sousgamme/"+child_cat_id+"/child",
                            type:"POST",
                            data:{
                                _token:"{{csrf_token()}}",
                                child_cat_id:child_cat_id
                            },
                            success:function(response){
                                var html_option = "";
                                if(response.status){
                            //alert(cat_id);
                                $('#sous_gamme_div').removeClass('display-none');
                                $.each(response.data,function(id,title){
                                    html_option += "<option value='"+id+"' "+(gamme_id==id ? 'selected' : '')+" >"+title+"</option>";
                                });
                                }else{
                                    $('#sous_gamme_div').addClass('display-none');

                                }
                                $('#sous_gamme_id').html(html_option);

                            }
                        });
                    }
                });





    </script>
@endsection
