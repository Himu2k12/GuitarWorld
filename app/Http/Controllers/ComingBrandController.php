<?php

namespace App\Http\Controllers;

use App\BrandDetail;
use App\BrandProduct;
use App\Categories;
use App\OrderOfShipping;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use Gate;

class ComingBrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function NewBrandView(){
        if(Gate::allows('isCustomer')){
            abort('404','you cannot access here');
        }

        $categories = Categories::all();
        $popularCategories =DB::table('categories')
                ->select('*')
                ->limit(4)
                ->get();
        $NewProducts=DB::table('brand_products')
            ->join('categories','categories.id','=','brand_products.category_id')
            ->join('users','users.id','=','brand_products.brand_id')
            ->select('brand_products.*','categories.category_name')
            ->where('users.role','=',"brand")
            ->orderBy('brand_products.id','desc')
            ->get();
        $bestSellingProduct=DB::table('order_details_of_dealers')
            ->join('brand_products','brand_products.id','=','order_details_of_dealers.product_id')
            ->select('brand_products.*')
            ->groupBy('order_details_of_dealers.product_id','brand_products.id','brand_products.category_id','brand_products.brand_id','brand_products.product_name','brand_products.product_sell_number','brand_products.product_code','brand_products.product_price','brand_products.product_quantity','brand_products.product_discount','brand_products.short_description','brand_products.long_description','brand_products.product_image','brand_products.status','brand_products.view','brand_products.created_at','brand_products.updated_at')
            ->limit(5)
            ->get();

        $OnSaleProducts=DB::table('brand_products')
            ->join('categories','categories.id','=','brand_products.category_id')
            ->join('users','users.id','=','brand_products.brand_id')
            ->select('brand_products.*','categories.category_name')
            ->where([['users.role','=',"brand"],['brand_products.product_discount','>',0]])
            ->orderBy('brand_products.id','desc')
            ->get();
        $featuredProducts=DB::table('brand_products')
            ->join('categories','categories.id','=','brand_products.category_id')
            ->join('users','users.id','=','brand_products.brand_id')
            ->select('brand_products.*','categories.category_name')
            ->where('categories.category_name','=','picks')
            ->orderBy('brand_products.id','desc')
            ->get();

        $RandomProducts=DB::table('brand_products')
            ->join('categories','categories.id','=','brand_products.category_id')
            ->join('users','users.id','=','brand_products.brand_id')
            ->select('brand_products.*','categories.category_name')
            ->where('users.role','=',"brand")
            ->inRandomOrder()
            ->get();
        $MostViewProducts=DB::table('brand_products')
            ->join('categories','categories.id','=','brand_products.category_id')
            ->join('users','users.id','=','brand_products.brand_id')
            ->select('brand_products.*','categories.category_name')
            ->orderBy('brand_products.view','desc')
            ->offset(0)
            ->limit(4)
            ->get();
        $MostViewProductsTwo=DB::table('brand_products')
            ->join('categories','categories.id','=','brand_products.category_id')
            ->join('users','users.id','=','brand_products.brand_id')
            ->select('brand_products.*','categories.category_name')
            ->orderBy('brand_products.view','desc')
            ->offset(4)
            ->limit(4)
            ->get();

            $Products=new Categories();

