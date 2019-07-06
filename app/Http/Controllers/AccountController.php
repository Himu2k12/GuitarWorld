<?php

namespace App\Http\Controllers;

use App\DealerWithdraw;
use App\ServicePaymentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Gate;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function saveWithDrawDealer(Request $request){

        $withDraw=new DealerWithdraw();
        $withDraw->customer_id=$request->customer_id;
        $withDraw->bank_name=$request->bank_name;
        $withDraw->account_name=$request->account_name;
        $withDraw->account_number=$request->account_number;
        $withDraw->amount_of_withdraw=$request->amount_of_withdraw;
        $withDraw->commission=$request->commission;
        $withDraw->save();
    if (Auth::user()->role=="brand") {
        return redirect('/brand-statistic')->with('sms', 'you have successfully Transferred your money');
    }else{
        return redirect('/customer-profile')->with('sms', 'you have successfully Transferred your money');

    }
    }
    public function brandTurnOver(){
        if(!Gate::allows('isAdmin')){
            abort('404','you cannot access here');
        }

        $sellOfBrands=DB::table('order_details_of_dealers')
            ->join('users','users.id','order_details_of_dealers.brand_id')
            ->select('order_details_of_dealers.*','users.name')
            ->orderBy('order_details_of_dealers.id','DESC')
            ->get();
        $sellOfDealers=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->join('users','products.customer_id','=','users.id')
            ->select('users.name','users.id','order_details_of_customers.total_amount','order_details_of_customers.created_at')
            ->where('users.role','=',"dealer")
            ->get();
        $sellOfGW=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->join('users','products.customer_id','=','users.id')
            ->select('users.name','users.id','order_details_of_customers.total_amount','order_details_of_customers.created_at')
            ->where('users.role','=',"admin")
            ->get();
        $sellOfMP=DB::table('order_details_of_customers')
            ->join('products','products.id','=','order_details_of_customers.product_id')
            ->join('users','products.customer_id','=','users.id')
            ->select('users.name','users.id','order_details_of_customers.total_amount','order_details_of_customers.created_at')
            ->where('users.role','=',"customer")
            ->get();
        $serviceIncome=ServicePaymentInfo::all();
        $withdrawnAmountOfBrands=DB::table('dealer_withdraws')
            ->join('users','users.id','=','dealer_withdraws.customer_id')
            ->where('users.role','=',"brand")
            ->sum('dealer_withdraws.amount_of_withdraw','dealer_withdraws.commission');
        $commissionFromBrands=DB::table('dealer_withdraws')
            ->join('users','users.id','=','dealer_withdraws.customer_id')
            ->where('users.role','=',"brand")
            ->sum('dealer_withdraws.commission');
        $withdrawnAmountOfDealers=DB::table('dealer_withdraws')
            ->join('users','users.id','=','dealer_withdraws.customer_id')
            ->where('users.role','=',"dealer")
            ->sum('dealer_withdraws.amount_of_withdraw','dealer_withdraws.commission');
        $commissionFromDealers=DB::table('dealer_withdraws')
            ->join('users','users.id','=','dealer_withdraws.customer_id')
            ->where('users.role','=',"dealer")
            ->sum('dealer_withdraws.commission');
        $withdrawnAmountOfusers=DB::table('dealer_withdraws')
            ->join('users','users.id','=','dealer_withdraws.customer_id')
            ->where('users.role','=',"customer")
            ->sum('dealer_withdraws.amount_of_withdraw','dealer_withdraws.commission');
        $commissionFromusers=DB::table('dealer_withdraws')
            ->join('users','users.id','=','dealer_withdraws.customer_id')
            ->where('users.role','=',"customer")
            ->sum('dealer_withdraws.commission');

        //dd($withdrawnAmountOfBrands);
        return view('admin.Accounts.brand-account',['sellOfBrands'=>$sellOfBrands,
            'sellOfDealers'=>$sellOfDealers,
            'sellOfGW'=>$sellOfGW,
            'sellOfMP'=>$sellOfMP,
            'serviceIncome'=>$serviceIncome,
            'withdrawnAmountOfBrands'=>$withdrawnAmountOfBrands,
            'withdrawnAmountOfDealers'=>$withdrawnAmountOfDealers,
            'withdrawnAmountOfusers'=>$withdrawnAmountOfusers,
            'commissionFromBrands'=>$commissionFromBrands,
            'commissionFromDealers'=>$commissionFromDealers,
            'commissionFromusers'=>$commissionFromusers,
            ]);
    }
}
