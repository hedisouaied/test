@extends('backend.layouts.master')


@section('content')


<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-9">
                @include('backend.layouts.notification')
                <div class="box-content card white">
                    <h4 class="box-title">à propos</h4>
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
                        <form action="{{route('about.update')}}" method="POST">
                            @csrf
                            @method('put')
                            <fieldset style="border: solid 5px;padding: 10px;">
                                <legend style="width: max-content;padding: 3px;">Présentation de groupe</legend>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Titre</label>
                                <input type="text" class="form-control" placeholder="Titre" value="{{$about->heading}}" name="heading">
                            </div>
                            <div class="form-group">
                                <label>Video</label>
                                <input type="text" class="form-control" placeholder="Lien Youtube de video" value="{{$about->video}}" name="video">
                            </div>

                            <div class="m-t-20">
                                <label>Catalogue</label>

                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm_cata" data-input="thumbnail_cata" data-preview="holder_cata" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail_cata" class="form-control" type="text" name="catalogue" value="{{$about->catalogue}}">
                                  </div>
                                <div id="holder_cata" style="margin-top:15px;max-height:100px;">
                                    <a href="{{$about->catalogue}}" target="_blank" style="margin-top:15px;max-height:100px;font-size:25px;" ><i class="fa fa-file"></i></a>
                                </div>
                            </div>

                            <div class="m-t-20">
                                <label>Image</label>

                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="image" value="{{$about->image}}">
                                  </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;">
                                    <img src="{{$about->image}}" style="margin-top:15px;max-height:100px;" />
                                </div>
                            </div>

                            <div class="m-t-20" style="margin-top: 25px;">
                                <label for="exampleInputEmail1">Présentation</label>

                                <textarea name="content" class="form-control" id="description" placeholder="Text....">{{$about->content}}</textarea>
                            </div>
                            <div class="row">
                                 <div class="col-md-6">
                                    <div class="m-t-20" style="margin-top: 25px;">
                                        <label for="exampleInputEmail1">Solide expertise</label>

                                        <textarea name="solide_desc" class="form-control" placeholder="Text....">{{$about->solide_desc}}</textarea>
                                    </div>
                                    @if (count($solides) != 0)
                                    <table class="table table-striped table-bordered display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Solide expertise</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($solides as $mission)
                                                <tr>
                                                    <td>{{$mission->title}}</td>

                                                    <td>
                                                        <a href="{{route('solide.edit',$mission->id)}}" class="float-left btn btn-danger btn-sm waves-effect waves-light" style="color:#fff;background-color:#000;">
                                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <h2 class="text-center">Il n'y a pas de solide expertise pour le moment!</h2>
                                    @endif
                                    <h4 class="box-title">
                                        <a class="btn btn-secondary" href="{{route('solide.create')}}" ><i class="fa fa-plus-circle"></i> Ajouter solide expertise</a>
                                    </h4>

                                 </div>
                                 <div class="col-md-6">
                                    <div class="m-t-20" style="margin-top: 25px;">
                                        <label for="exampleInputEmail1">Mission</label>

                                        <textarea name="mission_desc" class="form-control" placeholder="Text....">{{$about->mission_desc}}</textarea>
                                    </div>
                                    @if (count($missions) != 0)
                                    <table class="table table-striped table-bordered display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Mission</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($missions as $mission)
                                                <tr>
                                                    <td>{{$mission->title}}</td>

                                                    <td>


                                                        <a href="{{route('mission.edit',$mission->id)}}" class="float-left btn btn-danger btn-sm waves-effect waves-light" style="color:#fff;background-color:#000;">
                                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <h2 class="text-center">Il n'y a pas de missions pour le moment!</h2>
                                    @endif
                                    <h4 class="box-title">
                                        <a class="btn btn-secondary" href="{{route('mission.create')}}" ><i class="fa fa-plus-circle"></i> Ajouter mission</a>
                                    </h4>
                                 </div>
                            </div>
                            </fieldset>
                            <br>

                            <fieldset style="border: solid 5px;padding: 10px;">
                                <legend style="width: max-content;padding: 3px;">Mot De Président</legend>

                                <div class="m-t-20" >
                                    <label for="exampleInputEmail1">Mot De Président</label>

                                    <textarea name="mot_president" class="form-control" id="mot_mot" placeholder="Text....">{{$about->mot_president}}</textarea>
                                </div>
                                <div class="m-t-20" style="margin-top: 25px;">
                                    <label for="exampleInputEmail1">Description Mot De Président</label>

                                    <textarea name="desc_mot_president" class="form-control" id="description_mot" placeholder="Text....">{{$about->desc_mot_president}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom & prènom</label>
                                    <input type="text" class="form-control" value="{{$about->nom_mot_president}}" name="nom_mot_president">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Poste</label>
                                    <input type="text" class="form-control" value="{{$about->poste_mot_president}}" name="poste_mot_president">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lien video de mot de président</label>
                                    <input type="text" class="form-control" value="{{$about->video_mot_president}}" name="video_mot_president">
                                </div>
                                <div class="m-t-20" style="margin-bottom: 20px;">
                                    <label>Image Président</label>

                                    <div class="input-group">
                                        <span class="input-group-btn">
                                          <a id="lfm_mot" data-input="thumbnail_mot" data-preview="holder_mot" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                          </a>
                                        </span>
                                        <input id="thumbnail_mot" class="form-control" type="text" name="photo_mot_president" value="{{$about->photo_mot_president}}">
                                      </div>
                                    <div id="holder_mot" style="margin-top:15px;max-height:100px;">
                                        <img src="{{$about->photo_mot_president}}" style="margin-top:15px;max-height:100px;" />
                                    </div>
                                </div>
                            </fieldset>
                            
                            <br>

                            <fieldset style="border: solid 5px;padding: 10px;">
                                <legend style="width: max-content;padding: 3px;">Pourquoi nous choisir ?</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Titre <i class="flaticon-clock-4"></i> </label>
                                            <input type="text" class="form-control" value="{{$about->title1_wcu}}" name="title1_wcu">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Sous Titre <i class="flaticon-clock-4"></i></label>
                                            <input type="text" class="form-control" value="{{$about->desc1_wcu}}" name="desc1_wcu">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Titre <i class="flaticon-robot-arm-1"></i> </label>
                                            <input type="text" class="form-control" value="{{$about->title2_wcu}}" name="title2_wcu">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Sous Titre <i class="flaticon-robot-arm-1"></i></label>
                                            <input type="text" class="form-control" value="{{$about->desc2_wcu}}" name="desc2_wcu">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Titre <i class="flaticon-winner-1"></i> </label>
                                            <input type="text" class="form-control" value="{{$about->title3_wcu}}" name="title3_wcu">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Sous Titre <i class="flaticon-winner-1"></i></label>
                                            <input type="text" class="form-control" value="{{$about->desc3_wcu}}" name="desc3_wcu">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Titre <i class="flaticon-global-warming"></i> </label>
                                            <input type="text" class="form-control" value="{{$about->title4_wcu}}" name="title4_wcu">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Sous Titre <i class="flaticon-global-warming"></i></label>
                                            <input type="text" class="form-control" value="{{$about->desc4_wcu}}" name="desc4_wcu">
                                        </div>
                                    </div>
                                </div>
                                   
                                
                                <div class="m-t-20" style="margin-bottom: 20px;">
                                    <label>Image Pièce</label>

                                    <div class="input-group">
                                        <span class="input-group-btn">
                                          <a id="lfm_piece" data-input="thumbnail_piece" data-preview="holder_piece" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                          </a>
                                        </span>
                                        <input id="thumbnail_piece" class="form-control" type="text" name="photo_wcu" value="{{$about->photo_wcu}}">
                                      </div>
                                    <div id="holder_piece" style="margin-top:15px;max-height:100px;">
                                        <img src="{{$about->photo_wcu}}" style="margin-top:15px;max-height:100px;" />
                                    </div>
                                </div>
                            </fieldset>
                            <br>

                            <fieldset style="border: solid 5px;padding: 10px;">
                                <legend style="width: max-content;padding: 3px;">Nos Contact</legend>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" value="{{$about->email}}" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Téléphone</label>
                                    <input type="text" class="form-control" placeholder="Téléphone" value="{{$about->phone}}" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Adresse</label>
                                    <input type="text" class="form-control" placeholder="Adresse" value="{{$about->address}}" name="address">
                                </div>
                            </fieldset>
                            <br>

                            <fieldset style="border: solid 5px;padding: 10px;">
                                <legend style="width: max-content;padding: 3px;">Nos Social-Media</legend>
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" placeholder="https://facebook.com/Nomdevotrepagefb" value="{{$about->facebook}}" name="facebook">
                                </div>
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control" placeholder="https://instagram.com/Nomdevotrepageinsta" value="{{$about->instagram}}" name="instagram">
                                </div>
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" class="form-control" placeholder="https://instagram.com/Nomdevotrepagetwitter" value="{{$about->twitter}}" name="twitter">
                                </div>
                                <div class="form-group">
                                    <label>Linkedin</label>
                                    <input type="text" class="form-control" placeholder="https://instagram.com/Nomdevotrepagelinkedin" value="{{$about->linkedin}}" name="linkedin">
                                </div>
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control" placeholder="https://youtube.com/Nomdevotrechaineyoutube" value="{{$about->youtube}}" name="youtube">
                                </div>
                            </fieldset>

                            <br>
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
    $('#lfm_mot').filemanager('image');
</script>
<script>
    $('#lfm_piece').filemanager('image');
</script>

<script>
    $('#lfm_cata').filemanager('file');
</script>
<script>
    $(document).ready(function() {
        $('#description').summernote();
    });
  </script>
<script>
    $(document).ready(function() {
        $('#description_mot').summernote();
    });
  </script>
  <script>
    $(document).ready(function() {
        $('#mot_mot').summernote();
    });
  </script>



@endsection
