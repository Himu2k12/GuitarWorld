<?php

namespace App\Http\Controllers;

use App\Brand;
use App\BuyAndSellItem;
use App\Categories;
use App\PickUpAddress;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Monolog\Processor\ProcessIdProcessor;
use Image;
use Cart;

class BuyAndSellController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }
    public function showItems(){
        $UsedProducts=DB::table('products')
            ->join('users','users.id','=','products.customer_id')
            ->select('products.*','users.name')
            ->where([['users.role','=',"customer"],['products.status','=',1]])
            ->orderBy('id','desc')
            ->get();
        $categories=DB::table('categories')
            ->join('products','products.category_id','=','categories.id')
            ->join('users','users.id','=','products.customer_id')
            ->select(DB::raw('count(products.id) as pro, categories.category_name'))
            ->where('users.role','=',"customer")
            ->groupBy('categories.id','categories.category_name')
            ->get();
        $compareProducts=Cart::instance('compare')->content();
        $wishlistProducts=Cart::instance('wishlist')->content();




        return view('font.BuyAndSell.viewItems',['UsedProducts'=>$UsedProducts,
            'categories'=>$categories,
            'compareProducts'=>$compareProducts,
            'wishlistProducts'=>$wishlistProducts,

        ]);
    }
    public function ShowDetailsItem($id){

        $CustomerProduct=DB::table('products')
            ->join('users','users.id','=','products.customer_id')
            ->join('categories','categories.id','=','products.category_id')
            ->join('pick_up_addresses','products.id','=','pick_up_addresses.product_id')
            ->select('products.*','pick_up_addresses.*','users.name','users.id as uid','categories.category_name')
            ->where([['products.id','=',$id],['products.status','=','1']])
            ->first();

        if (isset($CustomerProduct->uid) && $CustomerProduct->uid!=Auth::user()->id){
            $updateView=Product::find($id);
            $updateView->view=$updateView->view+1;
            $updateView->save();
        }

        return view('font.BuyAndSell.ItemDetails',['CustomerProduct'=>$CustomerProduct]);
    }
    public function ShowAddItemForm(){
        $categories=Categories::all();
        $brands=Brand::all();

        return view('font.BuyAndSell.addItemForm',['categories'=>$categories,
                                                        'brands'=>$brands,
            ]);
    }
    public function ShowPickup(){
        return view('font.BuyAndSell.pickUpAddress');
    }
    public function SavePickup(Request $request){

        $productID=Session('ProductpickUp');

        $productID=$productID[0];


        $this->validate($request, [
            'pname' => 'required',
            'paddress1' => 'required',
            'paddress2' => 'required',
            'ptown' => 'required',
            'pstate' => 'required',
            'ppostcode' => 'required',
            'pphone' => 'required',
        ]);

        $BSpickup=new PickUpAddress();
        $BSpickup->product_id=$productID;
        $BSpickup->pname=$request->pname;
        $BSpickup->paddress1=$request->paddress1;
        $BSpickup->paddress2=$request->paddress2;
        $BSpickup->ptown=$request->ptown;
        $BSpickup->pstate=$request->pstate;
        $BSpickup->ppostcode=$request->ppostcode;
        $BSpickup->pphone=$request->pphone;
        $BSpickup->save();

        $product=Product::find($productID);
        $product->status=1;
        $product->save();

        session()->forget('ProductpickUp');
       return redirect('/add-Items-To-Buy-And-Sell')->with('SuccessMessage', 'Product info Published successfully');
    }
    public function newItems(Request $request){
        $request->flush();
        $this->validate($request, [
            'category_name' => 'numeric',
            'brand_name' => 'numeric',
            'customer_id' => 'required|numeric',
            'product_condition' => 'required',
            'product_name' => 'required|max:50',
            'product_code' => 'required|max:30',
            'product_price' => 'required|digits_between:1,10',
            'product_quantity' => 'required|numeric|min:1|max:5',
            'short_description' => 'required|max:200',
            'long_description' => 'required|max:300',
            'product_discount' => 'required|max:99',
            'user_period' => 'required_if:product_condition,"used"',

        ]);
        $productImage = $request->file('product_image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'product-images/';
        $imgUrl = $directory.$imageName;
        Image::make($productImage)->resize(200, 200)->save($imgUrl);


        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->customer_id = $request->customer_id;
        $product->product_condition = $request->product_condition;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_discount = $request->product_discount;
        $product->user_period = $request->user_period;
        $product->customer_id =Auth::user()->id;
        $product->product_image = $imgUrl;
        $product->status = 0;
        $product->save();

        session()->push('ProductpickUp',$product->id);

        return redirect('/pickupBuyAndSell');
    }
    public function manageOwnItems(){

        $ManageCustomerProducts=DB::table('products')
            ->join('users','users.id','=','products.customer_id')
            ->join('categories','categories.id','=','products.category_id')
            ->select('products.*','users.name','categories.category_name')
            ->where('users.id','=',Auth::user()->id)
            ->get();
        return view('font.BuyAndSell.ManageProducts',['ManageCustomerProducts'=>$ManageCustomerProducts]);
    }
    public function editItemForm($id){
        $customerProduct=Product::find($id);
        $categories=Categories::all();
        $brands=Brand::all();

        return view('font.BuyAndSell.EditIteam',['customerProduct'=>$customerProduct,'categories'=>$categories,'brands'=>$brands]);
    }
    public function updateProduct(Request $request){
        $productImage = $request->file('product_image');
        $this->validate($request, [
            'category_name' => 'numeric',
            'brand_name' => 'numeric',
            'customer_id' => 'required|numeric',
            'product_condition' => 'required',
            'product_name' => 'required|max:50',
            'product_code' => 'required|max:30',
            'product_price' => 'required|digits_between:1,10',
            'product_quantity' => 'required|numeric|min:1|max:5',
            'short_description' => 'required|max:200',
            'long_description' => 'required|max:300',
            'product_discount' => 'required|min:0|max:99',
            'user_period' => 'required_if:product_condition,"used"',

        ]);

        if($productImage) {

            $imageName = $productImage->getClientOriginalName();
            $directory = 'product-images/';
            $imgUrl = $directory . $imageName;
            Image::make($productImage)->save($imgUrl);


            $product = Product::find($request->product_id);
            $product->category_id = $request->category_name;
            $product->brand_id = $request->brand_name;
            $product->customer_id = $request->customer_id;
            $product->product_name = $request->product_name;
            $product->product_condition = $request->product_condition;
            $product->user_period = $request->user_period;
            $product->product_code = $request->product_code;
            $product->product_price = $request->product_price;
            $product->product_discount = $request->product_discount;
            $product->product_quantity = $request->product_quantity;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->product_image = $imgUrl;
            $product->status = 1;
            $product->save();
            return redirect('/manage-own-Items-To-Buy-And-Sell')->with('Succmessage','Product info successfully updated');
        }else{
            $product = Product::find($request->product_id);
            $product->category_id = $request->category_name;
            $product->brand_id = $request->brand_name;
            $product->customer_id = $request->customer_id;
            $product->product_name = $request->product_name;
            $product->product_condition = $request->product_condition;
            $product->user_period = $request->user_period;
            $product->product_code = $request->product_code;
            $product->product_price = $request->product_price;
            $product->product_discount = $request->product_discount;
            $product->product_quantity = $request->product_quantity;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->status = 1;
            $product->save();
            return redirect('/manage-own-Items-To-Buy-And-Sell')->with('Succmessage','Product info successfully updated without Image');
        }
    }
    public function disabledProductInfo($id) {
        $productById = Product::find($id);
        $productById->status = 0;
        $productById->save();
        return redirect('/manage-own-Items-To-Buy-And-Sell')->with('message', 'Product info unpublished successfully');
    }
    public function activeProductInfo($id) {
        $productById = Product::find($id);
        $productById->status = 1;
        $productById->save();
        return redirect('/manage-own-Items-To-Buy-And-Sell')->with('Succmsg', 'Product info published successfully');
    }
    public function range(Request $request){
        dd($request->amount);
    }
}
