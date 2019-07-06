@extends('font.master')
@section('content')


<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center">
        All Sells Of {{Auth::user()->name}}
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Product ID</th>
                <th>Net Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>

            @foreach($sellOfBrands as $sellOfBrand)
                <tr class="odd gradeX">
                    <td>{{$sellOfBrand->id}}</td>
                    <td>{{$sellOfBrand->order_id}}</td>
                    <td>{{$sellOfBrand->product_id}}</td>
                    <td>{{$sellOfBrand->net_price}}</td>
                    <td>{{$sellOfBrand->quantity}}</td>
                    <td>{{$sellOfBrand->total_amount}}</td>
                    <td>{{$sellOfBrand->created_at}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- /.table-responsive -->
    </div>
    <!-- /.panel-body -->
</div>
@endsection