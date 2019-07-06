@extends('font.master')
@section('content')
    <hr>
    <?php if($detailsOfBrand==""){ ?>
    <div class="alert alert-danger col-sm-offset-3 col-sm-6 text-center">Please Complete your profile for full access</div>
    <?php }elseif($userInfo->access==0 && $detailsOfBrand!=""){ ?>
    <div class="alert alert-success col-sm-offset-3 col-sm-6 text-center"> your request has been send. please wait for admin approval</div>
    <?php }else{ ?>
    <div class="alert alert-success col-sm-offset-3 col-sm-6 text-center"> Approved</div>
    <?php } ?>

    <div class="container bootstrap snippets">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <form id="profileForm" class="form-horizontal" method="post" action="{{url('/coming-brand-description')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-body text-center" style="background-image: url('https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350');">
                            <img src="<?php if(isset($detailsOfBrand->brand_image)) { echo asset($detailsOfBrand->brand_image) ;}else{ }; ?>" height="30%" width="20%" class="img-thumbnail profile-avatar" alt="User avatar">
                            <input type="file" name="brand_image" required>
                            <input type="hidden" name="id" value="{{$userInfo->id}}">
                        </div>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">User ID:<span style="color: blue"> {{$userInfo->id}}</span></h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Location</label>
                                <div class="col-sm-10">
                                    <select class="form-control" required="required" name="country">
                                        <option>Select country</option>
                                        <option value="bd">Bangladesh</option>
                                        <option value="cd">Canada</option>
                                        <option value="dm">Denmark</option>
                                        <option value="es">Estonia</option>
                                        <option value="fn">France</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Company name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="brand_name" value="{{$userInfo->name}}">
                                    <input type="hidden" class="form-control" name="user_id" value="{{$userInfo->id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Position</label>
                                <div class="col-sm-10">
                                    <input type="text" name="position" class="form-control" value="<?php if(isset($detailsOfBrand)){echo $detailsOfBrand->position;}else{echo "";} ?>">
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
                                <label class="col-sm-2 control-label">Mobile number</label>
                                <div class="col-sm-10">
                                    <input type="tel" name="mobile" class="form-control" value="<?php if(isset($detailsOfBrand)){echo $detailsOfBrand->mobile;} ?>">
                                    <input type="hidden" name="status" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">E-mail address</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="{{$userInfo->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Work address</label>
                                <div class="col-sm-10">
                                    <textarea rows="3" class="form-control" name="work_address"><?php if(isset($detailsOfBrand)){echo $detailsOfBrand->work_address;} ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Brand Description</label>
                                <div class="col-sm-10">
                                    <textarea rows="4" class="form-control" name="brand_description"><?php if(isset($detailsOfBrand)){echo $detailsOfBrand->brand_description;} ?></textarea>
                                    <span style="color: red;">{{ $errors->has('brand_description') ? $errors->first('brand_specification') : ' ' }}</span>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-offset-2 col-sm-2">
                                    @if(isset($detailsOfBrand))
                                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Edit Profile</button>
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
                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                            </div>
                            <form id="profileForm" class="form-horizontal" method="post" action="{{url('/coming-brand-description-update')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="panel panel-default">
                                    <div class="panel-body text-center" style="background-image: url('https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350');">
                                        <img src="<?php if(isset($detailsOfBrand->brand_image)) { echo asset($detailsOfBrand->brand_image) ;}else{ }; ?>" height="30%" width="20%" class="img-thumbnail profile-avatar" alt="User avatar">
                                        <input type="file" name="brand_image">
                                        <input type="hidden" name="id" value="{{$userInfo->id}}">
                                    </div>

                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">User ID:<span style="color: blue"> {{$userInfo->id}}</span></h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Location</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" required="required" name="country">
                                                    <option>Select country</option>
                                                    <option value="bd">Bangladesh</option>
                                                    <option value="cd">Canada</option>
                                                    <option value="dm">Denmark</option>
                                                    <option value="es">Estonia</option>
                                                    <option value="fn">France</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Company name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="brand_name" value="{{$userInfo->name}}">
                                                <input type="hidden" class="form-control" name="user_id" value="{{$userInfo->id}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Position</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="position" class="form-control" value="<?php if(isset($detailsOfBrand)){echo $detailsOfBrand->position;}else{echo "";} ?>">
                                                <input type="hidden" name="updateId" class="form-control" value="<?php if(isset($detailsOfBrand)){echo $detailsOfBrand->id;}else{echo "";} ?>">
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
                                            <label class="col-sm-2 control-label">Mobile number</label>
                                            <div class="col-sm-10">
                                                <input type="tel" name="mobile" class="form-control" value="<?php if(isset($detailsOfBrand)){echo $detailsOfBrand->mobile;} ?>">
                                                <input type="hidden" name="status" value="0" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">E-mail address</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" value="{{$userInfo->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Work address</label>
                                            <div class="col-sm-10">
                                                <textarea rows="3" class="form-control" name="work_address"><?php if(isset($detailsOfBrand)){echo $detailsOfBrand->work_address;} ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Brand Description</label>
                                            <div class="col-sm-10">
                                                <textarea rows="4" class="form-control" name="brand_description"><?php if(isset($detailsOfBrand)){echo $detailsOfBrand->brand_description;} ?></textarea>
                                                <span style="color: red;">{{ $errors->has('brand_description') ? $errors->first('brand_specification') : ' ' }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-sm-offset-2 col-sm-2">

                                                    <input type="submit" value="Update "  class="form-control btn btn-success">

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
    //    document.forms['profileForm'].elements['country'].value = '<?php if(isset($detailsOfBrand)){echo $detailsOfBrand->position;} ?>';

    </script>

@endsection