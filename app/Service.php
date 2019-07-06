<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    public function ServiceDetails($id){
        return DB::table('services')
            ->select('*')
            ->where('id','=',$id)
            ->first();
    }
}
