<?php

namespace App\Http\Controllers;

use App\BrandProduct;
use App\Product;
use Illuminate\Http\Request;
use Cart;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function showWishlist(){
        $wishlistProducts= Cart::instance('wishlist')->content();

        return view('font.wishlist.wishlist-content',['wishlistProducts'=>$wishlistProducts ]);
    }
    public function addToWishlist($id){
        $brandItems=BrandProduct::find($id);
        Cart::instance('wishlist')->add([
            'id' => $brandItems->id,
            'name' => $brandItems->product_name,
            'price' => $brandItems->product_price,
            'qty' =>1,
            'options' => [
                'ItemCode' => $brandItems->product_code,
                'ItemImage' => $brandItems->product_image,
                'Items' =>  $brandItems->product_quantity,
                'ItemsMinSell' =>  $brandItems->product_sell_number,
            ]
        ]);

        return redirect('/wishlist');
    }
    public function removeFromWishlist($id){
        Cart::instance('wishlist')->remove($id);

        return redirect('/wishlist');
    }
    public function destroyWishlist(){
        Cart::instance('wishlist')->destroy();

        return redirect('/wishlist');
    }
    public function addToWishlistCustomer($id){
        $Items=Product::find($id);
        Cart::instance('wishlist')->add([
            'id' => $Items->id,
            'name' => $Items->product_name,
            'price' => $Items->product_price,
            'qty' =>1,
            'options' => [
                'ItemCode' => $Items->product_code,
                'ItemImage' => $Items->product_image,
                'Items' =>  $Items->product_quantity,
            ]
        ]);

        return redirect('/wishlist');
    }

}
