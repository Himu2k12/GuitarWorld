<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function addBrand() {
        return view('admin.brand.add-brand');

    }
    public function saveBrandInfo(Request $request) {
        $this->validate($request, [
            'brand_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'brand_specification' => 'required',
            'brand_image' => 'required',
        ]);

        $brandImage=$request->file('brand_image');
        $directory='brand-images/';
        $imageName=$brandImage->getClientOriginalName();
        $imageUrl=$directory.$imageName;
        Image::make($brandImage)->save($imageUrl);



        $brand = new Brand();
        $brand->id = $request->id;
        $brand->brand_name = $request->brand_name;
        $brand->brand_specification = $request->brand_specification;
        $brand->brand_image = $imageUrl;
        $brand->status = $request->status;
        $brand->save();

        return redirect('manage-brand')->with('message', 'Brand info save successfully');
    }
    public function manageBrandInfo() {
        $allBrands = Brand::all();
        return view('admin.brand.manage-brand', ['allBrands'=>$allBrands]);
    }
    public function disabledbrandInfo($id) {
        $brandById = Brand::find($id);
        $brandById->status = 0;
        $brandById->save();
        return redirect('manage-brand')->with('message', 'Brand info disabled successfully');
    }
    public function activebrandInfo($id) {
        $brandById = Brand::find($id);
        $brandById->status = 1;
        $brandById->save();
        return redirect('manage-brand')->with('message', 'Brand info actived successfully');
    }
    public function editbrandInfo($id) {
        //$categoryById = Category::where('id', $id)->first();

        $brandById = Brand::find($id);
        return view('admin.brand.edit-brand', ['brandById'=>$brandById]);
    }

    public function updateBrandInfo(Request $request) {
//        $category = new Category();
        $this->validate($request, [
            'brand_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'brand_specification' => 'required',
        ]);
        $brandImage=$request->file('brand_image');

        if($brandImage){

            $brandById = Brand::find($request->brand_id);
            unlink($brandById->brand_image);

            $directory='brand-images/';
            $imageName=$brandImage->getClientOriginalName();
            $imageUrl=$directory.$imageName;
            Image::make($brandImage)->save($imageUrl);

            $brandById = Brand::find($request->brand_id);
            $brandById->brand_name = $request->brand_name;
            $brandById->brand_specification = $request->brand_specification;
            $brandById->brand_image = $imageUrl;
            $brandById->status = $request->status;
            $brandById->save();

        }else {


            $brandById = Brand::find($request->brand_id);
            $brandById->brand_name = $request->brand_name;
            $brandById->brand_specification = $request->brand_specification;
            $brandById->status = $request->status;
            $brandById->save();
        }

        return redirect('/manage-brand')->with('message', 'Brand info updated successfully');
    }
}
