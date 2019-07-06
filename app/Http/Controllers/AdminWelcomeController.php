<?php

namespace App\Http\Controllers;


use App\BrandDetail;
use App\Order;
use App\OrderCustomer;
use App\OrderDetailsOfDealer;
use App\User;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\DB;

class AdminWelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function ShowDashboard(){
        if(!Gate::allows('isAdmin')){
            abort('404','you cannot access here');
        }
        $dealerOrder=DB::table('orders')
            ->count('id');
        $customerOrder=DB::table('order_customers')
            ->count('id');
        $service=DB::table('services')
            ->where('accept','=',1)
            ->count();
        $firstYearDealer=DB::table('orders')
            ->whereYear('created_at','2017')
            ->sum('total_order_cost');
        $secondYearDealer=DB::table('orders')
            ->whereYear('created_at','2018')
            ->sum('total_order_cost');
        $thirdYearDealer=DB::table('orders')
            ->whereYear('created_at','2019')
            ->sum('total_order_cost');
        $firstYearCustomer=DB::table('order_customers')
            ->whereYear('created_at','2017')
            ->sum('total_order_cost');
        $secondYearCustomer=DB::table('order_customers')
            ->whereYear('created_at','2018')
            ->sum('total_order_cost');
        $thirdYearCustomer=DB::table('order_customers')
            ->whereYear('created_at','2019')
            ->sum('total_order_cost');
        $firstYearService=DB::table('services')
            ->where('accept','=',1)
            ->whereYear('created_at','2017')
            ->sum('total_cost');
        $secondYearService=DB::table('services')
            ->where('accept','=',1)
            ->whereYear('created_at','2018')
            ->sum('total_cost');
        $thirdYearService=DB::table('services')
            ->where('accept','=',1)
            ->whereYear('created_at','2019')
            ->sum('total_cost');

        $ordersOfGWOne=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->where('products.customer_id','=',2)
            ->whereYear('order_details_of_customers.created_at','2017')
            ->distinct('order_details_of_customers.order_id')
            ->count('order_details_of_customers.order_id');

        $ordersOfGWTwo=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->where('products.customer_id','=',2)
            ->whereYear('order_details_of_customers.created_at','2018')
            ->distinct('order_details_of_customers.order_id')
            ->count('order_details_of_customers.order_id');

        $ordersOfGWThree=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->where('products.customer_id','=',2)
            ->whereYear('order_details_of_customers.created_at','2019')
            ->distinct('order_details_of_customers.order_id')
            ->count('order_details_of_customers.order_id');

        $ordersOtherOne=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->join('users','products.customer_id','=','users.id')
            ->where('users.role','=',"dealer")
            ->whereYear('order_details_of_customers.created_at','2017')
            ->distinct('order_details_of_customers.order_id')
            ->count('order_details_of_customers.order_id');

        $ordersOtherTwo=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->join('users','products.customer_id','=','users.id')
            ->where('users.role','=',"dealer")
            ->whereYear('order_details_of_customers.created_at','2018')
            ->distinct('order_details_of_customers.order_id')
            ->count('order_details_of_customers.order_id');

        $ordersOtherThree=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->join('users','products.customer_id','=','users.id')
            ->where('users.role','=',"dealer")
            ->whereYear('order_details_of_customers.created_at','2019')
            ->distinct('order_details_of_customers.order_id')
            ->count('order_details_of_customers.order_id');


        $EcommerceProductCount=DB::table('products')
            ->join('users','users.id','=','products.customer_id')
            ->select('products.*','users.name')
            ->where('users.role','=',"admin")
            ->orwhere('users.role','=',"dealer")
            ->count();
        $marketPlaceProductCount=DB::table('brand_products')
            ->count();
        $servicingProducts=DB::table('services')
            ->count();
        $artistsPosts=DB::table('posts')
            ->join('users','users.id','=','posts.customer_id')
            ->where('users.role','=',"artist")
            ->count();
        $userNumber=DB::table('users')
            ->where('role','=',"customer")
            ->count();
        $dealerNumber=DB::table('users')
            ->where('role','=',"dealer")
            ->count();

        $brandNumber=DB::table('users')
            ->where('role','=',"brand")
            ->count();
        $artistNumber=DB::table('users')
            ->where('role','=',"artist")
            ->count();

