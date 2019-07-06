<?php

namespace App\Http\Controllers;

use App\BrandProduct;
use App\Product;
use App\Shipping;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function __construct(){
       $this->middleware('auth');
    }
    public function showCart(){
        $cartProducts=cart::instance('shopping')->content();


        return view('font.cart.cart-content',['cartProducts'=>$cartProducts]);
    }
    public function showCheckout(){

        $cartProducts=cart::instance('shopping')->content();
        if(session()->get('brand_product')){
            foreach ($cartProducts as $cartProduct) {

                $stockQty = DB::table('brand_products')
                    ->select('product_quantity','product_sell_number')
                    ->where('id', '=', $cartProduct->id)
                    ->first();
                if ($cartProduct->qty > $stockQty->product_quantity) {
                    return redirect('/cart-content')->with('messageDanger', 'Quantity is out of Stock!! Please check products available quantity');
                }
                if($cartProduct->qty < $stockQty->product_sell_number){
                    return redirect('/cart-content')->with('messageDanger', 'Quantity can not be less than minimum selling amount');
                }
            }
            $OldShippingAddress=DB::table('shippings')
                ->join('orders','orders.shipping_id','=','shippings.id')
                ->select('shippings.*')
                ->where('orders.customer_id','=',Auth::user()->id)
                ->latest()
                ->first();
        }else {
            foreach ($cartProducts as $cartProduct) {

                $stockQty = DB::table('products')
                    ->select('product_quantity')
                    ->where('id', '=', $cartProduct->id)
                    ->first();
                if ($cartProduct->qty > $stockQty->product_quantity) {
                    return redirect('/cart-content')->with('messageDanger', 'Quantity is out of Stock!! Please check products available quantity');
                }
            }
            $OldShippingAddress=DB::table('shippings')
                ->join('order_customers','order_customers.shipping_id','=','shippings.id')
                ->select('shippings.*')
                ->where('order_customers.customer_id','=',Auth::user()->id)
                ->latest()
                ->first();
        }


        return view('font.checkout.checkout-content',['cartProducts'=>$cartProducts,'OldShippingAddress'=>$OldShippingAddress]);
    }
    public function addToCart(Request $request){
        $brandItems=BrandProduct::find($request->product_id);
        if($brandItems->product_quantity<1){
            return redirect('/brand-product-details/'.$request->product_id)->with('message','Your selected product is out of stock');

        }else {
            if ($brandItems->product_quantity > $request->qty) {
                cart::instance('shopping')->add([
                    'id' => $request->product_id,
                    'name' => $brandItems->product_name,
                    'price' => $brandItems->product_price-($brandItems->product_price*$brandItems->product_discount/100),
                    'qty' => $request->quantity,
                    'options' => [
                        'ItemCode' => $brandItems->product_code,
                        'brandId' => $brandItems->brand_id,
                        'discount' => $brandItems->product_discount,
                        'ItemImage' => $brandItems->product_image,
                        'ItemStock' => $brandItems->product_quantity,
                        'ItemSellNumber' => $brandItems->product_sell_number,
                    ]
                ]);
                session(['brand_product' => 'value']);
            } else {
                return redirect('/brand-product-details/' . $request->product_id)->with('message', 'Your Quantity number exceed\'s our stock');
            }
        }
        return redirect('/cart-content');

    }
    public function updateCartById(Request $request){
        $product=BrandProduct::find($request->id);



        $quantity=$product->product_quantity;
        if($quantity<1){

            return redirect('/cart-content')->with('messageDanger', 'Your Expected Quantity is Out Of Stock');
        }else {
            if($product->product_sell_number > $request->qty) {
                return redirect('/cart-content')->with('messageDanger', 'Your purchase cannot be less than minimum selling quantity');

            }elseif($product->product_quantity>$request->qty){
                Cart::instance('shopping')->update($request->rowId, $request->qty);
                return redirect('/cart-content')->with('message', 'Cart product info update successfully');

                  }else{
                return redirect('/cart-content')->with('messageDanger', 'Your Product quantity is not available Right Now');
            }


        }
    }
    public function removeFromCart($id){

        Cart::instance('shopping')->remove($id);

        return redirect('/cart-content');
    }
    public function showPaymentForm(){
        $money=Cart::instance('shopping')->total();
        $money=$number = floatval(str_replace(',', '', str_replace('.', '.', $money)));
        $netIncome=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->join('users','order_details_of_customers.brand_id','=','users.id')
            ->where('products.customer_id','=',Auth::user()->id)
            ->sum('order_details_of_customers.total_amount');
        $dealerWithdrawMoney=DB::table('dealer_withdraws')
            ->where('customer_id','=',Auth::user()->id)
            ->sum('amount_of_withdraw');

        if ($money==0){
            return view('error.error-page');
        }

        return view('font.payment.payment-form',['money'=>$money,'netIncome'=>$netIncome,'dealerWithdrawMoney'=>$dealerWithdrawMoney]);

    }


    public function newShippingInfo(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'town' => 'required',
            'postCode' => 'required',
            'phone' => 'required|min:11|max:11',
        ]);

               $shippingDetails=new Shipping();
               $shippingDetails->name=$request->name;
               $shippingDetails->address1=$request->address1;
               $shippingDetails->address2=$request->address2;
               $shippingDetails->town=$request->town;
               $shippingDetails->state=$request->state;
               $shippingDetails->postCode=$request->postCode;
               $shippingDetails->phone=$request->phone;
               $shippingDetails->save();

               $shippingId = $shippingDetails->id;
               Session::put('shippingId', $shippingId);

               return redirect('/payment-form');

    }

    public function addToCartOfCustomers(Request $request){

        $Items=Product::find($request->id);

            if ($Items->product_quantity >= $request->qty) {
                cart::instance('shopping')->add([
                    'id' => $request->id,
                    'name' => $Items->product_name,
                    'price' => $Items->product_price-($Items->product_price*$Items->product_discount/100),
                    'qty' => $request->qty,
                    'options' => [
                        'ItemCode' => $Items->product_code,
                        'brandId' => $Items->brand_id,
                        'discount' => $Items->product_discount,
                        'ItemImage' => $Items->product_image,

                    ]
                ]);
                Session::put('customer_product','true');
                return Cart::instance('shopping')->count();

            } else {
                return Cart::instance('shopping')->count();
//                return redirect('/brand-product-details/' . $request->id)->with('message', 'Your Quantity number exceed\'s our stock');
            }


    }
    public function removeToCartOfCustomers(Request $request){
        $cartProducts=Cart::instance('shopping')->content();

       foreach($cartProducts as $cartProduct) {
           if($cartProduct->id==$request->id){
               Cart::instance('shopping')->remove($cartProduct->rowId);
           }

        }

        return Cart::instance('shopping')->count();

    }
    public function updateCartByIdCustomers(Request $request){


        $product=Product::find($request->id);

        $quantity=$product->product_quantity;
        if($quantity<1){

            return redirect('/cart-content')->with('messageDanger', 'Your Expected Quantity is Out Of Stock');
        }else {
            if($product->product_quantity>=$request->qty) {
                Cart::instance('shopping')->update($request->rowId, $request->qty);
                return redirect('/cart-content')->with('message', 'Cart product info update successfully');
            }else{
                return redirect('/cart-content')->with('messageDanger', 'Your Product quantity is not available Right Now');
            }
        }
    }



}
