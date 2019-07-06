<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function RelatedProduct($id){
        return DB::table('products')
            ->join('users','users.id','=','products.customer_id')
            ->select('products.*','users.role')
            ->where([['products.category_id','=',$id],['users.role','!=',"customer"]])
            ->orderBy('products.id','desc')
            ->get();
    }

}
