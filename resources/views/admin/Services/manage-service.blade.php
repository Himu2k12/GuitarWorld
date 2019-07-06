@extends('admin.master')
@section('title')
    Manage-service
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-offset-2 col-sm-9" style="padding-left: 5%">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="text-info" style="text-align: center">Manage service Products</h1>
                    @if( $message = Session::get('message') )
                        <h4 class="page-header text-danger" style="text-align: center">{{ $message }}</h4>
                    @endif
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product Name</th>
                            <th>Service Type</th>
                            <th>Short Description</th>
                            <th>Product image</th>
                            <th>Recent Status</th>
                            <th>Post Date</th>
                            <th>Delivery Date</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($services as $service)
                            <tr class="odd gradeX">
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->product_name }}</td>
                                <td>{{ $service->Services }}</td>
                                <td>{{ $service->short_description }}</td>
                                <td><img src="{{ $service->product_image }}" href="50px" width="50px"> </td>
                                <td>{{ $service->status}}</td>
                                <td>{{ $service->created_at}}</td>
                                <td>{{ $service->delivery_date}}</td>
                                <td>
                                @if($service->accept==1)
                                    <label class="btn btn-success">Confirmed</label>
                                @elseif($service->declined==1)
                                        <label class="btn btn-danger">Declined</label>
                                    @else
                                        <label class="btn btn-info">Pending</label>
                                    @endif
                                    </td>
                                    <td>
                                @if(isset($service->prepare_time))
                                        <label class="btn btn-success">Details Send</label>
                                    @else
                                        <label class="btn btn-danger">Not Viewed</label>
                                    @endif

                                </td>
                                <td>

                                    <button class="btn btn-info btn-xl" data-toggle="modal" data-target="#myModal" onclick=" viewService(<?php $detailService=$detailsService->ServiceDetails($service->id) ; ?>) "><span class="glyphicon glyphicon-zoom-in"></span> </button>

                                    <a href="{{ url('/edit-service/'.$service->id) }}" class="btn btn-primary btn-xl" title="Edit Product">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align: center">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">View Product Details</h4>
                                </div>

                                <table width="100%" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <td>{{ $service->product_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Service Type</th>
                                        <td>{{$detailService->Services}}</td>
                                    </tr>
                                    <tr>
                                        <th>Brand Name</th>
                                        <td>{{$detailService->brand_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Brand Image</th>
                                        <td><img src="{{$detailService->product_image}}" height="70" width="70"> </td>
                                    </tr>
                                    <tr>
                                        <th>used Period</th>
                                        <td>{{$detailService->user_period}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Model</th>
                                        <td>{{ $detailService->product_model }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Problem</th>
                                        <td>{{ $detailService->short_description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment</th>
                                        <td>
                                            @if($detailService->accept==1)
                                                <label class="btn btn-success">Done</label>
                                                @elseif($detailService->declined==1)
                                                <label class="btn btn-danger">Canceled</label>
                                                @else
                                                <label class="btn btn-primary">Pending</label>
                                                @endif
                                        </td>
                                    </tr>
                                    </thead>
                                </table>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection