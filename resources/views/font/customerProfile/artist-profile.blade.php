@extends('font.master')
@section('content')
    <hr>

    <div class="container bootstrap snippets">
        <div class="row">
            <?php if($ArtistInfo==null){ ?>
            <div class="alert alert-danger col-sm-offset-3 col-sm-6 text-center">Please Complete your profile for full access</div>
            <?php }elseif($ArtistInfo->access==0 && $ArtistInfo!=null){ ?>
            <div class="alert alert-success col-sm-offset-3 col-sm-6 text-center"> your request has been send for varification.You will Shortly Noticed</div>
            <?php }else{ ?>
            <div class="alert alert-success col-sm-offset-3 col-sm-6 text-center"> **Verified** </div>
            <?php } ?>
            <div class="col-xs-12 col-sm-12">

                @if(Session::get('successMessage')!=null)
                <div class="alert alert-success" id="success-alert" style="text-align: center">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong >Success! </strong>
                    {{Session::get('successMessage')}}
                </div>

                @endif


                <form name="ArtistNewProfile" id="profileForm" class="form-horizontal" method="post" action="{{url('/new-artist-profile')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="panel panel-default" style="position: relative">
                        <div class="panel-body text-center" style="background-image: url('{{asset('/profile-pictures/cover.jpg')}}');">
                            <img src="<?php if(isset($detailsOfArtist->artist_pp)) { echo asset($detailsOfArtist->artist_pp) ;}else{ echo asset('/profile-pictures/profile.png');}; ?>" height="30%" width="20%" class="img-thumbnail profile-avatar" alt="User avatar">
                            <div style="position: absolute; left: 5px; bottom: 5px;">
                                <input type="file" name="artist_pp" >
                            </div>
                            <input type="hidden" name="id" value="{{$ArtistInfo->id}}">
                        </div>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">User ID:<span style="color: blue"> {{$ArtistInfo->id}}</span></h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Country<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="country">
                                        <option value="">Select country</option>
                                        <option value="bd">Bangladesh</option>
                                        <option value="cd">Canada</option>
                                        <option value="usa">USA</option>
                                        <option value="dm">Denmark</option>
                                        <option value="In">India</option>
                                        <option value="es">Estonia</option>
                                        <option value="fn">France</option>
                                        <option value="ot">Other</option>
                                    </select>
                                    <span style="color: red;">{{ $errors->has('country') ? $errors->first('country') : ' ' }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Artist Full Name<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="artist_name" value="{{$ArtistInfo->name}}">
                                    <input type="hidden" class="form-control" name="artist_id" value="{{$ArtistInfo->id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Artist Type<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <div class="col-sm-6"> <input type="radio" name="artist_type" id="solo" value="solo" checked/> Solo</div>
                                    <div class="col-sm-6"> <input type="radio" name="artist_type" id="band" value="band" /> Band</div>
                                </div>
                            </div>
                            <div class="form-group" id="bandDetails">
                                <label class="col-sm-2 control-label">Band Name<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="band_name" class="form-control"/>
                                    <span style="color: red;">{{ $errors->has('user_period') ? $errors->first('user_period') : ' ' }}</span>

                                </div>
                            </div>
                            <div class="form-group" id="bandDetailstwo">
                                <label class="col-sm-2 control-label">Band Position<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="brand_position" class="form-control" placeholder="@ex: vocal, lead guiterist...."/>
                                    <span style="color: red;">{{ $errors->has('user_period') ? $errors->first('user_period') : ' ' }}</span>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Contact info</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mobile number<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="tel" name="mobile" class="form-control" placeholder="@ex: 08801*********" value="<?php if(isset($detailsOfArtist)){echo $detailsOfArtist->mobile;} ?>">
                                    <input type="hidden" name="status" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Facebook Link</label>
                                <div class="col-sm-10">
                                    <input type="tel" name="fb_link" class="form-control" value="<?php if(isset($detailsOfArtist->fb_link)){echo $detailsOfArtist->fb_link;} ?>">
                                    <input type="hidden" name="status" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">E-mail address</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" readonly="readonly" value="{{$ArtistInfo->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Website</label>
                                <div class="col-sm-10">
                                    <input type="tel" name="website" class="form-control" placeholder="@ex: www.artist.com" value="<?php if(isset($detailsOfArtist)){echo $detailsOfArtist->website;} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Biography<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <textarea rows="4" class="form-control" placeholder="I am ...." name="artist_bio"><?php if(isset($detailsOfArtist)){echo $detailsOfArtist->artist_bio;} ?></textarea>
                                    <span style="color: red;">{{ $errors->has('artist_bio') ? $errors->first('artist_bio') : ' ' }}</span>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-offset-2 col-sm-2">
                                    @if(isset($detailsOfArtist))
                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Edit Profile</button>
                                    @else
                                        <input type="submit"  class="form-control btn btn-primary">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel" style="text-align: center">Edit Artist Profile</h4>
                            </div>
                            <form name="updateArtistProfile" class="form-horizontal" method="post" action="{{url('/update-artist-profile')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="panel panel-default" style="position: relative">
                                    <div class="panel-body text-center" style="background-image: url('{{asset('/profile-pictures/cover.jpg')}}');">
                                        <img src="<?php if(isset($detailsOfArtist->artist_pp)) { echo asset($detailsOfArtist->artist_pp) ;}else{ echo asset('/profile-pictures/profile.png');}; ?>" height="30%" width="20%" class="img-thumbnail profile-avatar" alt="User avatar">
                                        <div style="position: absolute; left: 5px; bottom: 5px;">
                                            <input type="file" name="artist_pp" >
                                        </div>
                                        <input type="hidden" name="id" value="{{$ArtistInfo->id}}">
                                    </div>

                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">User ID:<span style="color: blue"> {{$ArtistInfo->id}}</span></h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Country<span style="color:red;">*</span></label>
                                            <div class="col-sm-10">
                                                <select class="form-control" required="required" name="country">
                                                    <option>Select country</option>
                                                    <option value="bd">Bangladesh</option>
                                                    <option value="cd">Canada</option>
                                                    <option value="usa">USA</option>
                                                    <option value="dm">Denmark</option>
                                                    <option value="In">India</option>
                                                    <option value="es">Estonia</option>
                                                    <option value="fn">France</option>
                                                    <option value="ot">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Artist Full Name<span style="color:red;">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="artist_name" value="{{$ArtistInfo->name}}">
                                                <input type="hidden" class="form-control" name="artist_id" value="{{$ArtistInfo->id}}">
                                                <input type="hidden" class="form-control" name="id" value="<?php if(isset($detailsOfArtist->id)) { echo ($detailsOfArtist->id) ;} ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Artist Type<span style="color:red;">*</span></label>
                                            <div class="col-sm-10">
                                                <div class="col-sm-6"> <input type="radio" name="artist_type" id="soloUpdate" value="solo" checked/> Solo</div>
                                                <div class="col-sm-6"> <input type="radio" name="artist_type" id="bandUpdate" value="band" /> Band</div>
                                                <span style="color: red;">{{ $errors->has('artist_type') ? $errors->first('artist_type') : ' ' }}</span>
                                            </div>
                                        </div>

                                        <div class="form-group" id="bandDetailsUpdate">
                                            <label class="col-sm-2 control-label">Band Name<span style="color:red;">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="band_name" class="form-control"/>
                                                <span style="color: red;">{{ $errors->has('user_period') ? $errors->first('user_period') : ' ' }}</span>

                                            </div>
                                        </div>
                                        <div class="form-group" id="bandDetailsUpdatetwo">
                                            <label class="col-sm-2 control-label">Band Position<span style="color:red;">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="brand_position" class="form-control" placeholder="@ex: vocal, lead guiterist...."/>
                                                <span style="color: red;">{{ $errors->has('user_period') ? $errors->first('user_period') : ' ' }}</span>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Contact info</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Mobile number<span style="color:red;">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="tel" name="mobile" class="form-control" placeholder="@ex: 08801*********" value="<?php if(isset($detailsOfArtist)){echo $detailsOfArtist->mobile;} ?>">
                                                <span style="color: red;">{{ $errors->has('mobile') ? $errors->first('mobile') : ' ' }}</span>
                                                <input type="hidden" name="status" value="0" class="form-control">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Facebook Link</label>
                                            <div class="col-sm-10">
                                                <input type="tel" name="fb_link" class="form-control" value="<?php if(isset($detailsOfArtist->fb_link)){echo $detailsOfArtist->fb_link;} ?>">
                                                <input type="hidden" name="status" value="0" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">E-mail address</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" value="{{$ArtistInfo->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Website</label>
                                            <div class="col-sm-10">
                                                <input type="tel" name="website" class="form-control" placeholder="@ex: www.artist.com" value="<?php if(isset($detailsOfArtist)){echo $detailsOfArtist->website;} ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Biography<span style="color:red;">*</span></label>
                                            <div class="col-sm-10">
                                                <textarea rows="4" class="form-control" placeholder="I am ...." name="artist_bio"><?php if(isset($detailsOfArtist)){echo $detailsOfArtist->artist_bio;} ?></textarea>
                                                <span style="color: red;">{{ $errors->has('brand_description') ? $errors->first('brand_specification') : ' ' }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-sm-offset-2 col-sm-2">
                                                    <input type="submit" value="Update" class="form-control btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

            </div>
        </div>
    </div>
    <script>
        document.forms['ArtistNewProfile'].elements['country'].value  = '<?php if(isset($detailsOfArtist->country)){echo $detailsOfArtist->country;} ?>';
        document.forms['ArtistNewProfile'].elements['artist_type'].value  = '<?php if(isset($detailsOfArtist->artist_type)){echo $detailsOfArtist->artist_type;} ?>';
        document.forms['updateArtistProfile'].elements['country'].value  = '<?php if(isset($detailsOfArtist->country)){echo $detailsOfArtist->country;} ?>';
        document.forms['updateArtistProfile'].elements['artist_type'].value  = '<?php if(isset($detailsOfArtist->artist_type)){echo $detailsOfArtist->artist_type;} ?>';
        if('<?php if(isset($detailsOfArtist->artist_type)){echo $detailsOfArtist->artist_type;} ?>'=="solo"){
            $("#bandDetailsUpdatetwo").hide();
            $("#bandDetailsUpdate").hide();
        }else{
            $("#bandDetailsUpdatetwo").show();
            $("#bandDetailsUpdate").show();
        }
    </script>

@endsection