@extends('font.master')
<link rel="stylesheet" type="text/css" href="{{asset('forumAsset/')}}/css/main.min.css">

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active"><a href="{{url('/forum')}}">Forum</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->


    <div class="container">
        <div class="row">

            <!-- Main Content -->

            <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

                <div class="ui-block">

                    <!-- News Feed Form  -->

                    <div class="news-feed-form">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">

                                    <span>Status</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                                <form action="{{url('/post-status')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="author-thumb">
                                        @if(Auth::user()->role=="customer")
                                        <img src="<?php if (isset($VisitorInfo->profile_picture)){echo asset($VisitorInfo->profile_picture);} else{echo asset('/profile-pictures/profile.png');} ; ?>" height="40px" width="40px" alt="author">
                                        @elseif(Auth::user()->role=="artist")
                                            <img src="<?php if (isset($VisitorInfo->artist_pp)){echo asset($VisitorInfo->artist_pp);} else{echo asset('/profile-pictures/profile.png');} ; ?>" height="40px" width="40px" alt="author">
                                        @endif
                                    </div>
                                    <div class="form-group with-icon label-floating is-empty">
                                        <label class="control-label"></label>
                                        <textarea class="form-control" name="post" placeholder="Share what you are thinking here..." style="font-size: 14px"></textarea>
                                    </div>
                                    <div class="add-options-message">

                                        <div style="float: left; ">
                                            <label>Insert Image</label>
                                            <input style=" font-size: 14px;" type="file" name="post_image">
                                            @if(Auth::user()->role=="customer")
                                            <input  type="hidden" name="customer_pp" value="<?php if (isset($VisitorInfo->profile_picture)){echo ($VisitorInfo->profile_picture);} ?>">
                                            @elseif(Auth::user()->role=="artist")
                                                <input  type="hidden" name="customer_pp" value="<?php if (isset($VisitorInfo->artist_pp)){echo ($VisitorInfo->artist_pp);} ?>">
                                            @endif
                                        </div>

                                        <input type="submit" class="btn btn-primary" style="line-height: 0%; clear: both" value="Post Status" />

                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>
                    <!-- ... end News Feed Form  -->
                @foreach($posts as $post)
                <div id="newsfeed-items-grid">

                     <div class="ui-block">

                        <article class="hentry post has-post-thumbnail">

                            <div class="post__author author vcard inline-items">
                                @if(isset($post->profile_picture))
                                 <img src="{{$post->profile_picture}}" alt="author">
                                @elseif(isset($post->artist_pp))
                                    <img src="{{$post->artist_pp}}" alt="author">
                                @else
                                    <img src="{{asset('/profile-pictures/profile.png')}}" />
                                @endif
                                <div class="author-date">
                                    <a class="h4 post__author-name fn" href="{{url('/post-description/'.$post->id)}}">{{$post->name}}</a>
                                    <a class="h64 post__author-name fn" href="{{url('/post-description/'.$post->id)}}">({{$post->role}})</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                           {{$post->created_at}}
                                        </time>
                                    </div>
                                </div>
                                    @if($post->customer_id==Auth::user()->id)
                                    <div style="float: right">
                                        <a href="{{url('/delete-post/'.$post->id)}}"><span><i class="fa fa-trash fa-2x" ></i></span></a>
                                    </div>
                                        @endif


                            </div>
                            <a href="{{url('/post-description/'.$post->id)}}">
                            <p style="font-size: 14px">{{$post->post}}</p>

                            <div class="post-additional-info inline-items">

                                <a href="{{url('/post-description/'.$post->id)}}" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                    <span>{{$likeDislike->likeCount($post->id)}} Likes</span>
                                </a>
                                <a href="{{url('/post-description/'.$post->id)}}" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                    <span>{{$likeDislike->dislikeCount($post->id)}} Dislikes</span>
                                </a>

                                <div class="comments-shared">
                                    <a href="{{url('/post-description/'.$post->id)}}" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
                                        <span>{{$comments->commentCount($post->id)}} Comments</span>
                                    </a>

                                </div>


                            </div>

                            </a>

                        </article>
                    </div>


                </div>
                @endforeach

            </main>

        </div>
    </div>



@endsection