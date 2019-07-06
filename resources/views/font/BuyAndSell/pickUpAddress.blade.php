@extends('font.master')

@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="">Home</a></li>
                    <li class="active"><a href="{{url('/checkout')}}">Checkout</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- coupon-area start -->
    <form action="{{url('/savePickup')}}" method="post" >
        {{csrf_field()}}

        <div class="coupon-area">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title mb-50">
                    <h2 style="text-align: center"> pickup & shipping </h2>
                </div>
                @if(isset($serviceShipping))
                    <div class="alert alert-success" id="success-alert" style="text-align: center">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong >Address! </strong>
                        You have Already Submitted the PickUp and Shipping address
                    </div>
            @endif
            <!-- Section Title Start End -->
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="coupon-info" style="height: 635px; border: 1px solid black; border-radius: 10px; padding: 40px">
                            <h4 style="text-align: center">PickUp Address</h4>

                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <label>Name</label>
                                    <input type="text" id="pname" name="pname" required placeholder="" value=""/>
                                    <span style="color: red;">{{ $errors->has('pname') ? $errors->first('pname') : ' ' }}</span>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" id="paddress1" name="paddress1" required placeholder="Street address"  value=""/>
                                    <input type="hidden" id="service_id" name="service_id" required placeholder="Street address"  value=""/>
                                    <span style="color: red;">{{ $errors->has('address1') ? $errors->first('address1') : ' ' }}</span>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <input type="text" id="paddress2" name="paddress2"  placeholder="Apartment, suite, unit etc. (optional)" value=""/>
                                    <span style="color: red;">{{ $errors->has('paddress2') ? $errors->first('paddress2') : ' ' }}</span>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" id="ptown" required name="ptown" placeholder="Town / City" value=""/>
                                    <span style="color: red;">{{ $errors->has('ptown') ? $errors->first('ptown') : ' ' }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <label>Phone  <span class="required">*</span></label>
                                    <input type="number" id="pphone" required name="pphone"  placeholder="phone number" value=""/>
                                    <span style="color: red;">{{ $errors->has('pphone') ? $errors->first('pphone') : ' ' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label>State / County  <span  class="required">*</span></label>
                                    <select name="pstate" id="pstate">
                                        <option>Select Country</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Canada">Canada</option>
                                        <option value="USA">USA</option>
                                    </select>
                                    <span style="color: red;">{{ $errors->has('pstate') ? $errors->first('pstate') : ' ' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input type="text" id="ppostcode" required name="ppostcode" placeholder="Postcode / Zip" value=""/>
                                    <span style="color: red;">{{ $errors->has('ppostcode') ? $errors->first('ppostcode') : ' ' }}</span>
                                </div>
                            </div>
                            <div class="col-md-offset-3 col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <input type="submit" style="background: green; color: white; width: 150px; border-radius: 20px; "/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- coupon-area end -->
    </form>

@endsection