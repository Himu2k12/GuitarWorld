<?php

namespace App\Http\Controllers;

use App\BrandProduct;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;

class ComparisonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function ShowComparison(){
        $compareProducts=Cart::instance('compare')->content();


        return view('font.compare.compare-products',['compareProducts'=>$compareProducts]);
    }
    public function addToCompare($id){
        $brandItems= DB::table('brand_products')
            ->join('categories','categories.id','=','brand_products.category_id')
            ->join('users','users.id','=','brand_products.brand_id')
            ->select('brand_products.*','users.name','categories.category_name')
            ->where('brand_products.id','=',$id)
            ->first();

        Cart::instance('compare')->add([
            'id' => $brandItems->id,
            'name' => $brandItems->product_name,
            'price' => $brandItems->product_price,
            'qty' =>1,
            'options' => [
                'ItemCode' => $brandItems->product_code,
                'ItemImage' => $brandItems->product_image,
                'Items' =>  $brandItems->product_quantity,
                'ItemsDescription' =>$brandItems->long_description,
                'ItemsBrand' =>$brandItems->name,
                'ItemsCategory' =>$brandItems->category_name,
            ]
        ]);


        return redirect('/compare-view');
    }
    public function removeCompare($id){


        Cart::instance('compare')->remove($id);

        return redirect('/compare-view');
    }
    public function addToCompareCustomer($id){
        $Items= DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->join('brands','brands.id','=','products.brand_id')
            ->join('users','users.id','=','products.customer_id')
            ->select('products.*','users.name','categories.category_name','brands.brand_name')
            ->where('products.id','=',$id)
            ->first();

        Cart::instance('compare')->add([
            'id' => $Items->id,
            'name' => $Items->product_name,
            'price' => $Items->product_price,
            'qty' =>1,
            'options' => [
                'ItemCode' => $Items->product_code,
                'ItemImage' => $Items->product_image,
                'Items' =>  $Items->product_quantity,
                'ItemsDescription' =>$Items->long_description,
                'ItemsBrand' =>$Items->brand_name,
                'ItemsCategory' =>$Items->category_name,
            ]
        ]);


        return redirect('/compare-view');
    }

}
