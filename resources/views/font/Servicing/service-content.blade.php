@extends('font.master')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="panel panel-default">
        <div class="panel-heading " style="text-align: center">
           <h2> Guitar Service Center</h2>
        </div>

    </div>

            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active"><a href="{{url('/service')}}">Servicing</a></li>
                </ul>
            </div>

        <!-- Container End -->
    @if(Session::get('msgService')!=null)
        <div class="alert alert-success" id="success-alert" style="text-align: center">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong >Success! </strong>
            {{Session::get('msgService')}}
        </div>

    @endif
    <!-- Breadcrumb End -->


        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 panel-success">
                <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Ongoing Service</a></li>
                    <li><a data-toggle="tab" href="#service">Service a product</a></li>
                    <li><a data-toggle="tab" href="#history">History</a></li>
                </ul>
                </div>

                <div class="tab-content panel-body">
                    <div class="tab-pane active" id="home">


                        <h2 style="text-align: center">My Servicing History</h2>

                        <br>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>

                                <th>Service Type</th>
                                <th>Product Name</th>
                                <th>Used Period</th>
                                <th>Problem Description</th>
                                <th>Order time</th>
                                <th>Preparation Time</th>
                                <th>Details Note</th>
                                <th>Total Cost</th>
                                <th>Delivery time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($myProducts as $myProduct)
                            <tbody>


                           <td>{{$myProduct->Services}}</td>
                           <td>{{$myProduct->product_name}}</td>
                           <td>{{$myProduct->user_period}}</td>
                           <td>{{$myProduct->short_description}}</td>
                           <td>{{$myProduct->created_at}}</td>
                           <td>{{$myProduct->prepare_time}}</td>
                           <td>{{$myProduct->notes}}</td>
                           <td>{{$myProduct->total_cost}}</td>
                           <td>{{$myProduct->delivery_date}}</td>
                           <td>{{$myProduct->status}}</td>
                                <td>
                                    @if($myProduct->accept=="0" && $myProduct->declined=="0")
                                        <div style="margin-bottom: 5px; width: 100px">
                                        <a href="{{ url('/accept-service-product/'.$myProduct->id) }}" class="btn btn-success btn-xl" title="Accept">
                                            <span class="glyphicon glyphicon-ok"> Accept</span>
                                        </a>
                                        </div>
                                    <div style="margin-bottom: 5px; width: 100px">
                                        <a href="{{ url('/cancel-service-product/'.$myProduct->id) }}" class="btn btn-danger btn-xl" title="Declined">
                                            <span class="glyphicon glyphicon-remove"> Decline</span>
                                        </a>
                                    </div>
                                        @elseif($myProduct->declined==1)
                                        <label class="btn btn-danger btn-xl">Canceled</label>
                                        @elseif($myProduct->accept==1)
                                    <label class="btn btn-success btn-xl">Confirmed</label>
                                        @else
                                        <label class="btn btn-info btn-xl">Pending</label>
                                        @endif

                                </td>

                            </tbody>
                            @endforeach
                        </table>


                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="service">
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
                                <div class="well">
                                    <h1 class="text-info" style="text-align: center;padding-bottom: 5%;">Add Product Description</h1>
                                    <h3 style="text-align: center" class="text-success" >{{ Session::get('message') }}</h3>
                                    <form action="{{ url('/add-to-service') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="col-sm-3">Category Name</label>
                                            <div class="col-sm-9">
                                                <select name="category_id" required placeholder="llll" class="form-control" selected="selected">
                                                    @foreach($categories as $categorie)
                                                    <option value="{{$categorie->id}}">{{$categorie->category_name}}</option>
                                                        @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">Services</label>
                                            <div class="col-sm-9">

                                                <div class="col-sm-6"> <input type="radio" name="Services" value="service" checked/> Request Service</div>
                                                <div class="col-sm-6"> <input type="radio" name="Services" value="query" /> Query</div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3">Brand Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="brand_name" class="form-control"/>
                                                <span style="color: red;">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' ' }}</span>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3">Product Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="product_name" class="form-control"/>
                                                <span style="color: red;">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3">used time(month)</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="user_period" class="form-control"/>
                                                <span style="color: red;">{{ $errors->has('user_period') ? $errors->first('user_period') : ' ' }}</span>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3">Product model</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="product_model" class="form-control"/>
                                                <span style="color: red;">{{ $errors->has('product_model') ? $errors->first('product_model') : ' ' }}</span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-3">Product Problem Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="5" name="short_description"></textarea>
                                                <span style="color: red;">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-3">Product Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="product_image" accept="image/*">
                                                <span style="color: red;">{{ $errors->has('product_image') ? $errors->first('product_image') : ' ' }}</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9 col-sm-offset-3">
                                                <input type="submit" name="btn" style="background-color: #232F3E; color: white" class="btn btn-block" value="Save Product Info"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="history">
                        <br>
                        <h2 style="text-align: center">My Selling History</h2>
                        <hr>

                    </div>
                </div><!--/tab-pane-->
            </div><!--/tab-content-->

        </div><!--/col-9-->



@endsection