        return view('font.comingBrand.brand-home',['categories'=>$categories,
                                                        'Products'=>$Products,
                                                        'popularCategories'=>$popularCategories,
                                                        'RandomProducts'=>$RandomProducts,
                                                        'NewProducts'=>$NewProducts,
                                                        'OnSaleProducts'=>$OnSaleProducts,
                                                        'featuredProducts'=>$featuredProducts,
                                                        'bestSellingProduct'=>$bestSellingProduct,
                                                        'MostViewProducts'=>$MostViewProducts,
                                                        'MostViewProductsTwo'=>$MostViewProductsTwo,

        ] );

    }
    public function addProduct(){
        if(!Gate::allows('isBrand')){
            abort('404','you cannot access here');
        }
        $categories=Categories::all();

        return view('font.comingBrand.brand-add-product',['categories'=>$categories]);
    }
    public function manageProduct(){
        if(!Gate::allows('isBrand')){
            abort('404','you cannot access here');
        }
        $products = DB::table('brand_products')
            ->join('users','brand_products.brand_id','=','users.id')
            ->join('categories', 'brand_products.category_id', '=', 'categories.id')
            ->select('brand_products.*', 'categories.category_name')
            ->where('users.id','=',Auth::user()->id)
            ->orderBy('updated_at','desc')
            ->get();

        return view('font.comingBrand.brand-manage-product',['products'=>$products]);
    }
    public function saveProduct(Request $request){
        if(!Gate::allows('isBrand')){
            abort('404','you cannot access here');
        }
        $request->flush();
        $productImage = $request->file('product_image');
        $this->validate($request, [
            'product_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'product_code' => 'required|max:30',
            'product_price' => 'required|numeric|digits_between:1,10',
            'product_discount' => 'required|numeric|max:99',
            'product_quantity' => 'required|numeric|min:1|max:100',
            'product_sell_number' => 'required|numeric|min:5',
            'short_description' => 'required|max:100',
            'long_description' => 'required|MAX:250',
            'product_image' => 'required',
            'status' => 'required',
        ]);

        $imageName = $productImage->getClientOriginalName();
        $directory = 'product-images/';
        $imgUrl = $directory.$imageName;
        Image::make($productImage)->save($imgUrl);


        $product = new BrandProduct();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_price = $request->product_price;
        $product->product_discount = $request->product_discount;
        $product->product_quantity = $request->product_quantity;
        $product->product_sell_number = $request->product_sell_number;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imgUrl;
        $product->status = $request->status;
        $product->save();
        return redirect('brand-manage-product')->with('product info successfully saved');
    }
    public function updateProduct(Request $request){
        if(!Gate::allows('isBrand')){
            abort('404','you cannot access here');
        }
      $productImage = $request->file('product_image');
        $this->validate($request, [
            'product_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'product_code' => 'required|max:30',
            'product_price' => 'required|numeric|digits_between:1,10',
            'product_discount' => 'required|numeric|min:0|max:99',
            'product_quantity' => 'required|numeric|min:1|max:100',
            'product_sell_number' => 'required|min:1|numeric',
            'short_description' => 'required|max:100',
            'long_description' => 'required|MAX:250',
            'status' => 'required',
        ]);
        if($request->product_sell_number>$request->product_quantity){
            return redirect('brand-edit-product/'.$request->brand_product_id)->with('DGmessage','Minimum sell quantity cannot be more than the actual quantity');
        }

      if($productImage) {

            $imageName = $productImage->getClientOriginalName();
            $directory = 'product-images/';
            $imgUrl = $directory . $imageName;
            Image::make($productImage)->save($imgUrl);


            $product = BrandProduct::find($request->brand_product_id);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->product_price = $request->product_price;
            $product->product_discount = $request->product_discount;
            $product->product_quantity = $request->product_quantity;
            $product->product_sell_number = $request->product_sell_number;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->product_image = $imgUrl;
            $product->status = $request->status;
            $product->save();
            return redirect('brand-manage-product')->with('Succmessage','Product info successfully updated');
        }else{
            $product = BrandProduct::find($request->brand_product_id);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->product_price = $request->product_price;
            $product->product_discount = $request->product_discount;
            $product->product_quantity = $request->product_quantity;
            $product->product_sell_number = $request->product_sell_number;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->status = $request->status;
            $product->save();
            return redirect('brand-manage-product')->with('Succmessage','Product info successfully updated without Image');
        }
    }
    public function disabledProductInfo($id) {
        $productById = BrandProduct::find($id);
        $productById->status = 0;
        $productById->save();
        return redirect('brand-manage-product')->with('message', 'Product info unpublished successfully');
    }
    public function activeProductInfo($id) {
        $productById = BrandProduct::find($id);
        $productById->status = 1;
        $productById->save();
        return redirect('brand-manage-product')->with('Succmessage', 'Product info published successfully');
    }
    public function showProfile(){
        if(!Gate::allows('isBrand')){
            abort('404','you cannot access here');
        }

        $userInfo=Auth::user();
        $detailsOfBrand=DB::table('brand_details')
            ->select('*')
            ->where('user_id','=',Auth::user()->id)
            ->first();


        return view('font.comingBrand.brand-profile',['userInfo'=>$userInfo,'detailsOfBrand'=>$detailsOfBrand]);
    }
    public function saveBrandDetails(Request $request){
        if(!Gate::allows('isBrand')){
            abort('404','you cannot access here');
        }

        $brandImage=$request->file('brand_image');
        $directory='profile-pictures/';
        $imageName=$brandImage->getClientOriginalName();
        $imageUrl=$directory.$imageName;
        Image::make($brandImage)->save($imageUrl);


        $brandDetails= new BrandDetail();
        $brandDetails->user_id=$request->user_id;
        $brandDetails->country=$request->country;
        $brandDetails->brand_image=$imageUrl;
        $brandDetails->position=$request->position;
        $brandDetails->mobile=$request->mobile;
        $brandDetails->work_address=$request->work_address;
        $brandDetails->brand_description=$request->brand_description;
        $brandDetails->save();
        return redirect('/brand-profile');

    }
    public function UpdateBrandDetails(Request $request){
        if(!Gate::allows('isBrand')){
            abort('404','you cannot access here');
        }

        $brandImage=$request->file('brand_image');

        if($brandImage) {

            $brandDetails=BrandDetail::find($request->updateId);
            unlink($brandDetails->brand_image);

            $directory = 'brand-images/';
            $imageName = $brandImage->getClientOriginalName();
            $imageUrl = $directory . $imageName;
            Image::make($brandImage)->save($imageUrl);

            $brandDetails->country = $request->country;
            $brandDetails->brand_image = $imageUrl;
            $brandDetails->position = $request->position;
            $brandDetails->mobile = $request->mobile;
            $brandDetails->work_address = $request->work_address;
            $brandDetails->brand_description = $request->brand_description;
            $brandDetails->save();
            return redirect('/brand-profile');
        }else{
            $brandDetails=BrandDetail::find($request->updateId);
            $brandDetails->country = $request->country;
            $brandDetails->position = $request->position;
            $brandDetails->mobile = $request->mobile;
            $brandDetails->work_address = $request->work_address;
            $brandDetails->brand_description = $request->brand_description;
            $brandDetails->save();
            return redirect('/brand-profile');
        }

    }
    public function detailsProduct($id){
        if(Gate::allows('isBrand' && 'isDealer')){
            abort('404','you cannot access here');
        }
        $productDetails=BrandProduct::find($id);
        $brandName=User::find($productDetails->brand_id);
        $CategoryName=Categories::find($productDetails->category_id);
        if ($productDetails->brand_id!=Auth::user()->id){
            $updateView=BrandProduct::find($id);
            $updateView->view=$updateView->view+1;
            $updateView->save();
        }
        $relatedProducts=new BrandProduct();

        return view('font.comingBrand.brand-product-details',['productDetails'=>$productDetails,
                                                                    'brandName'=>$brandName,
                                                                    'CategoryName'=>$CategoryName,
                                                                    'relatedProducts'=>$relatedProducts,

        ]);
    }
    public function SellHistory(){
        if(!Gate::allows('isBrand')){
            abort('404','you cannot access here');
        }

        $sellOfBrands=DB::table('order_details_of_dealers')
            ->select('*')
            ->where('brand_id','=',Auth::user()->id)
            ->get();



        return view('font.comingBrand.brand-sell-history',['sellOfBrands'=>$sellOfBrands]);
    }
    public function brandStatistic(){
        if(!Gate::allows('isBrand')){
            abort('404','you cannot access here');
        }
        $Transections=DB::table('dealer_withdraws')
            ->select('*')
            ->where('customer_id','=',Auth::user()->id)
            ->orderBy('id','desc')
            ->get();

        $netIncome=DB::table('order_details_of_dealers')
            ->join('brand_products','brand_products.id','=','order_details_of_dealers.product_id')
            ->join('users','order_details_of_dealers.brand_id','=','users.id')
            ->where('brand_products.brand_id','=',Auth::user()->id)
            ->sum('order_details_of_dealers.total_amount');

        $dealerWithdrawMoney=DB::table('dealer_withdraws')
            ->where('customer_id','=',Auth::user()->id)
            ->sum('amount_of_withdraw');



        return view('font.comingBrand.brand-statistic-content',['netIncome'=>$netIncome,'dealerWithdrawMoney'=>$dealerWithdrawMoney,'Transections'=>$Transections]);
    }
    public function editProduct($id){
        $brandProduct=BrandProduct::find($id);
        $categories=Categories::all();

    return view('font.comingBrand.brand-edit-product',['brandProduct'=>$brandProduct,'categories'=>$categories]);
    }



}
