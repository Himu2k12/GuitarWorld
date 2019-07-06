@extends('font.master')

@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/brand-home')}}">Home</a></li>
                    <li class="active"><a href="#">Manage Product</a></li>
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
                {{--manage products of enrollerd brand start here--}}

                <div class=" col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="text-info" style="text-align: center">Manage Product</h1>
                            @if( $message = Session::get('message') )
                                <h4 class="page-header text-danger" style="text-align: center">{{ $message }}</h4>
                            @endif
                            @if( $message = Session::get('Succmessage') )
                                <h4 class="page-header text-success" style="text-align: center">{{ $message }}</h4>
                            @endif
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Product Code</th>
                                    <th>Product Quantity</th>
                                    <th>Product Discount</th>
                                    <th>Product Price</th>
                                    <th>Product image</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=100001; ?>
                                @foreach($products as $product)
                                    <tr class="odd gradeX">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->product_code }}</td>
                                        <td>{{ $product->product_quantity }}</td>
                                        <td>{{ $product->product_discount }} %</td>
                                        <td>TK. {{ $product->product_price }}</td>
                                        <td><img src="{{ $product->product_image }}" href="50px" width="50px"> </td>
                                        <td>{{ $product->status ==1 ? 'Active' : 'Disabled' }}</td>
                                        <td>
                                            @if($product->status ==1)
                                                <a href="{{ url('/disabled-brand-product/'.$product->id) }}" class="btn btn-success btn-xs" title="Activate Product">
                                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                                </a>
                                            @else
                                                <a href="{{ url('/activate-brand-product/'.$product->id) }}" class="btn btn-warning btn-xs" title="Disabled Product">
                                                    <span class="glyphicon glyphicon-arrow-down"></span>
                                                </a>
                                            @endif

                                            <a href="{{ url('/brand-edit-product/'.$product->id) }}" class="btn btn-primary btn-xs" title="Edit Product">
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

                {{--manage products of enrollerd brand end here--}}


            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Shop Page End -->


@endsection