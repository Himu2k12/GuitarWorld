@extends('font.master')
@section('content')


    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/brand-home')}}">Home</a></li>
                    <li class="active"><a href="#">Add Product</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    @if(Session::get('successMessage')!=null)
        <div class="alert alert-success" id="success-alert" style="text-align: center">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong >Success! </strong>
            {{Session::get('successMessage')}}
        </div>

    @endif
    <!-- Breadcrumb End -->
    <!-- Shop Page Start -->
    <div class="main-shop-page">
        <div class="container">
            <!-- Row End -->
            <div class="row">
                <!-- Product Categorie List Start -->
                <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3">
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
                            <div class="well">
                                <h1 class="text-info" style="text-align: center;padding-bottom: 5%;">Add Product on Market</h1>
                                <h3 style="text-align: center" class="text-success" >{{ Session::get('message') }}</h3>
                                <form action="{{ url('/add-dealer-product') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="product_name" value="{{$Product->product_name}}" class="form-control"/>
                                            <input type="hidden" name="customer_id" value="{{Auth::user()->id}}" class="form-control"/>
                                            <input type="hidden" class="form-control" name="category_id" value="{{$Product->category_id}}">
                                            <input class="form-control" type="hidden" name="brand_id"  value="{{$Product->brand_id}}">
                                            <input type="hidden" name="id" value="{{$Product->id}}" class="form-control"/>
                                            <span style="color: red;">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3">Product Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="product_code" readonly value="{{$Product->product_code}}" class="form-control"/>
                                            <span style="color: red;">{{ $errors->has('product_code') ? $errors->first('product_code') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Bought Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" value="{{$Product->net_price}}" readonly class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3">Product New Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="product_price" required class="form-control"/>
                                            <span style="color: red;">{{ $errors->has('product_price') ? $errors->first('product_price') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="number" readonly name="product_quantity" value="{{$Product->quantity}}" max="{{$Product->quantity}}" class="form-control"/>
                                            <span style="color: red;">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3">Product Discount(%)</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="product_discount" value="{{$Product->product_discount}}" class="form-control"/>
                                            <span style="color: red;">{{ $errors->has('product_discount') ? $errors->first('product_discount') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Short Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="5" name="short_description">{{$Product->short_description}}</textarea>
                                            <span style="color: red;">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Long Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textarea" rows="15" name="long_description">{{$Product->long_description}}</textarea>
                                            <span style="color: red;">{{ $errors->has('long_description') ? $errors->first('long_description') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="product_image" accept="image/*">
                                            <img src="{{asset($Product->product_image)}}" height="50" width="50">
                                            <input type="hidden" name="old_image" value="{{$Product->product_image}}">
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

                </div>
                <!-- product Categorie List End -->
                <!-- Sidebar Shopping Option Start -->
                <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9">
                    <div class="sidebar white-bg">
                        <div class="border-default universal-padding">
                            <div class="group-title">
                                <h2>categories</h2>
                            </div>
                            <ul>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Sidebar Shopping Option End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Shop Page End -->

@endsection