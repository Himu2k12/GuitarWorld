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
    <form action="{{url('/make-payment-service')}}" method="post" name="shipping">
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
                    <div class="col-md-6">
                        <div class="coupon-info" style="height: 627px; border: 1px solid black; border-radius: 10px; padding: 40px">
                                    <h4 style="text-align: center">PickUp Address</h4>

                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <label>Name</label>
                                            <input type="text" id="pname" name="pname" required placeholder="" value="<?php if($serviceShipping!=null){echo $serviceShipping->pname;} ?>"/>
                                            <span style="color: red;">{{ $errors->has('pname') ? $errors->first('pname') : ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <label>Address <span class="required">*</span></label>
                                            <input type="text" id="paddress1" name="paddress1" required placeholder="Street address"  value="<?php if($serviceShipping!=null){echo $serviceShipping->paddress1;} ?>"/>
                                            <input type="hidden" id="service_id" name="service_id" required placeholder="Street address"  value="{{$services->id}}"/>
                                            <span style="color: red;">{{ $errors->has('address1') ? $errors->first('address1') : ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <input type="text" id="paddress2" name="paddress2"  placeholder="Apartment, suite, unit etc. (optional)" value="<?php if($serviceShipping!=null){echo $serviceShipping->paddress2;} ?>"/>
                                            <span style="color: red;">{{ $errors->has('address2') ? $errors->first('address2') : ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text" id="ptown" required name="ptown" placeholder="Town / City" value="<?php if($serviceShipping!=null){echo $serviceShipping->ptown;} ?>"/>
                                            <span style="color: red;">{{ $errors->has('town') ? $errors->first('town') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>State / County  <span  class="required">*</span></label>
                                            <select name="pstate" id="pstate" onchange="country();">
                                                <option>Select Country</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Canada">Canada</option>
                                                <option value="USA">USA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>Postcode / Zip <span class="required">*</span></label>
                                            <input type="text" id="ppostcode" required name="ppostcode" placeholder="Postcode / Zip" value="<?php if($serviceShipping!=null){echo $serviceShipping->ppostcode;} ?>"/>
                                            <span style="color: red;">{{ $errors->has('postCode') ? $errors->first('postCode') : ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>Phone  <span class="required">*</span></label>
                                            <input type="number" id="pphone" required name="pphone"  placeholder="phone number" value="<?php if($serviceShipping!=null){echo $serviceShipping->pphone;} ?>"/>
                                            <span style="color: red;">{{ $errors->has('phone') ? $errors->first('phone') : ' ' }}</span>
                                        </div>
                                    </div>


                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="coupon-info" style="border: 1px solid black; border-radius: 10px; padding: 40px">
                                    <h4 style="text-align: center">Shipping Address</h4>

                                    @if(isset($OldShippingAddress))
                                        <div class="alert alert-success" id="success-alert" style="text-align: center">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                            <strong >Address! </strong>
                                            Do You Want to Ship on Previous Address?.Then Proceed or Edit
                                        </div>
                                    @endif
                                   <div class="col-md-12">
                                       <div class="checkout-form-list mb-30">
                                           <input type="checkbox" onclick="sameFormData()"/>As Same as PickUp
                                       </div>
                                   </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <label>Name</label>
                                            <input type="text" id="sname" name="sname" required placeholder="" value="<?php if($serviceShipping!=null){echo $serviceShipping->sname;} ?>" />
                                            <span style="color: red;">{{ $errors->has('sname') ? $errors->first('sname') : ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <label>Address <span class="required">*</span></label>
                                            <input type="text" id="saddress1" name="saddress1" required placeholder="Street address" value="<?php if($serviceShipping!=null){echo $serviceShipping->saddress1;} ?>" />
                                            <span style="color: red;">{{ $errors->has('saddress1') ? $errors->first('saddress1') : ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <input type="text" id="saddress2" name="saddress2"  placeholder="Apartment, suite, unit etc. (optional)" value="<?php if($serviceShipping!=null){echo $serviceShipping->saddress2;} ?>" />
                                            <span style="color: red;">{{ $errors->has('address2') ? $errors->first('address2') : ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text" id="stown" required name="stown" placeholder="Town / City" value="<?php if($serviceShipping!=null){echo $serviceShipping->stown;} ?>" />
                                            <span style="color: red;">{{ $errors->has('stown') ? $errors->first('stown') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>State / County <span  class="required">*</span></label>
                                            <input type="text" readonly id="sstate" required name="sstate" placeholder="State / Country" value="<?php if($serviceShipping!=null){echo $serviceShipping->pstate;} ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>Postcode / Zip <span class="required">*</span></label>
                                            <input type="text" id="spostcode" required name="spostcode" placeholder="Postcode / Zip" value="<?php if($serviceShipping!=null){echo $serviceShipping->spostcode;} ?>" />
                                            <span style="color: red;">{{ $errors->has('spostcode') ? $errors->first('spostcode') : ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>Phone  <span class="required">*</span></label>
                                            <input type="number" id="sphone" required name="sphone"  placeholder="phone number" value="<?php if($serviceShipping!=null){echo $serviceShipping->sphone;} ?>" />
                                            <span style="color: red;">{{ $errors->has('sphone') ? $errors->first('sphone') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <input type="reset" value='Reset' style="background-color: #0c5460; border-radius: 7px" class="btn btn-primary" />

                                </div>
                     </div>

                </div>
                <div style="text-align: center">
                    @if($serviceShipping!=null)
                    <input type="hidden" value='{{$serviceShipping->id}}' name="service_shipping_id" />
                    <input type="submit" class="btn btn-success" style="border-radius: 10px; width:20%; height: 40px" value='Update & Continue' />

                    @else
                    <input type="submit" class="btn btn-success" style="border-radius: 10px; width:10%; height: 40px" value='Submit'  class="btn btn-success" />
                        @endif
                </div>
            </div>

        </div>

        <!-- coupon-area end -->
    </form>
    <script>
        document.forms['shipping'].elements['pstate'].value  = '<?php if($serviceShipping!=null){echo $serviceShipping->pstate;} ?>';

    </script>

@endsection