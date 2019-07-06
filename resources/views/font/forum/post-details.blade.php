@extends('font.master')
<link rel="stylesheet" type="text/css" href="{{asset('forumAsset/')}}/css/maint.min.css">
@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/forum')}}">Forum</a></li>
                    <li class="active"><a href="">Post</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Product Thumbnail Start -->
    <div class="main-product-thumbnail pb-50">
        <div class="container">
            <div class="row">
                <!-- Main Thumbnail Image Start -->
                <div class="col-sm-5">
                    <!-- Thumbnail Large Image start -->
                  <img src="<?php if(isset($postsDetials->post_image)) { echo asset($postsDetials->post_image) ;}else{ echo asset('/post-images/post.png');}; ?>"  height="320px" width="100%" class="img-thumbnail" alt="product-view" />

                    <!-- Thumbnail Large Image End -->
                </div>

                <!-- Thumbnail Description Start -->
                <div class="col-sm-7">
                    <div class="thubnail-desc fix">
                        <p style="font-size: 18px">{{$postsDetials->post}}</p><br>
                        <p>({{$postsDetialsOfUser->name}})</p><br>
                        <div class="pro-price mb-10">
                            <p><span class="price">{{$postsDetials->created_at}}</span></p>
                        </div>



                        <hr/>
                        {{--like dislike start here--}}
                        <div class="rating form-group" id="rating2">
                            <button class="btn btn-default like"  style="border: 1px solid beige; border-radius: 10px;width: 40%" style="<?php if(isset($checkLikeById)){echo "background-color:#87A9C7";}else{echo "border: 1px solid beige; border-radius: 10px";} ?>" id="like"><span><i class="fa fa-thumbs-o-up"></i></span> Like</button>
                            <span class="likes">0</span>
                            <button class="btn btn-default dislike" style="border: 1px solid beige; border-radius: 10px;width: 40%;" id="dislike"><span><i class="fa fa-thumbs-o-down"></i></span> Dislike</button>
                            <span class="dislikes">0</span>
                        </div>
                    </div>

                    {{--like dislike ends here--}}

                </div>
            </div>
            <hr>
            <!-- Product Thumbnail Description Start -->
            <div class="thumnail-desc pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="main-thumb-desc">
                                <li class="active"><a data-toggle="tab" href="#dtail">Comment Form</a></li>
                                <li><a data-toggle="tab" href="#Comments">All Comments</a></li>
                            </ul>
                            <!-- Product Thumbnail Tab Content Start -->
                            <div class="tab-content thumb-content border-default">
                                <div id="dtail" class="tab-pane fade in active">
                                    {{--comment submit form start here--}}

                                    <form method="post" action="{{url('/new-answer-of-post')}}"  enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="form-group" class="col-sm-6">
                                            <div>
                                                <input type="hidden" id="PostId" class="form-control" name="post_id" value="{{$postsDetials->id}}" />
                                                <input type="hidden" id="PostId" class="form-control" name="user_id" value="{{$postsDetialsOfUser->id}}" />

                                            </div>
                                        </div>
                                        <div class="form-group" class="col-sm-6">
                                            <div style="text-align: center">
                                                <textarea class="form-control" required name="reply_description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group" class="col-sm-6">
                                            <div style="text-align: center">
                                                <input type="file" class="form-control btn " name="comment_image"/>
                                            </div>
                                        </div>
                                        <div class="form-group" class="col-sm-6">
                                            <div style="text-align: center">
                                                <input type="submit" class="form-control btn " style="background-color:#182C53;color: white" value="Submit" name="submit"/>
                                            </div>
                                        </div>
                                    </form>

                                    {{--comment submit form ends here--}}

                                </div>
                                <div id="Comments" class="tab-pane fade">
                                    <!-- Reviews Start -->
                                    @foreach($comments as $comment)
                                        <div id="newsfeed-items-grid">
                                    <div class="ui-block " >

                                        <article class="hentry post has-post-thumbnail">

                                            <div class="post__author author vcard inline-items row">
                                                <div class="col-sm-1">
                                                    @if(isset($comment->profile_picture))
                                                        <img src="{{asset($comment->profile_picture)}}" class="img-rounded" alt="author">
                                                    @elseif(isset($comment->artist_pp))
                                                        <img src="{{asset($comment->artist_pp)}}" class="img-rounded"  alt="author">
                                                    @else
                                                        <img src="{{asset('/profile-pictures/profile.png')}}" class="img-rounded" />
                                                    @endif
                                                </div>
                                                <div class="author-date col-sm-11">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <p>{{$comment->reply_description}}</p>
                                                            @if(isset($comment->comment_image))
                                                                <div class="col-sm-6">
                                                                <img src="{{asset($comment->comment_image)}}" height="200px"  alt="author">
                                                                </div>
                                                                <div class="col-sm-6">

                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <a class="h6 post__author-name fn" href="#">({{$comment->name}})</a>
                                                    <div class="post__date">
                                                        <time class="published" datetime="2004-07-24T18:18">
                                                            {{$comment->created_at}}
                                                        </time>
                                                    </div>

                                                </div>


                                            </div>

                                        </article>
                                    </div>
                                        </div>
                                    @endforeach
                             <!-- Reviews End -->
                                </div>
                            </div>
                            <!-- Product Thumbnail Tab Content End -->
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Product Thumbnail Description End -->

        </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>


@endsection