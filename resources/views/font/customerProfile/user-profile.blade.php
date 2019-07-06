@extends('font.master')
@section('content')


    <div class="container bootstrap snippet">
        <div class="row" style="padding-bottom: 20px; padding-top:40px;">
            <div class="col-sm-3" ><h1 style="text-align: center">{{Auth::user()->name}}</h1></div>
            <div class="col-sm-9"><h1 style="text-align: center; text-transform: uppercase;">{{Auth::user()->role}} Profile</h1>  </div>
        </div>
        <div class="row" >
            <form class="form" name="profileForm"  action="{{url('/save-customer-profile')}}" method="post" id="profileForm" enctype="multipart/form-data" >
            {{csrf_field()}}
                <div class="col-sm-3" style=" background-image: url(https://images.alphacoders.com/453/thumb-1920-45373.jpg);"><!--left col-->


                <div class="text-center col-sm-12">
                    <img src="<?php if (isset($profile->profile_picture)){echo asset($profile->profile_picture);} else{echo asset('/profile-pictures/profile.png');} ; ?>" class="avatar img-circle img-thumbnail" alt="avatar"><br>


                </div>
                </hr><br>


                <div class="panel panel-default">
                    <div class="panel-heading"><h6>Upload a different photo...</h6></div>
                    <div class="panel-body">

                            <input type="file" name="profile_picture" class="text-center center-block file-upload col-sm-12">

                    </div>
                </div>


                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> {{$likes}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>DisLikes</strong></span> {{$Dislikes}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> {{$posts}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Comments</strong></span> {{$comments}}</li>
                </ul>

                <div class="panel panel-default">
                    <div class="panel-heading">Social Media</div>
                    <div class="panel-body">
                        <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                    </div>
                </div>

            </div><!--/col-3-->
            <div class="col-sm-9" >
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                    <li><a data-toggle="tab" href="#products">Products</a></li>
                    <li><a data-toggle="tab" href="#stock">Current Stock</a></li>
                    <li><a data-toggle="tab" href="#history">Sell-History</a></li>
                    <li><a data-toggle="tab" href="#orders">Orders</a></li>
                    <li><a data-toggle="tab" href="#Account">Account</a></li>
                </ul>
                @if(Session::get('successMessage')==!null)
                    <div class="alert alert-success" style="text-align: center">
                        <strong >{{Session::get('successMessage')}}</strong>
                    </div>
                @endif

                    <div class="tab-content" >
                    <div class="tab-pane active" id="home">


                            <div class="form-group">

                                <div class="col-xs-6" style="padding: 20px;">
                                    <label for="first_name"><h4>First name</h4></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" <?php if (isset($profile)){echo "readonly"; }; ?> value="<?php if (isset($profile)){echo $profile->first_name; }; ?>" placeholder="first name" title="enter your first name if any.">
                                    <span style="color: red;">{{ $errors->has('first_name') ? $errors->first('first_name') : ' ' }}</span>

                                    <input type="hidden" class="form-control" name="customer_id" value="{{Auth::User()->id}}" />
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6" style="padding: 20px;">
                                    <label for="last_name"><h4>Last name</h4></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" <?php if (isset($profile)){echo "readonly"; }; ?> value="<?php if (isset($profile)){echo $profile->last_name; }; ?>" placeholder="last name" title="enter your last name if any.">
                                    <span style="color: red;">{{ $errors->has('last_name') ? $errors->first('last_name') : ' ' }}</span>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6" style="padding: 20px;">
                                    <label for="phone"><h4>Mobile</h4></label>
                                    <input type="text" class="form-control" name="phone_number" <?php if (isset($profile)){echo "readonly"; }; ?> value="<?php if (isset($profile)){echo $profile->phone_number; }; ?>" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                    <span style="color: red;">{{ $errors->has('phone_number') ? $errors->first('phone_number') : ' ' }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6" style="padding: 20px;">
                                    <label for="city"><h4>City</h4></label>
                                    <input type="text" class="form-control" name="city" id="city" <?php if (isset($profile)){echo "readonly"; }; ?> value="<?php if (isset($profile)){echo $profile->city; }; ?>" placeholder="enter mobile number" title="enter your mobile number if any.">
                                    <span style="color: red;">{{ $errors->has('city') ? $errors->first('city') : ' ' }}</span>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6" style="padding: 20px;">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="email" readonly class="form-control" id="email" value="{{Auth::user()->email}}" title="enter your email.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6" style="padding: 20px;">
                                    <label for="coutry"><h4>Country</h4></label>
                                    <input type="text" name="country" class="form-control" <?php if (isset($profile)){echo "readonly"; }; ?> value="<?php if (isset($profile)){echo $profile->country; }; ?>" id="country" placeholder="somewhere" title="enter a location">
                                    <span style="color: red;">{{ $errors->has('country') ? $errors->first('country') : ' ' }}</span>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6" style="padding: 20px;">
                                    <label for="dateofbirth"><h4>Date Of Birth</h4></label>
                                    <input type="date" class="form-control" <?php if (isset($profile)){echo "readonly"; }; ?> value="<?php if (isset($profile)){echo $profile->date_of_birth; }; ?>" name="date_of_birth" id="dateofbirth">
                                    <span style="color: red;">{{ $errors->has('date_of_birth') ? $errors->first('date_of_birth') : ' ' }}</span>

                                </div>
                            </div>
                            <div class="form-group">

                                <div class=" col-xs-6 " style="padding: 20px;">
                                    <label for="gender"><h4>Gender</h4></label><br>
                                    <label class="radio-inline"><input type="radio" name="gender" value="male" checked>Male</label>
                                    <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
                                    <label class="radio-inline"><input type="radio" name="gender" value="other">Other</label>
                                </div>
                            </div>

                        <div class="form-group">

                            <div class="col-xs-offset-6 col-xs-6 " style="padding: 20px;">
                                <label for="occupation"><h4>Occupation</h4></label>
                                <select class="form-control" id="occupation" name="occupation">
                                    <option>Select Occupation</option>
                                    <option value="student">Student</option>
                                    <option value="musician">Musician</option>
                                    <option value="business">Business</option>
                                    <option value="other">Other</option>
                                </select>
                                <span style="color: red;">{{ $errors->has('occupation') ? $errors->first('occupation') : ' ' }}</span>

                            </div>
                        </div>
                            <div class="form-group" >
                                <div class="col-xs-12">
                                    <br>
                                    @if($profile==null)
                                    <input class="btn btn-lg btn-success" type="submit" value="Save"/>
                                    <button class="btn btn-lg" id="FormReset" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                               @else
                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModaltwo"><i class="glyphicon glyphicon-edit"></i> Edit Profile</button>
                                    @endif
                                </div>
                            </div>


                        <hr>

                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="products">
                        <br>
                        <h2 style="text-align: center">My Products</h2>

                        <hr>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Net price</th>
                                <th>Ordered Quantity</th>
                                <th>Total Cost</th>
                                <th>Order time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($Products as $product)
                                <tr class="odd gradeX">
                                    <td>{{$product->order_id}}</td>
                                    <td><img src="{{$product->product_image}}" height="50px" width="50px"/> </td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->total_amount}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>
                                        <a href="{{ url('/product-id-for-add/'.$product->product_id.'/'.$product->order_id) }}" class="btn btn-success btn-xs" title="Add Product">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            <!-- Trigger the modal with a button -->

                            </tbody>
                        </table>
                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="stock">
                        <br>
                        <h2 style="text-align: center">Available Product on Sale</h2>

                        <hr>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>

                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Net price</th>
                                <th>Available Quantity</th>
                                <th>Order time</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($CurrentStock as $product)
                                <tr class="odd gradeX">
                                    <td><img src="{{$product->product_image}}" height="50px" width="50px"/> </td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_price}}</td>
                                    <td>{{$product->product_quantity}}</td>
                                    <td>{{$product->created_at}}</td>


                                </tr>
                            @endforeach
                            <!-- Trigger the modal with a button -->

                            </tbody>
                        </table>
                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="history">
                        <br>
                    <h2 style="text-align: center">My Selling History</h2>
                        <hr>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Order ID</th>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Brand Name</th>
                                <th>Net Price</th>
                                <th>Quantity</th>
                                <th>Product Discount</th>
                                <th>Total Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($sellHistory as $sellHis)
                                <tr class="odd gradeX">
                                    <td>{{ $i++ }}</td>
                                    <td>{{$sellHis->id}}</td>
                                    <td>{{$sellHis->product_id}}</td>
                                    <td>{{$sellHis->product_name}}</td>
                                    <td>{{$sellHis->name}}</td>
                                    <td>{{$sellHis->net_price}}</td>
                                    <td>{{$sellHis->quantity}}</td>
                                    <td>{{$sellHis->product_discount}}</td>
                                    <td>{{$sellHis->total_amount}}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane" id="orders">
                        <br>
                        <h2 style="text-align: center">My Orders</h2>

                        <hr>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Order ID</th>
                                <th>Shipping to a Address</th>
                                <th>Total Cost</th>
                                <th> Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($Orders as $order)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->shipping_id==0?'No':'Yes'}}</td>
                                <td>{{$order->total_order_cost}}</td>
                                <td>{{$order->status}}</td>

                            </tr>
                                @endforeach

                            </tbody>
                        </table>


                    </div>
                    <div class="tab-pane" id="Account">
                        <hr>
                        <h2 style="text-align: center; padding-bottom: 40px;">Earnings</h2>
                       <div class="row" style="background-color: #F5F5F5; border-radius:10px;  padding:30px">
                           <div class="col-sm-3" style="height: 150px;">
                                <h6 style="text-align: center;">Net Income</h6>
                               <h3 style="text-align: center; padding-top: 50px;">৳ {{$netIncome}}</h3>
                           </div>
                           <div class="col-sm-3" style="height:150px; border-left: 1px solid #BDBDBD; border-right: 1px solid #BDBDBD">
                               <h6 style="text-align: center; ">Withdrawn</h6>
                               <h3 style="text-align: center; padding-top: 50px;">৳ {{$OnlyWithdraw}}</h3>
                           </div>
                           <div class="col-sm-3" style="height:150px; border-right: 1px solid #BDBDBD;">
                               <h6 style="text-align: center;">Used For Purchases</h6>
                               <h3 style="text-align: center; padding-top: 50px;">৳ {{$PurchaseMoney}}</h3>
                           </div>
                           <div class="col-sm-3" style="height:150px;">
                               <h6 style="text-align: center">Available Balance</h6>
                               @if(Auth::user()->role=="dealer")
                               <h3 style="text-align: center; padding-top: 50px;">৳ {{round($netIncome-$dealerWithdrawMoney-($netIncome)*7/100,2)}}</h3>
                                   @elseif(Auth::user()->role=="brand")
                                   <h3 style="text-align: center; padding-top: 50px;">৳ {{$netIncome-$dealerWithdrawMoney-($netIncome)*5/100}}</h3>
                                   @elseif(Auth::user()->role=="customer")
                                   <h3 style="text-align: center; padding-top: 50px;">৳ {{round($netIncome-$dealerWithdrawMoney-($netIncome)*10/100,2)}}</h3>
                               @endif
                           </div>

                       </div>
                        <br>
                        <a href="" class="btn btn-success" style="border-radius: 5px;" data-toggle="modal" data-target="#myModalWithdraw">WITHDRAW</a>
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
                                        <input type="text" required class="form-control" name="account_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Account Number</label>
                                    <div class="col-sm-9">
                                        <input type="number" required class="form-control" placeholder="--- --- ---- ------" name="account_number" maxlength=16 >
                                        <input type="hidden" class="form-control" name="customer_id" value="{{Auth::user()->id}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Amount Of WithDraw</label>
                                    <div class="col-sm-9">
                                        @if(Auth::user()->role=="dealer")
                                        <input type="number" required id="withdraw" onblur="GetCommisionDealer();" class="form-control" max="{{$netIncome-$dealerWithdrawMoney-($netIncome)*7/100}}" step=any name="amount_of_withdraw" placeholder="{{$netIncome-$dealerWithdrawMoney-($netIncome)*7/100}}">
                                       @elseif(Auth::user()->role=="customer")
                                        <input type="number" required id="withdraw" onblur="GetCommisionCustomer();" class="form-control" max="{{$netIncome-$dealerWithdrawMoney-($netIncome)*10/100}}" step=any name="amount_of_withdraw" placeholder="{{$netIncome-$dealerWithdrawMoney-($netIncome)*10/100}}">
                                        @elseif(Auth::user()->role=="brand")
                                            <input type="number" required id="withdraw" onblur="GetCommisionBrand();" class="form-control" max="{{$netIncome-$dealerWithdrawMoney-($netIncome)*5/100}}" step=any name="amount_of_withdraw" placeholder="{{$netIncome-$dealerWithdrawMoney-($netIncome)*5/100}}">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Commission</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly required id="commission" class="form-control" name="commission">
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