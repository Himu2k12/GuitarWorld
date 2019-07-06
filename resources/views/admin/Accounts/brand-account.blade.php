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
                    <h2 class="text-info"> Brand Earning</h2>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand Name</th>
                            <th>Brand ID</th>
                            <th>Total</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
<?php $total=0; ?>
                        @foreach($sellOfBrands as $sellOfBrand)
                            <tr class="odd gradeX">
                                <td>{{$sellOfBrand->id}}</td>
                                <td>{{$sellOfBrand->name}}</td>
                                <td>{{$sellOfBrand->brand_id}}</td>
                                <td>{{$sellOfBrand->total_amount}}</td>
                                <td>{{$sellOfBrand->created_at}}</td>

                            </tr>
                            <?php $total=$total+$sellOfBrand->total_amount ?>
                        @endforeach

                        </tbody>
                        <tbody>
                        <tr class="odd gradeX">
                            <td colspan="3"> Total</td>
                            <td colspan="2"><b> {{$total}}</b></td>
                        </tr>
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
    <div class="row">
        <div class="col-md-offset-3 col-md-8 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading " style="text-align: center">
                    <h2 class="text-info"> Dealer Earning</h2>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example-dealer">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand Name</th>
                            <th>Brand ID</th>
                            <th>Total</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $totalDealer=0; $i=1; ?>
                        @foreach($sellOfDealers as $sellOfDealer)
                            <tr class="odd gradeX">

                                <td>{{$i++}}</td>
                                <td>{{$sellOfDealer->name}}</td>
                                <td>{{$sellOfDealer->id}}</td>
                                <td>{{$sellOfDealer->total_amount}}</td>
                                <td>{{$sellOfDealer->created_at}}</td>

                            </tr>
                            <?php $totalDealer=$totalDealer+$sellOfDealer->total_amount ?>
                        @endforeach

                        </tbody>
                        <tbody>
                        <tr class="odd gradeX">
                            <td colspan="3"> Total</td>
                            <td colspan="2"><b> {{$totalDealer}}</b></td>
                        </tr>
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
    <div class="row">
        <div class="col-md-offset-3 col-md-8 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading " style="text-align: center">
                    <h2 class="text-info"> Guitar World Earning</h2>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example-GW">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand Name</th>
                            <th>Total</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $totalGW=0; $i=1; ?>
                        @foreach($sellOfGW as $sellOfG)
                            <tr class="odd gradeX">

                                <td>{{$i++}}</td>
                                <td>Guitar World</td>
                                <td>{{$sellOfG->total_amount}}</td>
                                <td>{{$sellOfG->created_at}}</td>

                            </tr>
                            <?php $totalGW=$totalGW+$sellOfG->total_amount ?>
                        @endforeach

                        </tbody>
                        <tbody>
                        <tr class="odd gradeX">
                            <td colspan="3"> Total</td>
                            <td colspan="2"><b> {{$totalGW}}</b></td>
                        </tr>
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
    <div class="row">
        <div class="col-md-offset-3 col-md-8 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading " style="text-align: center">
                    <h2 class="text-info"> Marketplace Earning</h2>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example-customer">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Customer ID</th>
                            <th>Total</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $totalMP=0; $i=1; ?>
                        @foreach($sellOfMP as $sellOfM)
                            <tr class="odd gradeX">

                                <td>{{$i++}}</td>
                                <td>{{$sellOfM->name}}</td>
                                <td>{{$sellOfM->id}}</td>
                                <td>{{$sellOfM->total_amount}}</td>
                                <td>{{$sellOfM->created_at}}</td>

                            </tr>
                            <?php $totalMP=$totalMP+$sellOfM->total_amount ?>
                        @endforeach

                        </tbody>
                        <tbody>
                        <tr class="odd gradeX">
                            <td colspan="3"> Total</td>
                            <td colspan="2"><b> {{$totalMP}}</b></td>
                        </tr>
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
    <div class="row">
        <div class="col-md-offset-3 col-md-8 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading " style="text-align: center">
                    <h2 class="text-info"> Earning From Service</h2>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example-service">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service ID</th>
                            <th>Total Income</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $totalSC=0; $i=1; ?>
                        @foreach($serviceIncome as $serviceIncom)
                            <tr class="odd gradeX">
                                <td>{{$serviceIncom->id}}</td>
                                <td>{{$serviceIncom->service_id}}</td>
                                <td>{{$serviceIncom->payment_amount}}</td>
                                <td>{{$serviceIncom->created_at}}</td>

                            </tr>
                            <?php $totalSC=$totalSC+$serviceIncom->payment_amount ?>
                        @endforeach

                        </tbody>
                        <tbody>
                        <tr class="odd gradeX">
                            <td colspan="2"> Total</td>
                            <td colspan="2"><b> {{$totalSC}}</b></td>
                        </tr>
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
<div class="row">
        <div class="col-md-offset-3 col-md-8 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading " style="text-align: center">
                    <h2 class="text-info">Total Account Overview</h2>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example-service">
                        <thead>
                        <tr>
                            <th>Sector</th>
                            <th>Total Earning</th>
                            <th>Withdrawn Amount</th>
                            <th>Commison Received</th>
                            <th>Pending Commisson</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd gradeX">
                              <td>Brand</td>
                            <td>{{$total}}</td>
                            <td>{{$withdrawnAmountOfBrands}}</td>
                            <td>{{$commissionFromBrands}}</td>
                            <td>{{$total*.05-$commissionFromBrands}}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="odd gradeX">
                                <td>Dealer</td>
                              <td>{{$totalDealer}}</td>
                            <td>{{$withdrawnAmountOfDealers}}</td>
                            <td>{{$commissionFromDealers}}</td>
                            <td>{{$totalDealer*.07-$commissionFromDealers}}</td>
                        </tr>
                        </tbody>
                       <tbody>
                        <tr class="odd gradeX">
                            <td>Guitar World</td>
                              <td>{{$totalGW}}</td>
                              <td>0.00</td>
                            <td>{{$totalGW}}</td>
                              <td>N/A</td>
                        </tr>
                        </tbody>
                       <tbody>
                        <tr class="odd gradeX">
                            <td>Buy&Sell</td>
                              <td>{{$totalMP}}</td>
                            <td>{{$withdrawnAmountOfusers}}</td>
                            <td>{{$commissionFromusers}}</td>
                            <td>{{$totalMP*.1-$commissionFromusers}}</td>
                        </tr>
                        </tbody>
                       <tbody>
                        <tr class="odd gradeX">
                            <td>Servicing</td>
                            <td>{{$totalSC}}</td>
                            <td>0.00</td>
                            <td>{{$totalSC}}</td>
                            <td>N/A</td>

                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="odd gradeX">
                            <td><b> Total</b></td>
                            <td><b> {{$totalSC+$total+$totalMP+$totalGW+$totalDealer}}</b></td>
                            <td><b>{{$withdrawnAmountOfBrands+$withdrawnAmountOfDealers+$withdrawnAmountOfusers}}</b></td>
                            <td><b>{{$commissionFromBrands+$commissionFromDealers+$commissionFromusers}}</b></td>
                            <td><b>{{($total*.05-$commissionFromBrands)+($totalDealer*.07-$commissionFromDealers)+($totalMP*.1-$commissionFromusers)}}</b></td>
                        </tr>
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