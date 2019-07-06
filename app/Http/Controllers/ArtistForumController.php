<?php

namespace App\Http\Controllers;

use App\ArtistProfile;
use App\Comment;
use App\Post;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Image;
use App\LikeDislike;

class ArtistForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function showForum(){

        if(Auth::user()->role=="customer") {
            $VisitorInfo = UserProfile::where('customer_id', Auth::user()->id)->first();


        }elseif(Auth::user()->role=="artist"){
            $VisitorInfo = ArtistProfile::where('artist_id', Auth::user()->id)->first();

        }
            $posts = DB::table('posts')
                ->leftJoin('users', 'users.id', '=', 'posts.customer_id')
                ->leftJoin('user_profiles', 'user_profiles.customer_id', '=', 'posts.customer_id')
                ->leftJoin('artist_profiles', 'artist_profiles.artist_id', '=', 'posts.customer_id')
                ->select('posts.*', 'users.name','users.role', 'user_profiles.profile_picture','artist_profiles.artist_pp')
                ->where('posts.delete_post','=',0)
                ->orderBy('posts.id', 'desc')
                ->get();

         $likeDislike=new LikeDislike();
        $comments=new Comment();

        return view('font.forum.forum-content',['posts'=>$posts,'VisitorInfo'=>$VisitorInfo,'likeDislike'=>$likeDislike,'comments'=>$comments]);
    }
    public function savePost(Request $request){

        $postImage=$request->post_image;
        if($postImage){

            $postImage = $request->file('post_image');
            $imageName = $postImage->getClientOriginalName();
            $directory = 'post-images/';
            $imgUrl = $directory.$imageName;
            Image::make($postImage)->resize(200, 200)->save($imgUrl);

            $post=new Post();
            $post->customer_id=Auth::user()->id;
            $post->post=$request->post;
            $post->delete_post=0;
            $post->post_image=$imgUrl;
            $post->save();

        }else{
            $post=new Post();
            $post->customer_id=Auth::user()->id;
            $post->post=$request->post;
            $post->delete_post=0;
            $post->save();
        }

        return redirect('/forum');


    }
    public function saveProfileInfo(Request $request){
        $this->validate($request, [
            'country' => 'required|regex:/^[\pL\s\-]+$/u',
            'artist_name' => 'required',
            'artist_id' => 'required',
            'artist_type' => 'required',
            'mobile' => 'required',
            'artist_bio' => 'required',
        ]);
        $artistPP=$request->file('artist_pp');

        if($artistPP) {


            $directory = 'profile-pictures/';
            $imageName = $artistPP->getClientOriginalName();
            $imageUrl = $directory . $imageName;
            Image::make($artistPP)->save($imageUrl);

            $artistProfile = new ArtistProfile();
            $artistProfile->country = $request->country;
            $artistProfile->artist_name = $request->artist_name;
            $artistProfile->artist_pp = $imageUrl;
            $artistProfile->artist_id = $request->artist_id;
            $artistProfile->artist_type = $request->artist_type;
            $artistProfile->band_name = $request->band_name;
            $artistProfile->brand_position = $request->brand_position;
            $artistProfile->fb_link = $request->fb_link;
            $artistProfile->website = $request->website;
            $artistProfile->mobile = $request->mobile;
            $artistProfile->artist_bio = $request->artist_bio;
            $artistProfile->status =0;
            $artistProfile->save();

            return redirect('/artist-profile')->with('successMessage','Profile Info saved Successfully!!!');
        }else{

            $artistProfile = new ArtistProfile();
            $artistProfile->country = $request->country;
            $artistProfile->artist_name = $request->artist_name;
            $artistProfile->artist_id = $request->artist_id;
            $artistProfile->band_name = $request->band_name;
            $artistProfile->brand_position = $request->brand_position;
            $artistProfile->fb_link = $request->fb_link;
            $artistProfile->website = $request->website;
            $artistProfile->artist_type = $request->artist_type;
            $artistProfile->mobile = $request->mobile;
            $artistProfile->artist_bio = $request->artist_bio;
            $artistProfile->status =0;
            $artistProfile->save();

            return redirect('/artist-profile')->with('successMessage','Profile Info saved Successfully without Profile picture!!!');
        }


    }
    public function updateProfileInfo(Request $request){
//        dd($request);

        $artistPP=$request->file('artist_pp');

        if($artistPP) {


            $directory = 'profile-pictures/';
            $imageName = $artistPP->getClientOriginalName();
            $imageUrl = $directory . $imageName;
            Image::make($artistPP)->save($imageUrl);

            $artistProfile= ArtistProfile::find($request->id);
            $artistProfile->country = $request->country;
            $artistProfile->artist_name = $request->artist_name;
            $artistProfile->artist_pp = $imageUrl;
            $artistProfile->artist_id = $request->artist_id;
            $artistProfile->band_name = $request->band_name;
            $artistProfile->brand_position = $request->brand_position;
            $artistProfile->fb_link = $request->fb_link;
            $artistProfile->website = $request->website;
            $artistProfile->artist_type = $request->artist_type;
            $artistProfile->mobile = $request->mobile;
            $artistProfile->artist_bio = $request->artist_bio;
            $artistProfile->save();

            return redirect('/artist-profile')->with('successMessage','Profile Info Updated Successfully!!!');
        }else{

            $artistProfile = ArtistProfile::find($request->id);
            $artistProfile->country = $request->country;
            $artistProfile->artist_name = $request->artist_name;
            $artistProfile->artist_id = $request->artist_id;
            $artistProfile->band_name = $request->band_name;
            $artistProfile->brand_position = $request->brand_position;
            $artistProfile->fb_link = $request->fb_link;
            $artistProfile->website = $request->website;
            $artistProfile->artist_type = $request->artist_type;
            $artistProfile->mobile = $request->mobile;
            $artistProfile->artist_bio = $request->artist_bio;
            $artistProfile->save();

            return redirect('/artist-profile')->with('successMessage','Profile Info Updated Successfully without Profile picture!!!');
        }



    }
    public function PostDescriptionById($id){
        $postsDetials=Post::find($id);
        $postsDetialsOfUser=User::find($postsDetials->customer_id);
        if(Auth::user()->role=="customer") {
            $UserPP = UserProfile::where('customer_id', Auth::user()->id)->first();

        }elseif(Auth::user()->role=="artist"){
            $UserPP = ArtistProfile::where('artist_id', Auth::user()->id)->first();

        }
        $comments=DB::table('comments')
            ->join('posts','posts.id','=','comments.post_id')
            ->join('users','users.id','=','comments.user_id')
            ->leftJoin('user_profiles', 'user_profiles.customer_id', '=', 'comments.user_id')
            ->leftJoin('artist_profiles', 'artist_profiles.artist_id', '=', 'comments.user_id')
            ->select('comments.*','user_profiles.profile_picture','artist_profiles.artist_pp','users.name')
            ->where('post_id','=',$id)
            ->get();


        Session()->put('postID',$postsDetials->id);
        return view('font.forum.post-details',['postsDetials'=>$postsDetials,'postsDetialsOfUser'=>$postsDetialsOfUser,'comments'=>$comments,'UserPP'=>$UserPP]);
    }
    public function viewLike(){
        $id=Session::get('postID');

        $like=DB::table('like_dislikes')
            ->select('like')
            ->where([['post_id','=',$id],['like',1]])
            ->count();
        echo $like;

    }
    public function viewDislike(){
        $id=Session::get('postID');

        $dislike=DB::table('like_dislikes')
            ->select('dislike')
            ->where([['post_id','=',$id],['dislike',1]])
            ->count();

        echo $dislike;

    }
    public  function saveLikeDislike(Request $request){
        $user_id=Auth::user()->id;
        $checkLikeById=DB::table('like_dislikes')
            ->where([['post_id',$request->post_id],['user_id',$user_id],['like',1]])
            ->count();

        $checkDisLikeById=DB::table('like_dislikes')
            ->where([['post_id',$request->post_id],['user_id',$user_id],['dislike',1]])
            ->count();
        if($checkLikeById==1){
            DB::table('like_dislikes')
                ->where([['post_id', '=', $request->post_id], ['user_id', $request->user_id]])
                ->update(['like' => 0, 'dislike' =>1]);
        }elseif ($checkDisLikeById==1){
            DB::table('like_dislikes')
                ->where([['post_id', '=', $request->post_id], ['user_id', $request->user_id]])
                ->update(['like' => 1, 'dislike' =>0]);
        }elseif($request->like==1) {
            $likeDislike = new LikeDislike();
            $likeDislike->post_id = $request->post_id;
            $likeDislike->like = $request->like;
            $likeDislike->dislike =0;
            $likeDislike->user_id = $request->user_id;
            $likeDislike->save();
        }elseif($request->dislike==1){
            $likeDislike = new LikeDislike();
            $likeDislike->post_id = $request->post_id;
            $likeDislike->dislike = $request->dislike;
            $likeDislike->like =0;
            $likeDislike->user_id = $request->user_id;
            $likeDislike->save();
        }

    }
    public function newComment(Request $request)
    {
        $commentImage=$request->comment_image;

        if($commentImage){

            $commentImage = $request->file('comment_image');
            $imageName = $commentImage->getClientOriginalName();
            $directory = 'post-images/';
            $imgUrl = $directory.$imageName;
            Image::make($commentImage)->resize(20, 20)->save($imgUrl);

            $comment=new Comment();
            $comment->user_id=Auth::user()->id;
            $comment->post_id=$request->post_id;
            $comment->reply_description=$request->reply_description;
            $comment->comment_status=1;
            $comment->comment_image=$imgUrl;
            $comment->save();

        }else{
            $comment=new Comment();
            $comment->user_id=Auth::user()->id;
            $comment->post_id=$request->post_id;
            $comment->reply_description=$request->reply_description;
            $comment->comment_status=1;
            $comment->save();
        }

        return redirect('/post-description/'.$request->post_id)->with('conMas','Comment successfully post!!!');
    }
    public function updateView(Request $request){

        $views=new View();
        $views->idea_id=$request->ideaIdonClick;
        $views->click=$request->click;
        $views->save;
//        DB::table('views')->insert(
//            ['idea_id' =>1, 'click' =>2]
//        );
    }
    public function DeletePost($id){
        $post=Post::find($id);
        $post->delete_post=1;
        $post->save();
        return redirect('/admin-view-artist')->with('successMessage','Post Deleted Successfully');
    }
    public function deleteOwnPost($id){
        $posts=Post::find($id);

        $posts->delete_post=1;
        $posts->save();


        return redirect('/forum')->with('msgDel','Post Deleted Successfully');

    }

}
