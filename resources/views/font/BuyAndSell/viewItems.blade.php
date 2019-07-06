@extends('font.master')
@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active"><a href="{{url('/sell-buy')}}">Buy&Sell</a></li>

                </ul>

            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Page Start -->
    <div class="main-shop-page">
        <div class="container">
            <!-- Row End -->
            <div class="row">
                <!-- Product Categorie List Start -->
                <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3">
                    <!-- Single Banner Start -->
                    <div class="single-banner zoom mb-50">
                        <a href="#"><img src="{{asset('/fontAsset')}}/img/banner/banner2.jpg" alt="slider-banner"></a>
                    </div>
                    <!-- Single Banner End -->
                    <!-- Grid & List View Start -->
                    <div class="grid-list-top border-default universal-padding fix mb-30">
                        <div class="grid-list-view f-left">
                            <ul class="list-inline">
                                <li><a data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                <li class="active"><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
                                <li><span class="grid-item-list"> Items 1-12 of 13</span></li>
                            </ul>
                        </div>
                        <!-- Toolbar Short Area Start -->
                        <div class="main-toolbar-sorter f-right">
                            <div class="toolbar-sorter">
                                <label>sort by</label>
                                <select class="sorter" name="sorter">
                                    <option value="Position" selected="selected">position</option>
                                    <option value="Product Name">Product Name</option>
                                    <option value="Price">Price</option>
                                </select>
                                <span><a href="#"><i class="fa fa-arrow-up"></i></a></span>
                            </div>
                        </div>
                        <!-- Toolbar Short Area End -->
                    </div>
                    <!-- Grid & List View End -->
                    <div class="main-categorie">
                        <!-- Grid & List Main Area End -->
                        <div class="tab-content border-default fix">
                            <div id="grid-view" class="tab-pane fade ">
                            @foreach($UsedProducts as $usedProduct)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{url('/item-details/'.$usedProduct->id)}}">
                                            <img class="primary-img" src="{{asset($usedProduct->product_image)}}" alt="single-product">
                                            <img class="secondary-img" src="{{asset($usedProduct->product_image)}}" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{url('/item-details/'.$usedProduct->id)}}">{{$usedProduct->product_name}}</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">{{$usedProduct->product_price-($usedProduct->product_price*$usedProduct->product_discount/100)}}</span><del class="prev-price">{{$usedProduct->product_price}}</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{url('/item-details/'.$usedProduct->id)}}" data-toggle="tooltip" title="Add to Cart">Show Details</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{url('/wishlist-new-product-customer/'.$usedProduct->id)}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                <a href="{{url('/add-to-compare-customer/'.$usedProduct->id)}}" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- #grid view End -->
                            <div id="list-view" class="tab-pane fade in active">
                                @foreach($UsedProducts as $usedProduct)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{url('/item-details/'.$usedProduct->id)}}">
                                            <img class="primary-img" src="{{asset($usedProduct->product_image)}}" alt="single-product">
                                            <img class="secondary-img" src="{{asset($usedProduct->product_image)}}" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{url('/item-details/'.$usedProduct->id)}}">Overnight Duffle </a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">{{$usedProduct->product_price-($usedProduct->product_price*$usedProduct->product_discount/100)}}</span><del class="prev-price">{{$usedProduct->product_price}}</del></p>
                                        <p>{{$usedProduct->short_description}}</p>
                                        <a class="learn-more" href="{{url('/item-details/'.$usedProduct->id)}}">learn more</a>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{url('/item-details/'.$usedProduct->id)}}" data-toggle="tooltip" title="Add to Cart">Show Details</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{url('/wishlist-new-product-customer/'.$usedProduct->id)}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                <a href="{{url('/add-to-compare-customer/'.$usedProduct->id)}}" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                    @endforeach
                                </div>
                            <!-- #list view End -->
                        </div>
                        <!-- Grid & List Main Area End -->
                    </div>
                    <!--Breadcrumb and Page Show Start -->
                    <div class="breadcrubm-page-show border-default universal-padding mt-30 fix">
                        <div class="breadcrumb-list-item f-left">
                            <ul class="list-inline">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="page-list f-right">
                            <div class="toolbar-sorter-footer">
                                <label>show</label>
                                <select class="sorter" name="sorter">
                                    <option value="Position" selected="selected">12</option>
                                    <option value="Product Name">15</option>
                                    <option value="Price">30</option>
                                </select>
                                <span>per page</span>
                            </div>
                        </div>
                    </div>
                    <!--Breadcrumb and Page Show End -->
                </div>
                <!-- product Categorie List End -->
                <!-- Sidebar Shopping Option Start -->
                <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9">
                    <div class="sidebar white-bg">
                        <div class="border-default universal-padding" style="background-color: #546B82;">
                            
                           <div class="group-title">
                                <h2 style="color:white;">Create Add for Sell</h2>
                            </div>
                            <ul>
                                 <li >
                                   <a class="" style="color: #F9F9F9;" href="{{url('/add-Items-To-Buy-And-Sell')}}"><span><i class="fa fa-plus-square" aria-hidden="true"></i></span>  Create Add</a>
                                 </li>
                                <li >
                                   <a class="" style="color: #F9F9F9;" href="{{url('/manage-own-Items-To-Buy-And-Sell')}}"><span><i class="fa fa-plus-square" aria-hidden="true"></i></span>  My Add</a>
                                </li>
                            </ul>

                        </div>
                        <div class="border-default universal-padding mtb-40">
                            <div class="group-title">
                                <h2>categories</h2>
                            </div>
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="#">{{$category->category_name}} ({{$category->pro}})</a></li>
                                @endforeach
                            </ul>

                        </div>
                        <div class="border-default universal-padding">
                            <div class="group-title">
                                <h2>Compare Products</h2>
                            </div>
                            <div class="best-seller-pro-two compare-pro best-seller-pro-two owl-carousel">
                                <!-- Best Seller Multi Product Start -->
                                @foreach($compareProducts as $compareProduct)
                                <div class="best-seller-multi-product">
                                    <!-- Single Product Start -->

                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{url('/compare-view')}}">
                                                <img class="primary-img" src="{{asset($compareProduct->options->ItemImage)}}" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h6><a href="{{url('/compare-view')}}">{{$compareProduct->name}}</a></h6><br>
                                            <p><span class="price">৳ {{$compareProduct->price-($compareProduct->price*$compareProduct->product_discount/100)}}</span><del class="prev-price">{{$compareProduct->price}}</del></p>
                                           <br> <p>Available product: {{$compareProduct->options->Items}}</p>
                                                 </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->

                                </div>
                                @endforeach
                                <!-- Best Seller Multi Product End -->

                                </div>
                        </div>
                        <div class="border-default universal-padding mtb-40">
                            <div class="group-title">
                                <h2>My Wish List</h2>
                            </div>
                            <div class="best-seller-pro-two compare-pro best-seller-pro-two owl-carousel">
                                <!-- Best Seller Multi Product Start -->
                                @foreach($wishlistProducts as $wishlistProduct)
                                    <div class="best-seller-multi-product">
                                        <!-- Single Product Start -->

                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="{{url('/compare-view')}}">
                                                    <img class="primary-img" src="{{asset($wishlistProduct->options->ItemImage)}}" alt="single-product">
                                                </a>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h6><a href="{{url('/compare-view')}}">{{$wishlistProduct->name}}</a></h6><br>
                                                <p><span class="price">৳ {{$wishlistProduct->price-($wishlistProduct->price*$wishlistProduct->product_discount/100)}}</span><del class="prev-price">{{$wishlistProduct->price}}</del></p>
                                                <br> <p>Available product: {{$wishlistProduct->options->Items}}</p>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->

                                    </div>
                            @endforeach
                            <!-- Best Seller Multi Product End -->

                            </div>
                        </div>
                        <!-- Single Banner Start -->
                        <div class="single-banner zoom mb-50">
                            <a href="#" class="hidden-sm"><img src="{{asset('/fontAsset')}}/img/banner/sell.jpg" alt="slider-banner"></a>
                            <a href="#" class="visible-sm"><img src="{{asset('/fontAsset')}}/img/banner/sell.jpg" alt="slider-banner"></a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                </div>
                <!-- Sidebar Shopping Option End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Shop Page End -->
    <!-- Categorie Page Brand Banner Start -->
    <div class="container">
        <!-- Brand Banner Start -->
        <div class="row">
            <!-- Brand Banner Start -->
            <div class="brand-banner owl-carousel pt-30">
                <div class="single-brand">
                    <a href="#"><img class="img" src="{{asset('fontAsset/')}}/img/brand/1.jpg" height="70px" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="{{asset('fontAsset/')}}/img/brand/2.jpg"  height="70px" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="{{asset('fontAsset/')}}/img/brand/3.jpg"  height="70px" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="{{asset('fontAsset/')}}/img/brand/4.jpg"  height="70px" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="{{asset('fontAsset/')}}/img/brand/1.jpg"  height="70px" alt="brand-image"></a>
                </div>
            </div>
            <!-- Brand Banner End -->
        </div>
        <!-- Brand Banner End -->
    </div>
    <!-- Categorie Page Brand Banner End -->


@endsection