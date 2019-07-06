@extends('admin.master')
@section('title')
    Manage Brand
@endsection
@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-8 col-sm-12">
            @if( $message = Session::get('message') )
                <h1 class="page-header">{{ $message }}</h1>
            @endif
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-offset-3 col-md-8 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading " style="text-align: center">
                   <h2 class="text-info"> Manage Brand Information</h2>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Brand ID</th>
                            <th>Brand Image</th>
                            <th>brand Name</th>
                            <th>Brand Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($allBrands as $allBrand)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $allBrand->id }}</td>
                                <td><img src="{{ $allBrand->brand_image }}" href="50px" width="50px"> </td>
                                <td>{{ $allBrand->brand_name }}</td>
                                <td>{{ $allBrand->brand_specification }}</td>
                                <td>{{ $allBrand->status ==1 ? 'Active' : 'Disabled' }}</td>
                                <td>
                                    @if($allBrand->status ==1)
                                        <a href="{{ url('/disabled-brand/'.$allBrand->id) }}" class="btn btn-success btn-xs" title="active brand">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{ url('/active-brand/'.$allBrand->id) }}" class="btn btn-warning btn-xs" title="disable brand">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif

                                    <a href="{{ url('/edit-brand/'.$allBrand->id) }}" class="btn btn-primary btn-xs" title="Edit Brand">
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