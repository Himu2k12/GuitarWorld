@extends('font.master')

@section('content')
<br>
<br>
<br>

    <!-- Breadcrumb Start -->
    <!-- Breadcrumb End -->
    <!-- Error 404 Area Start -->
    <div class="error404-area pb-50 pt-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-wrapper text-center">
                        <div class="error-text">
                            <h3>CONGRATULATIONS!!!!</h3>
                            <h5>Your Purchase has been Completed!!</h5>
                        </div>

                        <div class="error-button">
                            <a target="_blank" href="{{url('/print-invoice')}}">Download/Print Invoice</a>
                            <a href="{{url('/')}}">Back to home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Error 404 Area End -->

@endsection