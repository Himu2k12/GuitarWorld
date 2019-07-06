@extends('admin.master')
@section('title')
    Add-product
   @endsection
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-8">
            <div class="well">
                <h1 class="text-info" style="text-align: center">Add Product</h1>
                <h3 style="text-align: center" class="text-success" >{{ Session::get('message') }}</h3>
                <form action="{{ url('/new-product') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                            <select name="brand_id" class="form-control" required>
                                <option value="">---Select Brand Name---</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="product_name" value="{{old('product_name')}}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">Product Code</label>
                        <div class="col-sm-9">
                            <input type="text" name="product_code" value="{{old('product_code')}}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('product_code') ? $errors->first('product_code') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Product Discount(%)</label>
                        <div class="col-sm-9">
                            <input type="number" name="product_discount" value="{{old('product_discount')}}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('product_discount') ? $errors->first('product_discount') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Product Price</label>
                        <div class="col-sm-9">
                            <input type="number" name="product_price" value="{{old('product_price')}}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('product_price') ? $errors->first('product_price') : ' ' }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">Product Quantity</label>
                        <div class="col-sm-9">
                            <input type="number" name="product_quantity" value="{{old('product_quantity')}}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ' ' }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">Product Short Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="short_description">{{old('short_description')}}</textarea>
                            <span style="color: red;">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">Product Long Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control textarea" rows="15" name="long_description">{{old('long_description')}}</textarea>
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
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Product Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection