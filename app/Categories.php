<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Categories extends Model
{
    public function products($id){

        return DB::table('brand_products')
            ->join('users', 'brand_products.brand_id', '=', 'users.id')
            ->select('users.name', 'brand_products.*')
            ->where('brand_products.category_id','=',$id)
            ->orderBy('brand_products.id','desc')
            ->get();
    }
    public function CustomerProducts($id){

        return DB::table('products')
            ->join('users','users.id','=','products.customer_id')
            ->select('products.*','users.role')
            ->where('products.category_id','=',$id)
            ->whereIn('users.role',["admin","dealer"])
            ->orderBy('products.id','desc')
            ->get();
    }
}
