<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BrandDetail extends Model
{
    public function CheckBrand($id){
        return DB::table('brand_details')
            ->join('users','users.id','=','brand_details.user_id')
            ->select('brand_details.*','users.*')
            ->where('user_id','=',$id)
            ->first();
    }
}
