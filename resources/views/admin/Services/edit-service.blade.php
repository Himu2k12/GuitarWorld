@extends('admin.master')
@section('title')
    Edit-product
    @endsection
@section('content')
<br/>
<div class="row">
    <div class="col-sm-offset-3 col-sm-8">
        <div class="well">
            <h1 class="text-success" style="text-align: center">Product Servcies</h1>
            <form name="editProductForm" action="{{ url('/update-service-product') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}


                <div class="form-group">
                    <label class="col-sm-3">Brand Name</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{ $product->brand_name }}" class="form-control"/>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3">Product Name</label>
                    <div class="col-sm-9">
                        <input type="text" readonly value="{{ $product->product_name }}" name="product_name" class="form-control"/>
                        <input type="hidden" value="{{ $product->id }}" name="product_id" class="form-control"/>
                        <span style="color: red;">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3">Product Code</label>
                    <div class="col-sm-9">
                        <input type="text" readonly value="{{ $product->product_model }}" name="product_code" class="form-control"/>
                        <span style="color: red;">{{ $errors->has('product_code') ? $errors->first('product_code') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3">Product Problem Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" readonly rows="5" name="short_description">{{ $product->short_description }}</textarea>
                        <span style="color: red;">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Notes Of Services</label>
                    <div class="col-sm-9">
                        <textarea class="form-control"  rows="8" name="notes">{{$product->notes}}</textarea>
                        <span style="color: red;">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Total Cost</label>
                    <div class="col-sm-9">
                        <input type="number" value="{{$product->total_cost}}"  name="total_cost" class="form-control"/>
                        <span style="color: red;">{{ $errors->has('total_cost') ? $errors->first('total_cost') : ' ' }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Prepare time(In days)</label>
                    <div class="col-sm-9">
                        <input type="number"  name="prepare_time" value="{{$product->prepare_time}}" class="form-control"/>
                        <input type="hidden" value="0"  name="accept" class="form-control"/>
                        <input type="hidden"  value="0" name="declined" class="form-control"/>
                        <span style="color: red;">{{ $errors->has('prepare_time') ? $errors->first('prepare_time') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3">Status</label>
                    <div class="col-sm-9">
                        <select name="status" class="form-control">
                            <option>---Select Status---</option>
                            <option value="request">Requested</option>
                            <option value="Processing">Processing</option>
                            <option value="Completed">Completed</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Release Date</label>
                    <div class="col-sm-9">
                        <input type="date" value="<?php if(isset($product->delivery_date)){echo $product->delivery_date;} ?>" name="delivery_date" min="<?php echo date("Y-m-d"); ?>" class="form-control"/>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <input type="submit"  name="btn" class="btn btn-success btn-block" value="Update Product Info"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.forms['editProductForm'].elements['status'].value = '{{ $product->status }}';
</script>
@endsection