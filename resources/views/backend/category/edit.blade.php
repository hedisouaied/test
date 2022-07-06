@extends('backend.layouts.master')


@section('content')


<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-9">
                <div class="box-content card white">
                    <h4 class="box-title">Modifier localisation</h4>
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
                        <form action="{{route('localisation.update',$category->id)}}" method="POST">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom" value="{{$category->title}}" name="title">
                            </div>
                            <div class="m-t-20">
                                <label for="exampleInputEmail1">Description</label>

                                <textarea name="description" id="description" class="form-control" maxlength="225" rows="2" placeholder="Write some text....">{{$category->description}}</textarea>
                            </div>
                            <div class="m-t-20">
                                <label for="">Grand catégorie ?: <span class="text-danger">*</span></label>

                                <input id="is_parent" type="checkbox" name="is_parent" value="{{$category->is_parent}}" {{$category->is_parent==1 ? 'checked' : ''}}>Oui
                            </div>

                            <div class="form-group margin-bottom-20 {{$category->is_parent==1 ? 'display-none' : ''}}" id="parent_cat_div">
                                <label for="parent_id">Catégorie</label>
                                <select class="form-control" name="parent_id">
                                        <option value="">-- Selectionner la catégorie ---</option>
                                    @foreach ($parent_cats as $pcats)
                                        <option value="{{$pcats->id}}" {{$pcats->id==$category->parent_id ? 'selected' : ''}}>{{$pcats->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="m-t-20">
                                <label>Photo</label>

                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$category->photo}}">
                                  </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;">
                                    <img src="{{$category->photo}}" style="margin-top:15px;max-height:100px;" />
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    Selectionner les Partenaires
                                </label>
                            <select class="js-example-basic-multiple form-control" name="partenaire_ids[]" multiple="multiple">
                                @php

                                $part = explode(',',$category->partenaire_ids);
                                @endphp
                                @foreach ( \App\Models\Brand::get() as $partenaire)
                                <option value="{{$partenaire->id}}" {{in_array($partenaire->id,$part) ? 'selected' : ''}} >{{$partenaire->title}}</option>
                                @endforeach

                            </select>
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
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
$(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',', ' ']
});
</script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>



  <script>
    $('#is_parent').change(function(e){
        e.preventDefault();
        var is_checked=$('#is_parent').prop('checked');
        // alert(is_checked);
        if(is_checked){
            $('#parent_cat_div').addClass('display-none');
            $('#parent_cat_div').val('');
            $('#is_parent').val('1');
        }
        else {
            $('#parent_cat_div').removeClass('display-none');
            $('#is_parent').val('0');
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#description').summernote();
    });
  </script>
@endsection
