@extends('backend.layouts.master')


@section('content')


<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-9">
                <div class="box-content card white">
                    <h4 class="box-title">Ajouter produit</h4>
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
                        <form action="{{route('product.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom" value="{{old('title')}}" name="title">
                            </div>

                            <div class="m-t-20">
                                <label>Photos</label>

                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo">
                                  </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>

                            <div class="form-group margin-bottom-20">
                                <label for="exampleInputEmail1">Partenaire</label>
                                <select class="form-control" name="brand_id">
                                    <option value="">--Partenaire--</option>
                                    @foreach (\App\Models\Brand::get() as $brand)

                                    <option value="{{$brand->id}}" {{old('brand_id')==$brand->id? 'selected' : ''}}>{{$brand->title}}</option>


                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group margin-bottom-20">
                                <label for="exampleInputEmail1">Categories</label>
                                <select id="cat_id" class="form-control" name="cat_id" required>
                                    <option value="">--Categorie Parente--</option>
                                    @foreach (\App\Models\Category::where('is_parent',1)->get() as $cat)
                                    <option value="{{$cat->id}}" {{old('cat_id')==$cat->id? 'selected' : ''}}>{{$cat->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div id="child_cat_div" class="form-group margin-bottom-20 display-none">
                                <label for="exampleInputEmail1">Sous-Catégories</label>
                                <select id="child_cat_id" class="form-control" name="child_cat_id" required>

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

                                <textarea name="description" id="description" class="form-control" maxlength="225" rows="2" placeholder="Write some text....">{{old('description')}}</textarea>
                            </div>

                            <div class="form-group margin-bottom-20">
                                <label for="exampleInputEmail1">Status</label>
                                <select class="form-control" name="status">
                                        <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                        <option value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div>



                            <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Ajouter</button>
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

        $("#cat_id").change(function(){


                var cat_id=$(this).val();


                if(cat_id != null){
                    //alert(cat_id);
                    $.ajax({
                        url:"/admin/localisation/"+cat_id+"/child",
                        type:"POST",
                        data:{
                            _token:"{{csrf_token()}}",
                            cat_id:cat_id
                        },
                        success:function(response){
                            var html_option = "";
                            if(response.status){
                           //alert(cat_id);
                              $('#child_cat_div').removeClass('display-none');
                              $.each(response.data,function(id,title){
                                html_option += "<option value='"+id+"'>"+title+"</option>";
                              });

                            }else{
                                $('#child_cat_div').addClass('display-none');

                            }
                            $('#child_cat_id').html(html_option);
                            $('#child_cat_id').change();
                        }
                    });
                }
        });
    if(child_cat_id != null){
        $('#cat_id').change();
    }

 </script>

<script>

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
                                html_option += "<option value='"+id+"'>"+title+"</option>";
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
                                html_option += "<option value='"+id+"'>"+title+"</option>";
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
