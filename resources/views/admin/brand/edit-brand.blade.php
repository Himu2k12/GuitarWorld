@extends('admin.master')
@section('title')
    Edit Brand
@endsection
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h1 class="text-info" style="text-align: center">Edit Brand Infromation</h1>
                <h3 style="text-align: center" class="text-info">{{ Session::get('message') }}</h3>
                <form action="{{ url('/update-brand') }}"name="editbrandForm" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Brand Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="brand_name" class="form-control" value="{{$brandById->brand_name}}"/>
                            <input type="hidden" name="brand_id" class="form-control" value="{{$brandById->id}}"/>
                            <span style="color: red;">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Brand Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="brand_specification">{{$brandById->brand_specification}}</textarea>
                            <span style="color: red;">{{ $errors->has('brand_specification') ? $errors->first('brand_specification') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Brand Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="brand_image" accept="image/*">
                            <img src="{{ asset($brandById->brand_image)}}" alt="" height="80" width="80"/>
                            <span style="color: red;">{{ $errors->has('brand_image') ? $errors->first('brand_image') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Brand Status</label>
                        <div class="col-sm-9">
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Brand Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editbrandForm'].elements['status'].value = '{{ $brandById->status }}';
    </script>
@endsection