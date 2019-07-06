@extends('font.master')
@section('content')


    <div class="container bootstrap snippet">

        <div class="row" >

          <br>
            <form class="form" name="profileForm"  action="{{url('/save-customer-profile')}}" method="post" id="profileForm" enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="col-sm-12" >
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#orders">Transaction</a></li>
                        <li><a data-toggle="tab" href="#Account">Account</a></li>
                    </ul>
                    @if(Session::get('successMessage')==!null)
                        <div class="alert alert-success" style="text-align: center">
                            <strong >{{Session::get('successMessage')}}</strong>
                        </div>
                    @endif

                    <div class="tab-content" >
                        <div class="tab-pane active" id="orders">
                            <br>
                            <h2 style="text-align: center">My Transactions</h2>

                            <hr>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Transection ID</th>
                                    <th>WithDrawal Amount</th>
                                    <th>Bank Name</th>
                                    <th>Account Name</th>
                                    <th>Account Number</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($Transections as $transection)
                                    <tr class="odd gradeX">
                                        <td>{{ $i++ }}</td>
                                        <td>{{$transection->id}}</td>
                                        <td>{{$transection->amount_of_withdraw}}</td>
                                        <td>{{$transection->bank_name}}</td>
                                        <td>{{$transection->account_name}}</td>
                                        <td>{{$transection->account_number}}</td>
                                        <td>{{$transection->created_at}}</td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>


                        </div>
                        <div class="tab-pane" id="Account">
                            <hr>
                            <h2 style="text-align: center; padding-bottom: 40px;">Earnings</h2>
                            <div class="row" style="background-color: #F5F5F5; border-radius:10px;  padding:30px">
                                <div class="col-sm-2" style="height: 150px;">
                                    <h6 style="text-align: center;">Net Income</h6>
                                    <h3 style="text-align: center; padding-top: 50px;">৳ {{$netIncome}}</h3>
                                </div>
                                <div class="col-sm-3" style="height:150px; border-left: 1px solid #BDBDBD; border-right: 1px solid #BDBDBD">
                                    <h6 style="text-align: center; ">Withdrawn</h6>
                                    <h3 style="text-align: center; padding-top: 50px;">৳ {{$dealerWithdrawMoney}}</h3>
                                </div>
                                <div class="col-sm-3" style="height:150px; border-right: 1px solid #BDBDBD;">
                                    <h6 style="text-align: center;">Used For Purchases</h6>
                                    <h3 style="text-align: center; padding-top: 50px;">৳ 0</h3>
                                </div>
                                <div class="col-sm-4" style="height:150px;">
                                    <h6 style="text-align: center">Available For Withdrawal</h6>
                                    <h3 style="text-align: center; padding-top: 50px;">৳ {{round($netIncome-$dealerWithdrawMoney-($netIncome)*5/100,3)}}</h3>
                                </div>

                            </div>
                            <br>
                            <a href="" class="btn btn-success" style="border-radius: 5px;" data-toggle="modal" data-target="#myModalWithdraw">WITHDRAW</a>
                            <br>
                            <br>
                            <br>
                        </div>

                    </div><!--/tab-pane-->
                </div><!--/tab-content-->
            </form>
        </div><!--/col-9-->
        <div class="modal fade" id="myModalWithdraw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center">WithDraw Money</h4>
                    </div>
                    <form class="form-horizontal" method="post" action="{{url('/save-withdraw-dealer')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">User ID:<span style="color: blue"> <?php if(isset($profile->customer_id)) { echo ($profile->customer_id) ;} ?></span></h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Bank Name</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="bank_name" required>
                                            <option>Select Bank</option>
                                            <option value="Standard Chaterd">Standard Chaterd</option>
                                            <option value="City">City Bank</option>
                                            <option value="HSBC">HSBC Bank</option>
                                            <option value="UCB">UCB Bank</option>
                                            <option value="DBBL">DBBL Bank</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Account name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  name="account_name" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Account Number</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" placeholder="--- --- ---- ------" name="account_number" required maxlength="16" pattern="\d*" minlength="16">
                                        <input type="hidden" class="form-control" name="customer_id" value="{{Auth::user()->id}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Amount Of WithDraw</label>
                                    <div class="col-sm-9">
                                        <input type="number" id="withdraw" required onblur="GetCommisionBrand();" class="form-control" max="{{$netIncome-$dealerWithdrawMoney-($netIncome)*5/100}}" step=any name="amount_of_withdraw" value="{{round($netIncome-$dealerWithdrawMoney-($netIncome)*5/100,2)}}">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Commission</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly id="commission" class="form-control" name="commission">
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <div class="col-sm-offset-3 col-sm-8">
                                        <input class="btn btn-lg btn-success" type="submit" value="WITHDRAW"/>
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

        <!-- Modal -->
        <div class="modal fade" id="myModaltwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center">Edit Profile</h4>
                    </div>
                    <form id="profileFormUpdate" class="form-horizontal" method="post" action="{{url('/update-customer-profile')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="panel panel-default">
                            <div class="panel-body text-center">
                                <img src="<?php if (isset($profile->profile_picture)){echo asset($profile->profile_picture);} else{echo asset('/profile-pictures/profile.png');} ; ?>" height="30%" width="20%" class="img-thumbnail profile-avatar" alt="User avatar">
                                <input type="file" name="profile_picture">

                            </div>

                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">User ID:<span style="color: blue"> <?php if(isset($profile->customer_id)) { echo ($profile->customer_id) ;} ?></span></h4>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">First name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="first_name" value="<?php if(isset($profile->first_name)) { echo ($profile->first_name) ;} ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Last name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="last_name" value="<?php if(isset($profile->last_name)) { echo ($profile->last_name) ;} ?>">
                                        <input type="hidden" class="form-control" name="id" value="<?php if(isset($profile->id)) { echo ($profile->id) ;} ?>">
                                        <input type="hidden" class="form-control" name="customer_id" value="<?php if(isset($profile->customer_id)) { echo ($profile->customer_id) ;} ?>}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone_number" value="<?php if(isset($profile->phone_number)) { echo ($profile->phone_number) ;} ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="city" value="<?php if(isset($profile->city)) { echo ($profile->city) ;} ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="country" value="<?php if(isset($profile->country)) { echo ($profile->country) ;} ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Date Of Birth</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="date_of_birth" value="<?php if(isset($profile->date_of_birth)) { echo ($profile->date_of_birth) ;} ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Gender</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline"><input type="radio" name="gender" value="male" checked>Male</label>
                                        <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
                                        <label class="radio-inline"><input type="radio" name="gender" value="other">Other</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Occupation</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="occupationtwo" name="occupation">
                                            <option>Select Occupation</option>
                                            <option value="student">Student</option>
                                            <option value="musician">Musician</option>
                                            <option value="business">Business</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" >
                                    <div class="col-sm-offset-3 col-sm-8">
                                        <input class="btn btn-lg btn-success" type="submit" value="Update Profile"/>

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

    </div><!--/row-->

    <script>
        document.forms['profileForm'].elements['occupation'].value = '<?php if(isset($profile->occupation)) { echo ($profile->occupation) ;} ?>';
        document.forms['profileFormUpdate'].elements['occupationtwo'].value = '<?php if(isset($profile->occupation)) { echo ($profile->occupation) ;} ?>';
        document.forms['profileFormUpdate'].elements['gender'].value = '<?php if(isset($profile->gender)) { echo ($profile->gender) ;} ?>';
        document.forms['profileForm'].elements['gender'].value = '<?php if(isset($profile->gender)) { echo ($profile->gender) ;} ?>';
    </script>

@endsection