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
                                <h1 class="text-info" style="text-align: center;padding-bottom: 5%;">Add Product</h1>
                                <h3 style="text-align: center" class="text-success" >{{ Session::get('message') }}</h3>
                                <form action="{{ url('/brand-new-product') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-sm-3">Category Name</label>
                                        <div class="col-sm-9">
                                            <select name="category_id" class="form-control" required>
                                                <option value="">---Select Category Name---</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Brand Name</label>
                                        <div class="col-sm-9">
                                            <select name="brand_id"  readonly="readonly" class="form-control">
                                                <option value="{{Auth::user()->id }}">{{Auth::user()->name}}</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="product_name" value="{{ old('product_name') }}" class="form-control"/>
                                            <span style="color: red;">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="product_code" value="{{ old('product_code') }}" class="form-control"/>
                                            <span style="color: red;">{{ $errors->has('product_code') ? $errors->first('product_code') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3">Product Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="product_price" value="{{ old('product_price') }}" required class="form-control"/>
                                            <span style="color: red;">{{ $errors->has('product_price') ? $errors->first('product_price') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="number" id="brandProductQty" value="{{ old('product_quantity') }}"  onblur="GetMinimumValue();" name="product_quantity" class="form-control" min="1"/>
                                            <span style="color: red;">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3">Product Discount(%)</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="product_discount" value="{{ old('product_discount') }}" class="form-control" min="0"/>
                                            <span style="color: red;">{{ $errors->has('product_discount') ? $errors->first('product_discount') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3">Minimum Sell Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="number" id="minSellNumber" value="{{ old('product_sell_number') }}" name="product_sell_number" class="form-control"/>
                                            <span style="color: red;">{{ $errors->has('product_sell_number') ? $errors->first('product_sell_number') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Short Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="5" name="short_description">{{ old('short_description') }}</textarea>
                                            <span style="color: red;">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3">Product Long Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textarea" rows="15" name="long_description">{{ old('long_description') }}</textarea>
                                            <span style="color: red;">{{ $errors->has('long_description') ? $errors->first('long_description') : ' ' }}</span>
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
                                        <label class="col-sm-3"> Status</label>
                                        <div class="col-sm-9">
                                            <select name="status" class="form-control">
                                                 <option value="1">Active</option>
                                                <option value="0">Disable</option>
                                            </select>
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
                                <li><a href="#">{{$category->category_name}}</a></li>
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