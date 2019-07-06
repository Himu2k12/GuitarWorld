@extends('admin.master')
@section('title')
    View-product
    @endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if( $message = Session::get('message') )
                <h1 class="page-header">{{ $message }}</h1>
            @endif
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-offset-3 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <h2 class="text-info" style="text-align: center">View Product Details</h2>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Product ID</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <td>{{ $product->category_name }}</td>
                        </tr>

                        <tr>
                            <th>Brand Name</th>
                            <td>{{ $product->brand_name }}</td>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <td>{{ $product->product_name }}</td>
                        </tr>
                        <tr>
                            <th>Product Code</th>
                            <td>{{ $product->product_code }}</td>
                        </tr>
                        <tr>
                            <th>Product Price</th>
                            <td>{{ $product->product_price }}</td>
                        </tr>

                        <tr>
                            <th>Product Short Description</th>
                            <td>{{ $product->short_description }}</td>
                        </tr>
                        <tr>
                            <th>Product Long Description</th>
                            <td>{{ $product->long_description }}</td>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <td><img src="../{{ $product->product_image }}" height="80" width="80"/> </td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td>{{ $product->status==1?'Active':'Disable'}}</td>
                        </tr>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection