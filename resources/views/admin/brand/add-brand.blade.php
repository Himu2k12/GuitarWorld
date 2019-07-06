@extends('admin.master')
@section('title')
    Add Brand
@endsection
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-8">
            <div class="well">

                <h1 class="text-info" style="text-align: center">Add Brand</h1>
                <h3 style="text-align: center" class="text-info">{{ Session::get('message') }}</h3>
                <form action="{{ url('/new-brand') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Brand Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="brand_name" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Brand Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="brand_specification"></textarea>
                            <span style="color: red;">{{ $errors->has('brand_specification') ? $errors->first('brand_specification') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Brand Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="brand_image" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('brand_image') ? $errors->first('brand_image') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Publication Status</label>
                        <div class="col-sm-9">
                            <select name="status" class="form-control">
                                <option>---Select Status---</option>
                                <option value="1">Active</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Brand Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection