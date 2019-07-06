<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Service;
use App\ServicePaymentInfo;
use App\ServiceShipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function ShowService(){
        $myProducts=DB::table('services')
            ->join('categories','categories.id','=','services.category_id')
            ->select('services.*','categories.category_name')
            ->where('customer_id','=',Auth::user()->id)
            ->get();

        $categories=Categories::all();

        return view('font.servicing.service-content',['categories'=>$categories,'myProducts'=>$myProducts]);
    }
    public function addProductToService(Request $request){
        $this->validate($request, [
            'brand_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'product_name' => 'required',
            'user_period' => 'required',
            'product_model' => 'required',
            'short_description' => 'required',
            'product_image' => 'required',
        ]);
        $productImage = $request->file('product_image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'product-images/';
        $imgUrl = $directory.$imageName;
        Image::make($productImage)->resize(200, 200)->save($imgUrl);

        $services= new Service();
        $services->category_id=$request->category_id;
        $services->customer_id=Auth::user()->id;
        $services->Services=$request->Services;
        $services->brand_name=$request->brand_name;
        $services->product_name=$request->product_name;
        $services->user_period=$request->user_period;
        $services->product_model=$request->product_model;
        $services->short_description=$request->short_description;
        $services->product_image=$imgUrl;
        $services->status="request";
        $services->save();

        return redirect('/service#service')->with('message','you have successfully submitted your product details');
    }

    public function allServiceProdducts(){
        $services=Service::all();
        $detailsService=new Service();

        return view('admin.Services.manage-service',['services'=>$services,'detailsService'=>$detailsService]);
    }
    public function editService($id){
        $Product=Service::find($id);


        return view('admin.Services.edit-service',['product'=>$Product]);
    }

    public function viewServiceById(Request $request){
        $service=Service::find($request->id);

        echo $service;
    }

    public function updateService(Request $request){

        if(isset($request->delivery_date)) {

            $services = Service::find($request->product_id);
            $services->status = $request->status;
            $services->prepare_time = $request->prepare_time;
            $services->notes = $request->notes;
            $services->total_cost = $request->total_cost;
            if ($services->accept==null) {
                $services->accept = $request->accept;
            }
            if ($services->declined==null) {
                $services->declined = $request->declined;
            }
            $services->notes = $request->notes;
            $services->delivery_date = $request->delivery_date;
            $services->save();

            return redirect('/manage-services');
        }else{

            $services = Service::find($request->product_id);
            $services->status = $request->status;
            $services->prepare_time = $request->prepare_time;
            $services->notes = $request->notes;
            $services->total_cost = $request->total_cost;
            if ($services->accept==null) {
                $services->accept = $request->accept;
            }
            if ($services->declined==null) {
                $services->declined = $request->declined;
            }
            $services->notes = $request->notes;
            $services->save();
            return redirect('/manage-services');
        }
    }

    public function CancelService($id){
        $services = Service::find($id);
        $services->declined=1;
        $services->save();
        return redirect('/service')->with('message','Service cancelled Successfully');
    }

    public function saveService($id){
        $services=Service::find($id);
        $serviceShipping=DB::table('service_shippings')
            ->select('*')
            ->where('service_id',$id)
            ->first();


       return view('font.Servicing.pickup-and-shipping',['services'=>$services,'serviceShipping'=>$serviceShipping]);
    }
    public function saveShippings(Request $request){
        $this->validate($request, [
            'sname' => 'required',
            'pname' => 'required',
            'saddress1' => 'required',
            'paddress1' => 'required',
            'saddress2' => 'required',
            'paddress2' => 'required',
            'stown' => 'required',
            'ptown' => 'required',
            'pstate' => 'required',
            'spostcode' => 'required',
            'ppostcode' => 'required',
            'sphone' => 'required',
            'pphone' => 'required',
        ]);

        $services=Service::find($request->service_id);


        if($request->service_shipping_id){
            $serviceShipping=ServiceShipping::find($request->service_shipping_id);
            $serviceShipping->sname=$request->sname;
            $serviceShipping->pname=$request->pname;
            $serviceShipping->saddress1=$request->saddress1;
            $serviceShipping->paddress1=$request->paddress1;
            $serviceShipping->saddress2=$request->saddress2;
            $serviceShipping->paddress2=$request->paddress2;
            $serviceShipping->stown=$request->stown;
            $serviceShipping->ptown=$request->ptown;
            $serviceShipping->pstate=$request->pstate;
            $serviceShipping->spostcode=$request->spostcode;
            $serviceShipping->ppostcode=$request->ppostcode;
            $serviceShipping->sphone=$request->sphone;
            $serviceShipping->pphone=$request->pphone;
            $serviceShipping->save();

        }else {
            $serviceShipping = new ServiceShipping();
            $serviceShipping->service_id = $request->service_id;
            $serviceShipping->sname = $request->sname;
            $serviceShipping->pname = $request->pname;
            $serviceShipping->saddress1 = $request->saddress1;
            $serviceShipping->paddress1 = $request->paddress1;
            $serviceShipping->saddress2 = $request->saddress2;
            $serviceShipping->paddress2 = $request->paddress2;
            $serviceShipping->stown = $request->stown;
            $serviceShipping->ptown = $request->ptown;
            $serviceShipping->pstate = $request->pstate;
            $serviceShipping->spostcode = $request->spostcode;
            $serviceShipping->ppostcode = $request->ppostcode;
            $serviceShipping->sphone = $request->sphone;
            $serviceShipping->pphone = $request->pphone;
            $serviceShipping->save();
        }



        return view('font.servicing.service-payment',['services'=>$services]);
    }
    public function savePaymentOfServicing(Request $request){
        $this->validate($request, [
            'payment_amount' => 'required',
            'name_on_card' => 'required',
            'card_number' => 'required|digits:16|numeric',
            'month' => 'required',
            'year' => 'required',
            'cvv_number' => 'required|numeric|digits:4',
        ]);

        $payment=new ServicePaymentInfo();
        $payment->payment_amount=$request->payment_amount;
        $payment->user_id=$request->user_id;
        $payment->service_id=$request->service_id;
        $payment->name_on_card=$request->name_on_card;
        $payment->card_number=$request->card_number;
        $payment->month=$request->month;
        $payment->year=$request->year;
        $payment->cvv_number=$request->cvv_number;
        $payment->save();

        $services = Service::find($request->service_id);
        $services->accept=1;
        $services->save();



        return redirect('/service')->with('msgService','Congratulation! your payment is confirmed!!');
    }
}
