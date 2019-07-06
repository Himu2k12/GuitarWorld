


@extends('font.master')

@section('content')
    <link href="{{asset('/paymentAsset/')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />

    <div class="main">
        <h1>Payment Form Widget</h1>
        <div class="content">

            <script src="{{asset('/paymentAsset/')}}/js/easyResponsiveTabs.js" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#horizontalTab').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });
                });

            </script>
            <div class="sap_tabs">
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                    <div class="pay-tabs">
                        <h2>Select Payment Method</h2>
                        <ul class="resp-tabs-list">
                            <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label class="pic1" style="height: 70px;"></label>Credit Card</span></li>
                            <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span><label class="pic3" style="height: 70px;"></label>Net Banking</span></li>
                            <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span><label class="pic4" style="height: 70px;"></label>PayPal</span></li>
                            <li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span><label class="pic2" style="height: 70px;"></label>Account Payment</span></li>
                            <div class="clear"></div>
                        </ul>
                    </div>
                    <div class="resp-tabs-container">
                        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                            <div class="payment-info">
                                <h3>Personal Information</h3>
                                <form>
                                    <div class="tab-for">
                                        <h5>EMAIL ADDRESS</h5>
                                        <input type="text" style="color: #00E56B" value="{{Auth::user()->email}}">
                                        <h5>FIRST NAME</h5>
                                        <input type="text" style="color: #00E56B" value="{{Auth::user()->name}}">
                                    </div>
                                </form>
                                <h3 class="pay-title">Credit Card Info</h3>
                                <form action="{{url('/new-order-with-Shipping')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="tab-for">
                                        <h5>AMOUNT OF PAYMENT</h5>
                                       <input type="text" name="payment_amount" style="color: black" value="{{$money}}" readonly required/>
                                       <input type="hidden" name="user_id" value="{{Auth::user()->id}}" readonly required/>

                                        <h5>NAME ON CARD</h5>
                                        <input type="text" name="name_on_card" style="color: black" value="" required>
                                        <span style="color: red;">{{ $errors->has('name_on_card') ? $errors->first('name_on_card') : ' ' }}</span>
                                        <h5>CARD NUMBER</h5>
                                        <input class="pay-logo" style="color: black" name="card_number" type="text" placeholder="0000-0000-0000-0000" required/>
                                        <span style="color: red;">{{ $errors->has('card_number') ? $errors->first('card_number') : ' ' }}</span>
                                    </div>
                                    <div class="transaction">
                                        <div class="tab-form-left user-form">
                                            <h5>EXPIRATION</h5>
                                            <ul>
                                                <li>
                                                    <input type="number" name="month" class="text_box" type="text" placeholder="6" min="1" max="12" />

                                                </li>
                                                <li style="width: 70px">
                                                    <input type="number" name="year" class="text_box" type="text" placeholder="2018" min="2018" max="2100" required />

                                                </li>
                                                <span style="color: red;">{{ $errors->has('month') ? $errors->first('month') : ' ' }}</span>
                                                <span style="color: red;">{{ $errors->has('year') ? $errors->first('year') : ' ' }}</span>

                                            </ul>
                                        </div>
                                        <div class="tab-form-right user-form-rt">
                                            <h5>CVV NUMBER</h5>
                                            <input type="text" name="cvv_number" placeholder="xxxx" required="">
                                            <span style="color: red;">{{ $errors->has('cvv_number') ? $errors->first('cvv_number') : ' ' }}</span>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="single-bottom">
                                        <ul>
                                            <li>
                                                <input type="checkbox" id="brand" required />
                                                <label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
                                            </li>
                                        </ul>
                                    </div><br>
                                    <input type="submit" value="SUBMIT">
                                </form>

                            </div>
                        </div>
                        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                            <div class="payment-info">
                                <h3>Net Banking</h3>
                                <div class="radio-btns">
                                    Coming Soon
                                    <div class="clear"></div>
                                </div>
                                <a href="#" >Continue</a>
                            </div>
                        </div>
                        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                            <div class="payment-info">
                                <h3>PayPal</h3>
                                <h4>Already Have A PayPal Account?</h4>
                                <div class="login-tab">
                                    <div class="user-login">
                                        <h2>Login</h2>

                                        <form>
                                            <input type="text" value="name@email.com" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'name@email.com';}" required="">
                                            <input type="password" value="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}" required="">
                                            <div class="user-grids">
                                                <div class="user-left">
                                                    <div class="single-bottom">
                                                        <ul>
                                                            <li>
                                                                <input type="checkbox"  id="brand1" value="">
                                                                <label for="brand1"><span></span>Remember me?</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="user-right">
                                                    <input type="submit" value="LOGIN">
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
                            <div class="payment-info">

                                <h3 class="pay-title">Guitar world Account</h3>
                                <form action="{{url('/new-order-with-Shipping-account')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="tab-for">
                                        <h5>YOUR BALANCE</h5>
                                        @if(Auth::user()->role=="dealer")
                                        <input type="text" name="payment_amount" value="{{$netIncome-$dealerWithdrawMoney-($netIncome)*7/100}}" readonly required/>
                                        <input type="hidden" name="commission" value="{{$money*100/93-$money}}" readonly required/>
                                            @elseif(Auth::user()->role=="customer")
                                        <input type="text" name="payment_amount" value="{{$netIncome-$dealerWithdrawMoney-($netIncome)*10/100}}" readonly required/>
                                        <input type="hidden" name="commission" value="{{$money*100/90-$money}}" readonly required/>

                                        @endif
                                        <h5>AMOUNT OF PAYMENT</h5>
                                        <input type="text" name="payment_amount" value="{{$money}}" readonly required/>
                                        <?php
                                        if(Auth::user()->role=="dealer"){
                                        $availableBalance=$netIncome-$dealerWithdrawMoney-($netIncome)*7/100;
                                        }elseif (Auth::user()->role=="customer"){
                                        $availableBalance=$netIncome-$dealerWithdrawMoney-($netIncome)*10/100;
                                        }
                                       ?>
                                      <?php if ($availableBalance > $money){ ?>
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" readonly required/>
                                            <h5>NAME ON CARD</h5>
                                        <input type="text" name="name_on_card" readonly style="color: #1d5987" value="Guitar World">
                                        <h5>CARD NUMBER</h5>
                                        <input class="pay-logo" style="color: #1d5987" type="text" READONLY value="xxxx-xxxx-xxxx-xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx-xxxx-xxxx-xxxx';}" required="">
                                    </div>
                                    <div class="transaction">
                                        <div class="tab-form-left user-form">
                                            <h5>EXPIRATION</h5>
                                            <ul>
                                                <li>
                                                    <input type="number" name="month" class="text_box" type="text" readonly value="10" min="1" />
                                                </li>
                                                <li>
                                                    <input type="number" name="year" style="width: 110%" class="text_box" type="text" readonly value="2021" min="1" />
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="tab-form-right user-form-rt">
                                            <h5>CVV NUMBER</h5>
                                            <input type="text" style="color: #1d5987" value="xxxx" readonly onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required="">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="single-bottom">
                                        <ul>
                                            <li>
                                                <input type="checkbox" required  id="brandtwo" value="">
                                                <label for="brandtwo"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
                                            </li>
                                        </ul>
                                    </div><br>
                                    <input type="submit" value="SUBMIT">
                                    <?php } else { ?>
                                        You don't have sufficient balance in your Account.please Choose other methos
                                        <?php  } ?>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <p class="footer">Copyright © 2016 Payment Form Widget. All Rights Reserved | Template by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
    </div>


    @endsection

