
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div style="float: left">
                <img src="{{asset('fontAsset/')}}/img/banner/guiterWorld.png"  alt="Guiter World" height="100px" width="100px" />

            </div>
            <div style="float: right">
                Ordered before 17:30, shipped today - Support: (012) 800 456 789
            </div>
            <div style="clear: both"></div>
            <div class="invoice-title col-sm-2" style="float: left">
                <h2 style="color: #0b2e13">Invoice</h2>
            </div>
            <div class="col-sm-10" style="text-align: right">
                <h3 >Order # {{$order->id}}</h3>
            </div>
            <hr>
            <div class="row" style="clear: both">
                <div class="col-xs-4" style="float: left">

                    <address>
                        <h3 style="color: #1B0034">Billed To</h3>
                        <h4>{{Auth::User()->name}}</h4>
                        <h4>{{Auth::User()->email}}</h4><br>

                    </address>

                </div>

                <div class="col-xs-8 text-right" style="text-align: right">
                    <address>

                        <h4>Shipped To</h4><br>
                        @if($order->shipping_id==0)
                            <h3>These Products will be Sell In GUITER WORLD</h3>
                            @else

                            {{$shipping->name}}<br>
                            {{$shipping->address1}}<br>
                            {{$shipping->address2}}<br>
                            {{$shipping->town}}<br>
                            {{$shipping->state}}<br>
                            {{$shipping->postCode}}<br>
                            {{$shipping->phone}}
                            @endif
                    </address>
                </div>
            </div>
            <div style="clear: both"></div>
            <div class="row">
                <div class="col-sm-4" style="float: left"><br>
                    <address>
                        <h3>Payment Method: Card</h3><br>
                        Name on Card: {{$paymentInfo->name_on_card}}<br>
                       Card Number: {{$paymentInfo->card_number}}<br>
                        Expiry Date: {{$paymentInfo->month}}/{{$paymentInfo->year}}
                    </address>
                </div>
                <div class="col-sm-8 text-right" style="text-align: right"><br>
                    <address>
                        <h3>Order Date:</h3>
                        <h5>{{$order->created_at}}</h5>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" style="text-align: center"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body" style="text-align: center; margin-left: auto; margin-right: auto">
                    <div class="table-responsive" style="text-align: center">
                        <table align="center" class="table table-condensed">
                            <thead>
                            <tr>
                                <td style="width: 150px; height: 60px"><strong>Item</strong></td>
                                <td style="width: 150px; height: 60px" class="text-center"><strong>Price</strong></td>
                                <td style="width: 150px; height: 60px" class="text-center"><strong>Quantity</strong></td>
                                <td style="width: 150px; height: 60px" class="text-center"><strong>Discount</strong></td>
                                <td style="width: 100px; height: 60px" class="text-right"><strong>Totals</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->

<?php $subtotal=0; ?>
                            @foreach($orderProducts as $item)
                            <tr>
                                <td>{{$item->product_name}}</td>
                                <td class="text-center">{{$item->net_price}}</td>
                                <td class="text-center">{{$item->quantity}}</td>
                                <td class="text-center">{{$item->product_discount}}%</td>
                                <td class="text-right" style="text-align: right">{{$item->net_price*$item->quantity}}</td>
                            </tr>
                                <?php $subtotal=$subtotal+($item->net_price*$item->quantity) ?>
                            @endforeach
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"></td>
                                <td class="thick-line text-right"></td>
                            </tr>
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"></td>
                                <td class="thick-line text-right"></td>
                            </tr>

                             <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                <td class="thick-line text-right" style="text-align: right">{{$subtotal}}</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Tax(15%)</strong></td>
                                <td class="no-line text-right" style="text-align: right">{{$subtotal*15/100}}</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>GRAND TOTAL</strong></td>
                                <td class="no-line text-right" style="text-align: right">{{$order->total_order_cost}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both"></div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div style="float: left">
        <img src="{{asset('fontAsset/')}}/img/banner/paid.png"  alt="Guiter World" height="100px" width="100px" />

    </div>
    <a href="{{url('/print-invoice')}}" target="_blank">Download</a>
</div>
