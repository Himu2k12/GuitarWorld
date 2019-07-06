<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;
use DB;

class BrandProduct extends Model
{
    public function RelatedBrandProducts($id){
        return DB::table('brand_products')
            ->join('users','users.id','=','brand_products.brand_id')
            ->select('brand_products.*','users.role')
            ->where('brand_products.category_id','=',$id)
            ->orderBy('brand_products.id','desc')
            ->get();
    }
}
