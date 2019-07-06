@extends('font.master')

@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active"><a href="{{url('/cart-content')}}">Cart</a></li>
                </ul>
            </div>
            @if(Session::get('messageDanger')==!null)
            <div class="alert alert-danger" style="text-align: center">
                <strong style="text-align: center">{{Session::get('messageDanger')}}</strong>
            </div>
                @endif
            @if(Session::get('message')==!null)
            <div class="alert alert-success" style="text-align: center">
                <strong >{{Session::get('message')}}</strong>
            </div>
                @endif
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Cart Main Area Start -->
    <div class="cart-main-area pb-50">
        <div class="container">
            <h2 class="text-capitalize sub-heading">cart</h2>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- Form Start -->

                        <!-- Table Content Start -->
                        <div class="table-content table-responsive mb-50" >
                            <table id="cartosd">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cartProducts as $cartProduct)
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="{{ asset($cartProduct->options->ItemImage) }}" alt="" height="50" width="50"/>
                                    </td>
                                    <td class="product-name"><a href="#">{{$cartProduct->name}}</a></td>
                                    <td class="product-price"><span class="amount">{{$cartProduct->price}}</span></td>
                                    <td class="product-quantity">
                                        @if(Auth::user()->role=='dealer')
                                            <form action="{{ url('/update-cart') }}" method="POST">
                                                @else
                                                    <form action="{{ url('/update-cart-customer') }}" method="POST">
                                                    @endif
                                                {{ csrf_field() }}
                                                <input type="number" required onkeydown="return false" name="qty" min="1" max="{{$cartProduct->options->ItemStock}}" value="{{ $cartProduct->qty }}">
                                                <input type="hidden" name="rowId" value="{{ $cartProduct->rowId }}">
                                                <input type="hidden" name="id" value="{{ $cartProduct->id }}">
                                                <input type="submit" name="btn" style="background-color: #1B0034;color: white; width: 50%"  value="Update">
                                            </form>
                                    </td>

                                    <td class="product-subtotal">{{$cartProduct->subtotal()}}</td>

                                    <td class="product-remove"><button onclick="remove({{$cartProduct->id}});"><i class="fa fa-times"  aria-hidden="true"></i></button></td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Content Start -->
                        <div class="row">
                            <!-- Cart Button Start -->
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                <div class="buttons-cart">
                                    <a href="{{url('/brand-home')}}">Continue Shopping</a>
                                </div>
                            </div>
                            <!-- Cart Button Start -->
                            <!-- Cart Totals Start -->
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                <div class="cart_totals">
                                    <h2>Cart Totals</h2>
                                    <br />
                                    <table>
                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">{{Cart::instance('shopping')->subtotal()}}</span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Tax(15%)</th>
                                            <td><span class="amount2"><?php

                                                    $tax=(Cart::instance('shopping')->subtotal());
                                                    $new=floatval($tax)*150.00;

                                                    echo $new;
                                            ?></span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount3">{{Cart::instance('shopping')->total()}}</span></strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div id="checkoutu">
                                    @if(Cart::instance('shopping')->count()==0)

                                    @else
                                        <div class="wc-proceed-to-checkout">
                                            <a href="{{url('/checkout')}}">Proceed to Checkout</a>
                                        </div>
                                    @endif
                                    </div>

                                </div>
                            </div>
                            <!-- Cart Totals End -->
                        </div>
                        <!-- Row End -->

                    <!-- Form End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Cart Main Area End -->


@endsection