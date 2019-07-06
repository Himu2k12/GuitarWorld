<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LikeDislike extends Model
{
    public function likeCount($id){

        return    DB::table('like_dislikes')
            ->where([['post_id','=',$id],['like','=',1]])
            ->count('id');
    }
    public function dislikeCount($id){

        return    DB::table('like_dislikes')
            ->where([['post_id','=',$id],['dislike','=',1]])
            ->count('id');
    }
}
