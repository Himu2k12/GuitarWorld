@extends('font.master')
@section('content')


    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/sell-buy')}}">Buy&Sell</a></li>
                    <li class="active"><a href="{{url('/add-Items-To-Buy-And-Sell')}}">Add Product</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Page Start -->
    <div class="main-shop-page">
        <div class="container">
            <!-- Row End -->
            @if(Session::get('SuccessMessage')!=null)
                <div class="alert alert-success" id="success-alert" style="text-align: center">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong >Success! </strong>
                    {{Session::get('SuccessMessage')}}
                </div>

            @endif
            <div class="row">
                <!-- Product Categorie List Start -->
                <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3">
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
                            <div class="well">
                                <h1 class="text-info" style="text-align: center;padding-bottom: 5%;">Add your Product</h1>
                                <h3 style="text-align: center" class="text-success" >{{ Session::get('message') }}</h3>
                                <form action="{{ url('/new-items') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-sm-3">Category Name<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <select name="category_id" class="form-control">
                                                <option>---Select Category Name---</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                            <span style="color: red;">{{ $errors->has('category_name') ? $errors->first('category_name') : ' ' }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Brand Name<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <select name="brand_id"  class="form-control">
                                                <option>---Select Brand---</option>
                                                @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                  @endforeach
                                            </select>
                                            <span style="color: red;">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' ' }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Name<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="product_name" class="form-control" value="{{old('product_name')}}" placeholder="Ex: Gibson"/>
                                            <input type="hidden" name="customer_id" value="{{Auth::user()->id}}" class="form-control"/>
                                            <span style="color: red;">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3">Product Condition<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="col-sm-6"> <input type="radio" name="product_condition" id="new" value="new" checked/> New</div>
                                            <div class="col-sm-6"> <input type="radio" name="product_condition" id="used" value="used" /> Used</div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="usedDetails">
                                        <label class="col-sm-3">used period(In month)</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="user_period" class="form-control" value="{{old('used_period')}}" placeholder="Ex: 12"/>
                                            <span style="color: red;">{{ $errors->has('user_period') ? $errors->first('user_period') : ' ' }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Price<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" name="product_price" class="form-control" value="{{old('product_price')}}" placeholder="Ex: 10000"/>
                                            <span style="color: red;">{{ $errors->has('product_price') ? $errors->first('product_price') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3">Product Discount(%)<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" name="product_discount" value="0" class="form-control" value="{{old('product_discount')}}" min="0" placeholder="Ex: 10"/>
                                            <span style="color: red;">{{ $errors->has('product_discount') ? $errors->first('product_discount') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3">Product Code<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="product_code" class="form-control" value="{{old('product_code')}}" placeholder="Ex: bg1023g"/>
                                            <span style="color: red;">{{ $errors->has('product_code') ? $errors->first('product_code') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Quantity<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" name="product_quantity" class="form-control" value="{{old('product_quantity')}}" min="1" placeholder="Ex: 2"/>
                                            <span style="color: red;">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Short Description<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="3" name="short_description" placeholder="Max:200 word">{{old('short_description')}}</textarea>
                                            <span style="color: red;">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3">Product Long Description<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="8" name="long_description" placeholder="Max:300 word">{{old('long_description')}}</textarea>
                                            <span style="color: red;">{{ $errors->has('long_description') ? $errors->first('long_description') : ' ' }}</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3">Product Image<span style="color: red;">*</span></label>
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
                                @foreach($categories as $category)
                                    <li><a href="#">{{$category->category_name}} (9)</a></li>
                                @endforeach

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