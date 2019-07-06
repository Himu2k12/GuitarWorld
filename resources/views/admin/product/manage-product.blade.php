@extends('admin.master')
@section('title')
    Manage-product
    @endsection
@section('content')
    <div class="row">
        <div class="col-sm-offset-3 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="text-info" style="text-align: center">Manage Product</h1>
                    @if( $message = Session::get('message') )
                        <h4 class="page-header text-danger" style="text-align: center">{{ $message }}</h4>
                    @endif
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Code</th>
                            <th>Product Quantity</th>
                            <th>Product Price</th>
                            <th>Product image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($products as $product)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->brand_name }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>TK. {{ $product->product_price }}</td>
                                <td><img src="{{ $product->product_image }}" href="50px" width="50px"> </td>
                                <td>{{ $product->status ==1 ? 'Active' : 'Disabled' }}</td>
                                <td>
                                    <a href="{{ url('/view-product/'.$product->id) }}" class="btn btn-info btn-xl" title="View Product">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    @if($product->status ==1)
                                        <a href="{{ url('/disabled-product/'.$product->id) }}" class="btn btn-success btn-xl" title="Activate Product">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{ url('/activate-product/'.$product->id) }}" class="btn btn-warning btn-xl" title="Disabled Product">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif

                                    <a href="{{ url('/edit-product/'.$product->id) }}" class="btn btn-primary btn-xl" title="Edit Product">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
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