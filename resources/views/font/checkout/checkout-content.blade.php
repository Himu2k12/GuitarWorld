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
    <form action="{{url('/shipping-address')}}" method="post" name="shipping">
        {{csrf_field()}}

        <div class="coupon-area">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title mb-50">
                <h2>checkout</h2>
            </div>
            <!-- Section Title Start End -->
            <div class="row">
                <div class="col-md-6">
                            <div class="coupon-info" >
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
                                            <label>Name</label>
                                            <input type="text" name="name" required placeholder="" value="@php if(isset($OldShippingAddress)){echo $OldShippingAddress->name;} @endphp" />
                                            <span style="color: red;">{{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <label>Address <span class="required">*</span></label>
                                            <input type="text" name="address1" required placeholder="Street address"  value="@php if(isset($OldShippingAddress)){echo $OldShippingAddress->address1;} @endphp"/>
                                            <span style="color: red;">{{ $errors->has('address1') ? $errors->first('address1') : ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <input type="text" name="address2"  placeholder="Apartment, suite, unit etc. (optional)"  value="@php if(isset($OldShippingAddress)){echo $OldShippingAddress->address2;} @endphp"/>
                                            <span style="color: red;">{{ $errors->has('address2') ? $errors->first('address2') : ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text" required name="town" placeholder="Town / City" value="@php if(isset($OldShippingAddress)){echo $OldShippingAddress->town;} @endphp" />
                                            <span style="color: red;">{{ $errors->has('town') ? $errors->first('town') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>State / County <span  class="required">*</span></label>
                                            <select name="state">
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
                                            <input type="text" required name="postCode" placeholder="Postcode / Zip" value="@php if(isset($OldShippingAddress)){echo $OldShippingAddress->postCode;} @endphp" />
                                            <span style="color: red;">{{ $errors->has('postCode') ? $errors->first('postCode') : ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>Phone  <span class="required">*</span></label>
                                            <input type="number" required name="phone"  placeholder="phone number" value="@php if(isset($OldShippingAddress)){echo $OldShippingAddress->phone;}else{ } @endphp"/>
                                            <span style="color: red;">{{ $errors->has('phone') ? $errors->first('phone') : ' ' }}</span>
                                        </div>
                                    </div>
                                <input name='reset' type="reset" style="background-color: red" value='Reset' class="btn btn-primary" />

                            </div>
                        <!-- ACCORDION END -->
                        @if(Auth::user()->role=="dealer")
                        <h3>Want to Sell Here? <span id="showcoupon" style="color: #0BA4E0">Click here</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <a href="{{url('/payment-form')}}" class="btn btn-success">Sell Here</a>
                            </div>
                        </div>
                            @endif

                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cartProducts as $cartProduct)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{$cartProduct->name}} <strong class="product-quantity"> × {{$cartProduct->qty}}</strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">{{$cartProduct->subtotal()}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">{{Cart::instance('shopping')->subtotal()}}</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Total Tax</th>
                                    <td><span class="amount">{{Cart::instance('shopping')->subtotal()}}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">{{Cart::instance('shopping')->total()}}</span></strong>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Direct Bank Transfer
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Cheque Payment
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    PayPal
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <input type="submit" value="Place Order" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- coupon-area end -->
   </form>
    <script>
        document.forms['shipping'].elements['state'].value = '@php if(isset($OldShippingAddress)){echo $OldShippingAddress->state;}else{ } @endphp';
    </script>
@endsection