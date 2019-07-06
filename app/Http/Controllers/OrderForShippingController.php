<?php

namespace App\Http\Controllers;

use App\DealerWithdraw;
use App\Order;
use App\OrderCustomer;
use App\OrderDetailsOfCustomer;
use App\OrderDetailsOfDealer;
use App\OrderOfShipping;
use App\PaymentInfo;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderForShippingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function saveDealerOrderwithShipping(Request $request)
    {

        $this->validate($request, [
            'payment_amount' => 'required',
            'name_on_card' => 'required',
            'card_number' => 'required|digits:16|numeric',
            'month' => 'required',
            'year' => 'required',
            'cvv_number' => 'required|numeric|digits:4',
        ]);

        $payment=new PaymentInfo();
        $payment->payment_amount=$request->payment_amount;
        $payment->user_id=$request->user_id;
        $payment->name_on_card=$request->name_on_card;
        $payment->card_number=$request->card_number;
        $payment->month=$request->month;
        $payment->year=$request->year;
        $payment->cvv_number=$request->cvv_number;
        $payment->save();

        $paymentId=$payment->id;

        $totalOrder=Cart::instance('shopping')->total();
        $totalOrderCost = floatval(str_replace(',', '', str_replace('.', '.', $totalOrder)));


        If(Session::get('customer_product')=="true"){

                $order = new OrderCustomer();
                $order->customer_id = Auth::user()->id;
                if (Session::get('shippingId')!=null) {
                    $order->shipping_id = Session::get('shippingId');
                }
                $order->payment_id =$paymentId;
                $order->total_order_cost = $totalOrderCost;
                $order->status = 0;
                $order->save();
                $orderId = $order->id;
                Session::put('orderIdCustomer', $orderId);



            $cartProducts = Cart::instance('shopping')->content();
            foreach ($cartProducts as $cartProduct) {
                $orders = new OrderDetailsOfCustomer();
                $orders->order_id = $orderId;
                $orders->product_id = $cartProduct->id;
                $orders->brand_id = $cartProduct->options->brandId;
                $orders->net_price = $cartProduct->price;
                $orders->quantity = $cartProduct->qty;
                $orders->product_discount = $cartProduct->options->discount;
                $orders->total_amount = $cartProduct->price*$cartProduct->qty;
                $orders->post=0;
                $orders->save();
                DB::table('products')->where('id',$cartProduct->id)->decrement('product_quantity', $cartProduct->qty);
            }

            Cart::destroy();
            session()->forget('brand_product');
            return redirect('/confirm-order-brand');
        }else{

            $order = new Order();

            if (Session::get('shippingId') != "") {

                $order->customer_id = Auth::user()->id;
                $order->payment_id =$paymentId;
                $order->shipping_id = Session::get('shippingId');
                $order->total_order_cost =$totalOrderCost;
                $order->status = 0;
                $order->save();
                $orderId = $order->id;
                Session::put('orderIdDealer', $orderId);

            } else {
                $order->customer_id = Auth::user()->id;
                $order->payment_id =$paymentId;
                $order->total_order_cost =$totalOrderCost;
                $order->status = 0;
                $order->save();
                $orderId = $order->id;
                Session::put('orderIdDealer', $orderId);

            }

            $cartProducts = Cart::instance('shopping')->content();
            foreach ($cartProducts as $cartProduct) {
                $orders = new OrderDetailsOfDealer();
                $orders->order_id = $orderId;
                $orders->product_id = $cartProduct->id;
                $orders->brand_id = $cartProduct->options->brandId;
                $orders->net_price = $cartProduct->price;
                $orders->quantity = $cartProduct->qty;
                $orders->product_discount = $cartProduct->options->discount;
                $orders->total_amount = $cartProduct->price*$cartProduct->qty;
                $orders->post=0;
                $orders->save();
                DB::table('brand_products')->where('id',$cartProduct->id)->decrement('product_quantity', $cartProduct->qty);
            }

            Cart::destroy();
            session()->forget('brand_product');
            return redirect('/confirm-order-brand');
        }


    }
    public function saveOrderwithShippingAccountPayment(Request $request){

        $payment=new PaymentInfo();
        $payment->payment_amount=$request->payment_amount;
        $payment->user_id=$request->user_id;
        $payment->name_on_card=$request->name_on_card;
        $payment->card_number="1248923423492123";
        $payment->month=$request->month;
        $payment->year=$request->year;
        $payment->cvv_number=1234;
        $payment->save();

        $paymentId=$payment->id;

        If(Session::get('customer_product')=="true"){
                $order = new OrderCustomer();
                $order->customer_id = Auth::user()->id;
                if (Session::get('shippingId')!=null) {
                    $order->shipping_id = Session::get('shippingId');
                }
                $order->payment_id =$paymentId;
                $order->total_order_cost = Cart::instance('shopping')->total();
                $order->status = 0;
                $order->save();
                $orderId = $order->id;
                Session::put('orderIdCustomer', $orderId);



            $cartProducts = Cart::instance('shopping')->content();
            foreach ($cartProducts as $cartProduct) {
                $orders = new OrderDetailsOfCustomer();
                $orders->order_id = $orderId;
                $orders->product_id = $cartProduct->id;
                $orders->brand_id = $cartProduct->options->brandId;
                $orders->net_price = $cartProduct->price;
                $orders->quantity = $cartProduct->qty;
                $orders->product_discount = $cartProduct->options->discount;
                $orders->total_amount = $cartProduct->price*$cartProduct->qty;
                $orders->post=0;
                $orders->save();
                DB::table('products')->where('id',$cartProduct->id)->decrement('product_quantity', $cartProduct->qty);
            }

        }else{
            $order = new Order();

            if (Session::get('shippingId') != "") {
                $order->customer_id = Auth::user()->id;
                $order->payment_id =$paymentId;
                $order->shipping_id = Session::get('shippingId');
                $order->total_order_cost = Cart::instance('shopping')->total();
                $order->status = 0;
                $order->save();
                $orderId = $order->id;
                Session::put('orderIdDealer', $orderId);

            } else {
                $order->customer_id = Auth::user()->id;
                $order->payment_id =$paymentId;
                $order->total_order_cost = Cart::instance('shopping')->total();
                $order->status = 0;
                $order->save();
                $orderId = $order->id;
                Session::put('orderIdDealer', $orderId);

            }




            $cartProducts = Cart::instance('shopping')->content();
            foreach ($cartProducts as $cartProduct) {
                $orders = new OrderDetailsOfDealer();
                $orders->order_id = $orderId;
                $orders->product_id = $cartProduct->id;
                $orders->brand_id = $cartProduct->options->brandId;
                $orders->net_price = $cartProduct->price;
                $orders->quantity = $cartProduct->qty;
                $orders->product_discount = $cartProduct->options->discount;
                $orders->total_amount = $cartProduct->price*$cartProduct->qty;
                $orders->post=0;
                $orders->save();
                DB::table('brand_products')->where('id',$cartProduct->id)->decrement('product_quantity', $cartProduct->qty);
            }
        }
        $withDraw=new DealerWithdraw();
        $withDraw->customer_id=Auth::user()->id;
        $withDraw->bank_name="Guitar World";
        $withDraw->account_name="Guitar World";
        $withDraw->account_number="1248923423492123";
        $withDraw->amount_of_withdraw=$request->payment_amount;
        $withDraw->commission=$request->commission;
        $withDraw->Purchase=1;
        $withDraw->save();

        Cart::destroy();
        session()->forget('brand_product');
        return redirect('/confirm-order-brand');
    }
}
