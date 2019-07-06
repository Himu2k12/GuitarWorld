@extends('admin.master')
@section('title')
    Manage- Category
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-offset-3 col-lg-8">
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
                    <h1 class="text-info" style="text-align: center">Manage Category</h1>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($allCategories as $allCategory)
                        <tr class="odd gradeX">
                            <td>{{ $i++ }}</td>
                            <td>{{ $allCategory->id }}</td>
                            <td>{{ $allCategory->category_name }}</td>
                            <td>{{ $allCategory->category_description }}</td>
                            <td>{{ $allCategory->status ==1 ? 'Active' : 'Disabled' }}</td>
                            <td>
                                @if($allCategory->status ==1)
                                    <a href="{{ url('/disable-category/'.$allCategory->id) }}" class="btn btn-success btn-xl" title="Active Category">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </a>
                                @else
                                    <a href="{{ url('/active-category/'.$allCategory->id) }}" class="btn btn-warning btn-xl" title="Disabled Category">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </a>
                                @endif

                                <a href="{{ url('/edit-category/'.$allCategory->id) }}" class="btn btn-primary btn-xl" title="Edit Categoruy">
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