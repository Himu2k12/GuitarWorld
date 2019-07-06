<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Order;
use App\Product;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Image;

class WelcomeController extends Controller
{


    public function showHome(){
//        $me=DB::table('products')
//            ->join('users','users.id','=','products.customer_id')
//            ->select('products.*','users.role')
//            ->where('products.category_id','=',1)
//            ->where('users.role','=',"dealer")
//            ->orwhere('users.role','=',"admin")
//            ->orderBy('products.id','desc')
//            ->get();
//        dd($me);

        if(isset(Auth::user()->role) && Auth::user()->role=='brand'){
            return redirect('/brand-home');
        }
        $CategoryProducts=new Categories();
        //dd($CategoryProducts);
        $categories=DB::table('categories')
            ->select('*')
            ->where('status','=',1)
            ->limit(5)
            ->get();
        $Products=DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->join('users','users.id','=','products.customer_id')
            ->select('products.*','categories.category_name')
            ->where('users.role','=',"admin")
            ->orwhere('users.role','=',"dealer")
            ->orderBy('products.id','desc')
            ->get();
        $OnSaleProducts=DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->join('users','users.id','=','products.customer_id')
            ->select('products.*','categories.category_name')
            ->where('products.product_discount','>',0)
            ->whereIn('users.role',["admin","dealer"])
            ->orderBy('products.id','desc')
            ->get();

        $bestSellingProduct=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->select('products.*')
            ->groupBy('order_details_of_customers.product_id','products.id','products.category_id','products.customer_id','products.brand_id','products.product_name','products.product_condition','products.user_period','products.product_code','products.product_price','products.product_quantity','products.product_discount','products.short_description','products.long_description','products.product_image','products.status','products.view','products.created_at','products.updated_at')
            ->get();


        $featuredProducts=DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->join('users','users.id','=','products.customer_id')
            ->select('products.*','categories.category_name')
            ->where('categories.category_name','=','Accessories')
            ->orderBy('products.id','desc')
            ->get();
        $MostViewProducts=DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->join('users','users.id','=','products.customer_id')
            ->select('products.*','categories.category_name')
            ->where('users.role','=',"admin")
            ->orwhere('users.role','=',"dealer")
            ->offset(0)
            ->limit(4)
            ->orderBy('products.view','desc')
            ->get();
        $MostViewProductsTwo=DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->join('users','users.id','=','products.customer_id')
            ->select('products.*','categories.category_name')
            ->where('users.role','=',"admin")
            ->orwhere('users.role','=',"dealer")
            ->orderBy('products.view','desc')
            ->offset(2)
            ->limit(2)
            ->get();


        $RandomProducts=DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->join('users','users.id','=','products.customer_id')
            ->select('products.*','categories.category_name')
            ->where('users.role','=',"admin")
            ->orwhere('users.role','=',"dealer")
            ->inRandomOrder()
            ->get();
        $posts = DB::table('posts')
            ->leftJoin('users', 'users.id', '=', 'posts.customer_id')
            ->leftJoin('user_profiles', 'user_profiles.customer_id', '=', 'posts.customer_id')
            ->leftJoin('artist_profiles', 'artist_profiles.artist_id', '=', 'posts.customer_id')
            ->select('posts.*', 'users.name','users.role','artist_profiles.artist_pp')
            ->where([['users.role','=','artist'],['posts.delete_post','=',0]])
            ->orderBy('posts.id', 'desc')
            ->offset(0)
            ->limit(2)
            ->get();
        $postsTwo = DB::table('posts')
            ->leftJoin('users', 'users.id', '=', 'posts.customer_id')
            ->leftJoin('user_profiles', 'user_profiles.customer_id', '=', 'posts.customer_id')
            ->leftJoin('artist_profiles', 'artist_profiles.artist_id', '=', 'posts.customer_id')
            ->select('posts.*', 'users.name','users.role','artist_profiles.artist_pp')
            ->where([['users.role','=','artist'],['posts.delete_post','=',0]])
            ->orderBy('posts.id', 'desc')
            ->offset(2)
            ->limit(2)
            ->get();
        $postsThree = DB::table('posts')
            ->leftJoin('users', 'users.id', '=', 'posts.customer_id')
            ->leftJoin('user_profiles', 'user_profiles.customer_id', '=', 'posts.customer_id')
            ->leftJoin('artist_profiles', 'artist_profiles.artist_id', '=', 'posts.customer_id')
            ->select('posts.*', 'users.name','users.role','artist_profiles.artist_pp')
            ->where([['users.role','=','artist'],['posts.delete_post','=',0]])
            ->orderBy('posts.id', 'desc')
            ->offset(4)
            ->limit(2)
            ->get();
        $artistPosts= DB::table('posts')
            ->leftJoin('users', 'users.id', '=', 'posts.customer_id')
            ->leftJoin('user_profiles', 'user_profiles.customer_id', '=', 'posts.customer_id')
            ->leftJoin('artist_profiles', 'artist_profiles.artist_id', '=', 'posts.customer_id')
            ->select('posts.*', 'users.name','users.email','users.role','artist_profiles.artist_pp','artist_profiles.band_name')
            ->where([['users.role','=','artist'],['posts.delete_post','=',0]])
            ->orderBy('posts.id', 'desc')
            ->limit(5)
            ->get();

        Session::forget(['customer_product']);
        return view ('font.home.home-content',['Products'=>$Products,
                                                     'categories'=>$categories,
                                                     'posts'=>$posts,
                                                     'artistPosts'=>$artistPosts,
                                                     'postsTwo'=>$postsTwo,
                                                     'postsThree'=>$postsThree,
                                                     'RandomProducts'=>$RandomProducts,
                                                     'OnSaleProducts'=>$OnSaleProducts,
                                                     'MostViewProducts'=>$MostViewProducts,
                                                     'featuredProducts'=>$featuredProducts,
                                                     'CategoryProducts'=>$CategoryProducts,
                                                     'MostViewProductsTwo'=>$MostViewProductsTwo,
                                                     'bestSellingProduct'=>$bestSellingProduct,
        ]);





    }
    public function searchProduct(Request $request){

        $ne=$request->car;
        if ($ne){

            $searchProduct=DB::table('products')
                ->select('*')
                ->where('product_name','like','%'.$ne.'%')
                ->get();
            echo json_encode($searchProduct);

        }else{
            $searchProduct="";
            echo json_encode($searchProduct);
        }



    }
    public function ShowAbout(){
        return view('font.about.about-content');
    }
    public function ShowContact(){
        return view('font.contact.contact-info');
    }
    public function showCustomerProfile(){

        $Orders=DB::table('orders')
            ->select('*')
            ->where('customer_id','=',Auth::user()->id)
            ->get();
        $Products=DB::table('order_details_of_dealers')
            ->join('orders','orders.id','=','order_details_of_dealers.order_id')
            ->join('brand_products','brand_products.id','=','order_details_of_dealers.product_id')
            ->select('order_details_of_dealers.*','brand_products.*')
            ->where([['orders.customer_id','=',Auth::user()->id],['orders.shipping_id','=',0],['order_details_of_dealers.post','=',0]])
            ->get();
        $CurrentStock=DB::table('products')
            ->select('*')
            ->where('products.customer_id','=',Auth::user()->id)
            ->get();
        $sellHistory=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->join('users','order_details_of_customers.brand_id','=','users.id')
            ->select('order_details_of_customers.*','products.product_name','users.name')
            ->where('products.customer_id','=',Auth::user()->id)
            ->get();
       $netIncome=DB::table('order_details_of_customers')
           ->join('products','products.id','=','order_details_of_customers.product_id')
           ->join('users','order_details_of_customers.brand_id','=','users.id')
           ->where('products.customer_id','=',Auth::user()->id)
           ->sum('order_details_of_customers.total_amount');
       $dealerWithdrawMoney=DB::table('dealer_withdraws')
           ->where('customer_id','=',Auth::user()->id)
           ->sum('amount_of_withdraw');
       $OnlyWithdraw=DB::table('dealer_withdraws')
           ->where([['customer_id','=',Auth::user()->id],['Purchase','=',0]])
           ->sum('amount_of_withdraw');

        $PurchaseMoney=DB::table('dealer_withdraws')
            ->where([['customer_id','=',Auth::user()->id],['Purchase','=',1]])
            ->sum('amount_of_withdraw');

        $profile=UserProfile::where('customer_id',Auth::user()->id)->first();

        $likes=DB::table('like_dislikes')
            ->where([['user_id','=',Auth::user()->id],['like','=',1]])
            ->count('id');
        $Dislikes=DB::table('like_dislikes')
            ->where([['user_id','=',Auth::user()->id],['dislike','=',1]])
            ->count('dislike');

        $comments=DB::table('comments')
            ->where('user_id','=',Auth::user()->id)
            ->count('id');
        $posts=DB::table('posts')
            ->where('customer_id','=',Auth::user()->id)
            ->count('id');



        return view('font.customerProfile.user-profile',['Orders'=>$Orders,
                                                               'Products'=>$Products,
                                                               'profile'=>$profile,
                                                               'CurrentStock'=>$CurrentStock,
                                                               'sellHistory'=>$sellHistory,
                                                               'netIncome'=>$netIncome,
                                                               'dealerWithdrawMoney'=>$dealerWithdrawMoney,
                                                               'OnlyWithdraw'=>$OnlyWithdraw,
                                                               'PurchaseMoney'=>$PurchaseMoney,
                                                               'likes'=>$likes,
                                                               'Dislikes'=>$Dislikes,
                                                               'comments'=>$comments,
                                                               'posts'=>$posts,

        ]);

    }
    public function saveCustomerProfileData(Request $request){

        $profilePicture=$request->file('profile_picture');


        if($profilePicture) {


            $directory = 'profile-pictures/';
            $imageName = $profilePicture->getClientOriginalName();
            $imageUrl = $directory . $imageName;
            Image::make($profilePicture)->save($imageUrl);

            $userProfile = new UserProfile();
            $userProfile->customer_id = $request->customer_id;
            $userProfile->profile_picture = $imageUrl;
            $userProfile->first_name = $request->first_name;
            $userProfile->last_name = $request->last_name;
            $userProfile->phone_number = $request->phone_number;
            $userProfile->city = $request->city;
            $userProfile->country = $request->country;
            $userProfile->date_of_birth = $request->date_of_birth;
            $userProfile->gender = $request->gender;
            $userProfile->occupation = $request->occupation;
            $userProfile->save();

            return redirect('/customer-profile')->with('successMessage','Profile Info saved Successfully!!!');
        }else{
            $userProfile = new UserProfile();
            $userProfile->customer_id = $request->customer_id;
            $userProfile->first_name = $request->first_name;
            $userProfile->last_name = $request->last_name;
            $userProfile->phone_number = $request->phone_number;
            $userProfile->city = $request->city;
            $userProfile->country = $request->country;
            $userProfile->date_of_birth = $request->date_of_birth;
            $userProfile->gender = $request->gender;
            $userProfile->occupation = $request->occupation;
            $userProfile->save();

            return redirect('/customer-profile')->with('successMessage','Profile Info saved Successfully without Profile picture!!!');
        }


    }
    public function updateCustomerProfileData(Request $request){

        $profilePicture=$request->file('profile_picture');


        if($profilePicture) {

            $this->validate($request, [
                'first_name' => 'required|alpha',
                'last_name' => 'required|alpha',
                'phone_number' => 'required|digits:11|numeric',
                'city' => 'required',
                'country' => 'required',
                'gender' => 'required',
                'occupation' => 'required',
            ]);

            $directory = 'profile-pictures/';
            $imageName = $profilePicture->getClientOriginalName();
            $imageUrl = $directory . $imageName;
            Image::make($profilePicture)->save($imageUrl);

            $userProfile =UserProfile::find($request->id);
            $userProfile->profile_picture = $imageUrl;
            $userProfile->first_name = $request->first_name;
            $userProfile->last_name = $request->last_name;
            $userProfile->phone_number = $request->phone_number;
            $userProfile->city = $request->city;
            $userProfile->country = $request->country;
            $userProfile->date_of_birth = $request->date_of_birth;
            $userProfile->gender = $request->gender;
            $userProfile->occupation = $request->occupation;
            $userProfile->save();

            return redirect('/customer-profile')->with('successMessage','Profile Info Updated Successfully!!!');
        }else{
            $this->validate($request, [
                'first_name' => 'required|alpha',
                'last_name' => 'required|alpha',
                'phone_number' => 'required|digits:11|numeric',
                'city' => 'required',
                'country' => 'required',
                'gender' => 'required',
                'occupation' => 'required',
            ]);
            $userProfile =UserProfile::find($request->id);
            $userProfile->first_name = $request->first_name;
            $userProfile->last_name = $request->last_name;
            $userProfile->phone_number = $request->phone_number;
            $userProfile->city = $request->city;
            $userProfile->country = $request->country;
            $userProfile->date_of_birth = $request->date_of_birth;
            $userProfile->gender = $request->gender;
            $userProfile->occupation = $request->occupation;
            $userProfile->save();

            return redirect('/customer-profile')->with('successMessage','Profile Info Updated Successfully without Profile picture!!!');
        }


    }

    public function showArtistProfile(){

        $ArtistInfo=Auth::user();
        $detailsOfArtist=DB::table('artist_profiles')
            ->select('*')
            ->where('artist_id','=',Auth::user()->id)
            ->first();


        return view('font.customerProfile.artist-profile',['ArtistInfo'=>$ArtistInfo,'detailsOfArtist'=>$detailsOfArtist]);
    }

}