        return view('admin.dashboard.dashboard-content',['EcommerceProductCount'=>$EcommerceProductCount,
                                                                'marketPlaceProductCount'=>$marketPlaceProductCount,
                                                                'servicingProducts'=>$servicingProducts,
                                                                'artistsPosts'=>$artistsPosts,
                                                                'userNumber'=>$userNumber,
                                                                'dealerNumber'=>$dealerNumber,
                                                                'dealerOrder'=>$dealerOrder,
                                                                'brandNumber'=>$brandNumber,
                                                                'artistNumber'=>$artistNumber,
                                                                'customerOrder'=>$customerOrder,
                                                                'service'=>$service,
                                                                'firstYearDealer'=>$firstYearDealer,
                                                                'firstYearCustomer'=>$firstYearCustomer,
                                                                'firstYearService'=>$firstYearService,
                                                                'secondYearDealer'=>$secondYearDealer,
                                                                'secondYearCustomer'=>$secondYearCustomer,
                                                                'secondYearService'=>$secondYearService,
                                                                'thirdYearDealer'=>$thirdYearDealer,
                                                                'thirdYearCustomer'=>$thirdYearCustomer,
                                                                'thirdYearService'=>$thirdYearService,
                                                                'ordersOfGWOne'=>$ordersOfGWOne,
                                                                'ordersOtherOne'=>$ordersOtherOne,
                                                                'ordersOfGWTwo'=>$ordersOfGWTwo,
                                                                'ordersOtherTwo'=>$ordersOtherTwo,
                                                                'ordersOfGWThree'=>$ordersOfGWThree,
                                                                'ordersOtherThree'=>$ordersOtherThree,



            ]);
    }
    public function ShowCustomer(){
        if(!Gate::allows('isAdmin')){
            abort('404','you cannot access here');
        }
        $customers=DB::table('users')
            ->select('*')
            ->where('role','=','customer')
            ->get();
        return view('admin.users.customerView',['customers'=>$customers]);
    }
    public function ShowDealer(){
        if(!Gate::allows('isAdmin')){
            abort('404','you cannot access here');
        }
        $customers=DB::table('users')
            ->select('*')
            ->where('role','=','dealer')
            ->get();
        $dealerProductsOnSales=DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->join('users','users.id','=','products.customer_id')
            ->select('users.name','categories.category_name','products.*')
            ->where('users.role','=',"dealer")
            ->orderBy('products.id','desc')
            ->get();
        $sellHistory=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->join('users','users.id','=','products.customer_id')
            ->select('order_details_of_customers.*','products.product_name','products.product_image','users.name')
            ->where('users.role','=',"dealer")
            ->orderBy('order_details_of_customers.id','desc')
            ->get();
        $netIncome=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->join('users','users.id','=','products.customer_id')
            ->where('users.role','=',"dealer")
            ->sum('order_details_of_customers.total_amount');

        $ourIncome=DB::table('dealer_withdraws')
            ->join('users','users.id','=','dealer_withdraws.customer_id')
            ->where('users.role','=',"dealer")
            ->sum('commission');

        $OnlyWithdraw=DB::table('dealer_withdraws')
            ->join('users','users.id','=','dealer_withdraws.customer_id')
            ->where('users.role','=',"dealer")
            ->sum('amount_of_withdraw');


        return view('admin.users.dealerView',['customers'=>$customers,
                                                   'dealerProductsOnSales'=>$dealerProductsOnSales,
                                                   'sellHistory'=>$sellHistory,
                                                   'netIncome'=>$netIncome,
                                                   'ourIncome'=>$ourIncome,
                                                   'OnlyWithdraw'=>$OnlyWithdraw,




        ]);

    }
    public function ShowBrand(){
        if(!Gate::allows('isAdmin')){
            abort('404','you cannot access here');
        }
        $customers=DB::table('users')
            ->select('*')
            ->where('role','=','brand')
            ->orderBy('id','desc')
            ->get();
        $brandProducts=DB::table('brand_products')
            ->join('categories','categories.id','=','brand_products.category_id')
            ->join('users','users.id','=','brand_products.brand_id')
            ->select('users.name','categories.category_name','brand_products.*')
            ->orderBy('brand_products.id','desc')
            ->get();
        $sellHistory=DB::table('order_details_of_dealers')
            ->join('users','users.id','=','order_details_of_dealers.brand_id')
            ->join('brand_products','brand_products.id','=','order_details_of_dealers.product_id')
            ->select('order_details_of_dealers.*','brand_products.product_name','brand_products.product_image','users.name')
            ->where('users.role','=',"brand")
            ->orderBy('order_details_of_dealers.id','desc')
            ->get();
        $netIncome=DB::table('order_details_of_dealers')

            ->sum('order_details_of_dealers.total_amount');

        $ourIncome=DB::table('dealer_withdraws')
            ->join('users','users.id','=','dealer_withdraws.customer_id')
            ->where('users.role','=',"brand")
            ->sum('commission');

        $OnlyWithdraw=DB::table('dealer_withdraws')
            ->join('users','users.id','=','dealer_withdraws.customer_id')
            ->where('users.role','=',"brand")
            ->sum('amount_of_withdraw');

        $brandDetails=new BrandDetail();

        return view('admin.users.brandView',['customers'=>$customers,
                                                   'sellHistory'=>$sellHistory,
                                                   'netIncome'=>$netIncome,
                                                   'ourIncome'=>$ourIncome,
                                                   'OnlyWithdraw'=>$OnlyWithdraw,
                                                   'brandProducts'=>$brandProducts,
                                                   'brandDetails'=>$brandDetails,

        ]);
    }
    public function ShowArtist(){
        $customers=DB::table('users')
            ->select('*')
            ->where('role','=','artist')
            ->get();
        $posts = DB::table('posts')
            ->leftJoin('users', 'users.id', '=', 'posts.customer_id')
            ->leftJoin('user_profiles', 'user_profiles.customer_id', '=', 'posts.customer_id')
            ->leftJoin('artist_profiles', 'artist_profiles.artist_id', '=', 'posts.customer_id')
            ->select('posts.*', 'users.name','users.role','artist_profiles.artist_pp')
            ->where([['users.role','=','artist'],['posts.delete_post','=',0]])
            ->orderBy('posts.id', 'desc')
            ->get();

        return view('admin.users.artistView',['customers'=>$customers,'posts'=>$posts]);
    }
    public function disableBrandInfo($id) {
        $brandById = User::find($id);
        $brandById->access = 0;
        $brandById->save();
        return redirect('/admin-view-brand')->with('message', 'Brand access disabled successfully ');
    }
    public function activeBrandInfo($id) {
        $brandById = User::find($id);
        $brandById->access = 1;
        $brandById->save();
        return redirect('/admin-view-brand')->with('message', 'Brand access enabled successfully');
    }
    public function viewBrandDetails($id) {
        $BrandById = DB::table('brand_details')
            ->join('users','users.id','=','brand_details.user_id')
            ->select('brand_details.*','users.*')
            ->where('user_id','=',$id)
            ->first();
        return view('admin.users.brand-details',['BrandById'=>$BrandById]);
    }
    public function disableArtistInfo($id) {
        $ArtistById = User::find($id);
        $ArtistById->access = 0;
        $ArtistById->save();
        return redirect('/admin-view-artist')->with('messageCancel', 'Artist account Verification Canceled ');
    }
    public function activeArtistInfo($id) {
        $ArtistById = User::find($id);
        $ArtistById->access = 1;
        $ArtistById->save();
        return redirect('/admin-view-artist')->with('messageVerify', 'Artist account Verified successfully');
    }
    public function viewArtistDetails($id) {
        $ArtistById = DB::table('artist_profiles')
            ->join('users','users.id','=','artist_profiles.artist_id')
            ->select('artist_profiles.*','users.name','users.email')
            ->where('artist_profiles.artist_id','=',$id)
            ->first();
        return view('admin.users.artist-details',['ArtistById'=>$ArtistById]);
    }
    public function viewOrder(){
        $customerOrder=DB::table('order_customers')
            ->select('*')
            ->orderby('id','desc')
            ->get();

        //dd($customerOrder);
        return view('admin.Order.customer-order',['customerOrder'=>$customerOrder]);
    }
    public function viewOrderBrand(){
        $customerOrder=DB::table('orders')
            ->select('*')
            ->orderby('id','desc')
            ->get();

        //dd($customerOrder);
        return view('admin.Order.brand-order',['customerOrder'=>$customerOrder]);
    }
    public function detailsOrder($id){

        $customerOrder=OrderCustomer::find($id);

        $ShippingDetails=DB::table('shippings')
            ->select('*')
            ->where('id','=',$customerOrder->shipping_id)
            ->first();

        $customer=User::find($customerOrder->customer_id);
        $products=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->select('order_details_of_customers.*','products.product_name')
            ->where('order_id','=',$customerOrder->id)
            ->get();


        return view('admin.Order.view-order-details',['customerOrder'=>$customerOrder,
            'ShippingDetails'=>$ShippingDetails,
            'customer'=>$customer,
            'products'=>$products,
        ]);
    }
    public function detailsDealerOrder($id){

        $customerOrder=Order::find($id);

        $ShippingDetails=DB::table('shippings')
            ->select('*')
            ->where('id','=',$customerOrder->shipping_id)
            ->first();

        $customer=User::find($customerOrder->customer_id);
        $products=DB::table('order_details_of_dealers')
            ->join('products','products.id','=','order_details_of_dealers.product_id')
            ->select('order_details_of_dealers.*','products.product_name')
            ->where('order_id','=',$customerOrder->id)
            ->get();


        return view('admin.Order.view-order-of-brand',['customerOrder'=>$customerOrder,
            'ShippingDetails'=>$ShippingDetails,
            'customer'=>$customer,
            'products'=>$products,
        ]);
    }
    public function confirmDelivery($id){
        $orderCustomer=OrderCustomer::find($id);
        $orderCustomer->status=1;
        $orderCustomer->save();
        return redirect('/order-view')->with('message','Order delivered');
    }
    public function confirmDeliverybrand($id){
        $orderCustomer=Order::find($id);
        $orderCustomer->status=1;
        $orderCustomer->save();
        return redirect('/order-view-brand')->with('message','Order delivered');
    }
}
