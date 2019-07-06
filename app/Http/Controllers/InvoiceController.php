<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderCustomer;
use App\OrderDetailsOfDealer;
use App\PaymentInfo;
use App\Shipping;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Session;
use PDF;
Use View;


class InvoiceController extends Controller
{
    public function confirmOrderMessage(){
        return view('font.payment.confirmation');
    }
     public function PrintInvoice(){

        if (Session::get('orderIdDealer')!==""){
            $orderId=Session::get('orderIdDealer');
            $order=Order::find($orderId);
            $paymentInfo=DB::table('orders')
                ->join('payment_infos','orders.payment_id','payment_infos.id')
                ->select('payment_infos.*')
                ->where('orders.id','=',$orderId)
                ->first();
            $orderProducts=DB::table('order_details_of_dealers')
                ->join('brand_products','brand_products.id','=','order_details_of_dealers.product_id')
                ->select('brand_products.product_name','order_details_of_dealers.*')
                ->where('order_details_of_dealers.order_id','=',$orderId)
                ->get();
            $shipping=Shipping::find($order->shipping_id);
            $data = array_merge(['order' => $order, 'orderProducts' => $orderProducts,'shipping'=>$shipping,'paymentInfo'=>$paymentInfo]);

            $invoice_render = View::make('Invoice.invoice-content', $data)->render();


            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($invoice_render);
            return $pdf->stream();

        }elseif(Session::get('orderIdCustomer')=="true"){
            $orderId=session()->get('orderIdCustomer');
            $order=OrderCustomer::find($orderId);
            $paymentInfo=DB::table('order_customers')
                ->join('payment_infos','order_customers.payment_id','payment_infos.id')
                ->select('payment_infos.*')
                ->where('order_customers.id','=',$orderId)
                ->first();

            $orderProducts=DB::table('order_details_of_customers')
                ->join('products','products.id','=','order_details_of_customers.product_id')
                ->select('products.product_name','order_details_of_customers.*')
                ->where('order_details_of_customers.order_id','=',$orderId)
                ->get();

            $shipping=Shipping::find($order->shipping_id);
            $data = array_merge(['order' => $order, 'orderProducts' => $orderProducts,'shipping'=>$shipping,'paymentInfo'=>$paymentInfo]);

            $invoice_render = View::make('Invoice.invoice-content', $data)->render();


            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($invoice_render);
            return $pdf->stream();

        }

    }
}
