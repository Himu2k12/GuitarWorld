@extends('admin.master')
@section('title')
    Add Category
@endsection
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-8">
            <div class="well">
                <h1 class="text-success" style="text-align: center">Add Category</h1>
               <h3 style="text-align: center" class="text-success">{{ Session::get('message') }}</h3>

                <form action="{{ url('/new-category') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="category_name" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Category Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="category_image" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Category Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="category_description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3"> Status</label>
                        <div class="col-sm-9">
                            <select name="status" class="form-control">
                                <option>---Select  Status---</option>
                                <option value="1">Active</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Category Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection