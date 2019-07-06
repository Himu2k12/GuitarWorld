<?php

namespace App\Http\Controllers;

use App\OrderDetailsOfDealer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class DealerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function dealerAddProduct($Pid,$Oid){

        $Product=DB::table('order_details_of_dealers')
            ->join('brand_products','brand_products.id','=','order_details_of_dealers.product_id')
            ->select('order_details_of_dealers.*','brand_products.product_name','brand_products.category_id','brand_products.product_code','brand_products.short_description','brand_products.long_description','brand_products.product_image')
            ->where([['order_details_of_dealers.product_id','=',$Pid],['order_details_of_dealers.order_id','=',$Oid]])
            ->first();
        return view('font.customerProfile.Dealer-add-product',['Product'=>$Product]);
    }
    public function DealerSaveProduct(Request $request){

        $product_image = $request->file('product_image');
        $this->validate($request, [
            'product_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'product_code' => 'required|max:30',
            'product_price' => 'required|numeric|digits_between:1,10',
            'product_discount' => 'required|numeric|max:99',
            'product_quantity' => 'required|numeric|min:1|max:100',
            'short_description' => 'required|max:100',
            'long_description' => 'required|MAX:250',

        ]);
        if($product_image) {

            $productImage = $request->file('product_image');
            $imageName = $productImage->getClientOriginalName();
            $directory = 'product-images/';
            $imgUrl = $directory.$imageName;
            Image::make($productImage)->resize(200, 200)->save($imgUrl);

            $product=new Product();
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->customer_id = $request->customer_id;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->product_price = $request->product_price;
            $product->product_quantity = $request->product_quantity;
            $product->product_discount = $request->product_discount;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->product_condition = 'new';
            $product->product_image = $imgUrl;
            $product->status = 1;
            $product->save();


            $changePostValue=OrderDetailsOfDealer::find($request->id);
            $changePostValue->post=1;
            $changePostValue->save();

            return redirect('/customer-profile')->with('addMsg','');

        } else {

            $product=new Product();
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->customer_id = $request->customer_id;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->product_price = $request->product_price;
            $product->product_quantity = $request->product_quantity;
            $product->product_discount = $request->product_discount;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->product_condition = 'new';
            $product->product_image = $request->old_image;
            $product->status = 1;
            $product->save();


            $changePostValue=OrderDetailsOfDealer::find($request->id);
            $changePostValue->post = "1";
            $changePostValue->save();
//            DB::table('order_details_of_dealers')
//                ->where('id','=',1)
//                ->update(['post','=',1]);

            return redirect('/customer-profile#products');
        }
    }

}
