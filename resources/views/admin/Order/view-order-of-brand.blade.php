@extends('admin.master')
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
        <div class="col-md-offset-3 col col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center">
                    Order Details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <h1>Customer Info</h1>
                    <hr/>
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Customer Name</th>
                            <td>{{ $customer->name}}</td>
                        </tr>
                        <tr>
                            <th>Customer Email</th>
                            <td>{{ $customer->email }}</td>
                        </tr>
                        <tr>
                            <th>User Type</th>
                            <td>{{ $customer->role }}</td>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                    <h1>Shipping Info</h1>
                    <hr/>
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Shipping Name</th>
                            <td>{{ $ShippingDetails->name }}</td>
                        </tr>
                        <tr>
                            <th>Address 1</th>
                            <td>{{ $ShippingDetails->address1 }}</td>
                        </tr>
                        <tr>
                            <th>Address 2</th>
                            <td>{{ $ShippingDetails->address2 }}</td>
                        </tr>
                        <tr>
                            <th>phone</th>
                            <td>{{ $ShippingDetails->phone }}</td>
                        </tr>
                        <tr>
                            <th>Post Code</th>
                            <td>{{ $ShippingDetails->postCode }}</td>
                        </tr>
                        <tr>
                            <th>Town</th>
                            <td>{{ $ShippingDetails->town }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ $ShippingDetails->state }}</td>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <h1>Product Info</h1>
                    <hr/>
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Net Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        @php($i=1)
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->product_id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>TK. {{ $product->net_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>TK. {{ $product->total_amount }}</td>

                            </tr>
                        @endforeach
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection