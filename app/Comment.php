<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    public function commentCount($id){

        return    DB::table('comments')
            ->where([['post_id','=',$id]])
            ->count('id');
    }
}
