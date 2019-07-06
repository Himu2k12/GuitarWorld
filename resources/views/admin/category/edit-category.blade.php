@extends('admin.master')
@section('title')
   Edit Category
@endsection
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h1 class="text-success" style="text-align: center">Edit Category</h1>
                {{ Session::get('message') }}

                <form name="editCategoryForm" action="{{ url('/update-category') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{ $categoryById->category_name }}" name="category_name" class="form-control"/>
                            <input type="hidden" value="{{ $categoryById->id }}" name="t" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Category Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="category_image" class="form-control"/>
                            <img src="{{ asset($categoryById->category_image)}}" alt="" height="80" width="80"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Category Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="category_description">{{ $categoryById->category_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3"> Status</label>
                        <div class="col-sm-9">
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Category Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editCategoryForm'].elements['status'].value = '{{ $categoryById->status }}';
    </script>
@endsection









