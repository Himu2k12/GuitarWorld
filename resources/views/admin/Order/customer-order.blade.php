@extends('admin.master')
@section('title')
    Manage-Customer-order
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-offset-3 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="text-info" style="text-align: center">Manage Order</h1>
                    @if( $message = Session::get('message') )
                        <h4 class="page-header text-success" style="text-align: center">{{ $message }}</h4>
                    @endif
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Order ID</th>
                            <th>Customer ID</th>
                            <th>Shipping ID</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($customerOrder as $customerOr)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $customerOr->id }}</td>
                                <td>{{ $customerOr->customer_id }}</td>
                                <td>{{ $customerOr->shipping_id }}</td>
                                <td>{{ $customerOr->created_at }}</td>
                                <td>{{ $customerOr->status ==1 ? 'Delivered' : 'Pending' }}</td>
                                <td>
                                    <a href="{{ url('/details-order-view/'.$customerOr->id) }}" class="btn btn-info btn-xl" title="View Order Details">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    @if($customerOr->status ==0)
                                        <a href="{{ url('/Confirm-delivery/'.$customerOr->id) }}" class="btn btn-danger btn-xl" title="Confirm Delivery">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{ url('/activate-product/'.$customerOr->id) }}" class="btn btn-success btn-xl" title="Disabled Product">
                                            <span>Delivered</span>
                                        </a>
                                    @endif

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