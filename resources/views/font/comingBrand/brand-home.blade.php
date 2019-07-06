@extends('font.master')

@section('content')
    <div style="height:50px;">

    </div>
     <!-- Slider Under Main Wrapper Content Start -->
    <div class="slider-under-content pb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <!-- Single Banner Start -->
                    <div class="single-banner zoom mb-50">
                        <a href="#"><img src="{{asset('fontAsset/')}}/img/banner/banner3.jpg" alt="slider-banner"></a>
                    </div>
                    <!-- Single Banner End -->
                    <!-- New Pro Content End -->
                    <div class="new-pro-content border-default new-products mb-50 home-2-actions">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Featured Product List Item Start -->
                                <ul class="product-list product-tab-list universal-margin mb-30">
                                    <li class="active"><a data-toggle="tab" href="#new-pro">New Products</a></li>
                                    <li><a data-toggle="tab" href="#onsale">OnSale</a></li>
                                    <li><a data-toggle="tab" href="#featured">Featured</a></li>
                                </ul>
                                <!-- Featured Product List Item End -->
                            </div>
                        </div>
                        <div class="tab-content product-tab-content">
                            <div id="new-pro" class="tab-pane fade in active">
                                <!-- New Products Activation Start -->
                                <div class="home-2-new-pro-active home-2-new-customize owl-carousel">
                                    @foreach($NewProducts as $product)
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="{{url('/brand-product-details/'.$product->id)}}">
                                                    <img class="primary-img" src="{{asset($product->product_image)}}" height="150" alt="single-product">
                                                    <img class="secondary-img" src="{{asset($product->product_image)}}" height="150" alt="single-product">
                                                </a>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content"><br>
                                                <h4><a href="">{{$product->product_name}}</a></h4>
                                                <p><span class="price">৳ {{$product->product_price-($product->product_price*$product->product_discount/100)}}</span>
                                                    @if($product->product_discount>0)
                                                        <del class="prev-price">{{$product->product_price}}</del>
                                                    @endif
                                                </p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="{{url('/brand-product-details/'.$product->id)}}" data-toggle="tooltip" title="Show Details">Show Details</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="{{url('/wishlist-new-product/')}}/{{$product->id}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                        <a href="{{url('/add-to-compare')}}/{{$product->id}}" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                            @if($product->product_quantity > $product->product_sell_number)
                                                <span class="sticker-new" style="background-color: green">IN STOCK</span>
                                            @else
                                                <span class="sticker-new">SOLD OUT</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <!-- New Products Activation End -->
                            </div>
                            <!-- New Products End -->
                            <div id="onsale" class="tab-pane fade">
                                <!-- New Products Activation Start -->
                                <div class="home-2-new-pro-active owl-carousel">
                                    @foreach($OnSaleProducts as $OnSaleProduct)
                                        <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="{{url('/brand-product-details/'.$OnSaleProduct->id)}}">
                                                        <img class="primary-img" src="{{$OnSaleProduct->product_image}}" alt="single-product">
                                                        <img class="secondary-img" src="{{$OnSaleProduct->product_image}}" alt="single-product">
                                                    </a>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content"><br>
                                                    <h4><a href="{{url('/brand-product-details/').$OnSaleProduct->id}}">{{$OnSaleProduct->product_name}}</a></h4>

                                                    <p><span class="price">৳ {{$OnSaleProduct->product_price-($OnSaleProduct->product_price*$OnSaleProduct->product_discount/100)}}</span><del class="prev-price">{{$OnSaleProduct->product_price}}</del></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="{{url('/brand-product-details/'.$OnSaleProduct->id)}}" data-toggle="tooltip" title="Show Details">Show Details</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="{{url('/wishlist-new-product/')}}/{{$OnSaleProduct->id}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                            <a href="{{url('/add-to-compare')}}/{{$OnSaleProduct->id}}" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                                <span class="sticker-new">OFF-{{$OnSaleProduct->product_discount}}%</span>
                                            </div>
                                            <!-- Single Product End -->
                                        @endforeach
                                 </div>
                                <!-- New Products Activation End -->
                                </div>
                            <!-- Onslae Products End -->
                            <div id="featured" class="tab-pane fade">
                                <!-- New Products Activation Start -->
                                <div class="home-2-new-pro-active owl-carousel">
                                    @foreach($featuredProducts as $featuredProduct)
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="{{url('/brand-product-details/').$featuredProduct->id}}">
                                                    <img class="primary-img" src="{{$featuredProduct->product_image}}" alt="single-product">
                                                    <img class="secondary-img" src="{{$featuredProduct->product_image}}" alt="single-product">
                                                </a>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content"><br>
                                                <h4><a href="{{url('/brand-product-details/'.$featuredProduct->id)}}">{{$featuredProduct->product_name}}</a></h4>

                                                <p><span class="price">৳ {{$featuredProduct->product_price-($featuredProduct->product_price*$featuredProduct->product_discount/100)}}
                                                        @if($featuredProduct->product_discount>0)
                                                    </span><del class="prev-price">{{$featuredProduct->product_price}}</del></p>
                                                @endif
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="{{url('/brand-product-details/'.$featuredProduct->id)}}" data-toggle="tooltip" title="Show Details">Show Details</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="{{url('/wishlist-new-product/')}}/{{$featuredProduct->id}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                        <a href="{{url('/add-to-compare')}}/{{$featuredProduct->id}}" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                            @if($featuredProduct->product_quantity > $featuredProduct->product_sell_number)
                                                <span class="sticker-new" style="background-color: green">IN STOCK</span>
                                            @else
                                                <span class="sticker-new">SOLD OUT</span>
                                            @endif
                                        </div>
                                    @endforeach

                                </div>
                                <!-- New Products Activation End -->
                            </div>
                            <!-- #Featured Products End -->
                        </div>
                        <!-- Tab-Content End -->
                    </div>
                    <!-- New Pro Content End -->
                    <!-- Single Banner Start -->
                    <div class="single-banner zoom mb-50">
                        <a href="#"><img src="{{asset('fontAsset/')}}/img/banner/banner4.png" alt="slider-banner"></a>
                    </div>
                    <!-- Single Banner End -->
                    <!-- Best Selling Product Start -->
                    @foreach($categories as $item)
                    <div class="best-selling-items border-default home-2-actions" style="margin-bottom: 30px;">
                        <div class="best-selling-categorie">
                            <div class="row">

                                    <?php $name= $item->category_name?>
                                <div class="col-sm-12">
                                    <div class="group-title universal-margin">

                                            <h2>{{$name}}</h2>

                                        <!-- Best Selling Product List Item Start -->

                                        <!-- Best Selling Product List Item End -->
                                    </div>
                                </div>

                            </div>
                            <!-- Best Selling Product Content Start -->
                            <div class="tab-content product-tab-content">

                                <div id="" class="tab-pane fade in active">
                                    <div class="home-2-new-pro-active more-e-pro owl-carousel">
                                        @foreach($Products->products($item->id) as $brandProduct)
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="{{url('/brand-product-details/'.$brandProduct->id)}}">
                                                        <img class="primary-img" src="{{$brandProduct->product_image}}" height="160px" alt="single-product">
                                                        <img class="secondary-img" src="{{$brandProduct->product_image}}" height="160px" alt="single-product">
                                                    </a>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content" style="margin-top: 20px">
                                                    <h4><a href="">{{$brandProduct->product_name}}</a></h4>
                                                    <h6>({{$brandProduct->name}})</h6><br>

                                                    <p><span class="price">${{$brandProduct->product_price}}</span></p>
                                                    <p>Minimum Amount of Sale: <span class="price">{{$brandProduct->product_sell_number}}</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="{{url('/brand-product-details/'.$brandProduct->id)}}" data-toggle="tooltip" title="View Details">View Details</a>
                                                        </div>
                                                        <div class="actions-secondary">

                                                                   <a href="{{url('/wishlist-new-product/'.$brandProduct->id)}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>


                                                                <a href="{{url('/add-to-compare/'.$brandProduct->id)}}" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                                @if($brandProduct->product_quantity > $brandProduct->product_sell_number)
                                                <span class="sticker-new" style="background-color: green">IN STOCK</span>
                                                    @else
                                                <span class="sticker-new">SOLD OUT</span>
                                                    @endif
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        @endforeach
                                    </div>
                                </div>
                                <!-- #ram Products End -->
                            </div>
                            <!-- Best Selling Product Content End -->
                        </div>
                    </div>
                    @endforeach
                    <!-- Best Selling Product End -->
                </div>
                <div class="col-md-3">
                    <!-- Home-2 Best Seller Product Start -->
                    <div class="best-selling-items border-default universal-padding">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="group-title">
                                    <h2>Best Seller</h2>
                                </div>
                            </div>
                        </div>
                        <div class="best-seller-unique owl-carousel">
                            <!-- Best Seller Multi Product Start -->
                            <div class="best-seller-multi-product">
                            @foreach($bestSellingProduct as $items)
                                <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{url('/product-details/'.$items->id)}}">
                                                <img class="primary-img" src="{{asset($items->product_image)}}" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="{{url('/product-details/'.$items->id)}}">{{$items->product_name}}</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p><span class="price">৳ {{$items->product_price-($items->product_price*$items->product_discount/100)}}</span>
                                                @if($items->product_discount>0)
                                                    <del class="prev-price">{{$items->product_price}}</del>
                                                @endif
                                            </p>  </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->
                            @endforeach
                            <!-- Single Product End -->
                            </div>

                            <!-- Best Seller Multi Product End -->
                        </div>
                    </div>
                    <!-- Home-2 Best Seller Product End -->
                    <!-- Single Banner Start -->
                    <div class="single-banner zoom mtb-40">
                        <a class="visible-lg visible-md" href="#"><img src="{{asset('fontAsset/')}}/img/banner/banner5.jpg" alt="slider-banner"></a>
                        <a class="hidden-lg hidden-md" href="#"><img src="{{asset('fontAsset/')}}/img/banner/5.jpg" alt="slider-banner"></a>
                    </div>
                    <!-- Single Banner End -->
                    <!-- Home-2 Best Seller Product Start -->
                    <div class="best-selling-items border-default universal-padding">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="group-title">
                                    <h2>Most Viewed</h2>
                                </div>
                            </div>
                        </div>
                        <div class="best-seller-unique owl-carousel">
                            <!-- Best Seller Multi Product Start -->
                            <div class="best-seller-multi-product">
                                <!-- Single Product Start -->
                                @foreach($MostViewProducts as $MostViewProduct)
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{url('/brand-product-details/'.$MostViewProduct->id)}}">
                                                <img class="primary-img" src="{{url($MostViewProduct->product_image)}}" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="{{url('/brand-product-details/'.$MostViewProduct->id)}}">{{$MostViewProduct->product_name}}</a></h4>
                                            View: {{$MostViewProduct->view}}
                                            <p><span class="price">৳ {{$MostViewProduct->product_price-($MostViewProduct->product_price*$MostViewProduct->product_discount/100)}}</span>
                                                @if($MostViewProduct->product_discount>0)
                                                    <del class="prev-price">{{$MostViewProduct->product_price}}</del>
                                                @endif
                                            </p>

                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                @endforeach

                            <!-- Single Product End -->
                            </div>
                            <!-- Best Seller Multi Product End -->
                            <!-- Best Seller Multi Product Start -->
                            <div class="best-seller-multi-product">
                                <!-- Single Product Start -->
                                @foreach($MostViewProductsTwo as $MostViewProduct)
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{url('/brand-product-details/'.$MostViewProduct->id)}}">
                                                <img class="primary-img" src="{{url($MostViewProduct->product_image)}}" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="{{url('/brand-product-details/'.$MostViewProduct->id)}}">{{$MostViewProduct->product_name}}</a></h4>
                                            View: {{$MostViewProduct->view}}
                                            <p><span class="price">৳ {{$MostViewProduct->product_price-($MostViewProduct->product_price*$MostViewProduct->product_discount/100)}}</span>
                                                @if($MostViewProduct->product_discount>0)
                                                    <del class="prev-price">{{$MostViewProduct->product_price}}</del>
                                                @endif
                                            </p>

                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                            @endforeach
                                <!-- Single Product End -->
                            </div>
                            <!-- Best Seller Multi Product End -->
                        </div>
                    </div>
                    <!-- Home-2 Best Seller Product End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Under Main Wrapper Content End -->
    <!-- Popular Categorie Start -->
    <div class="popular-categorie pb-50">
        <div class="container">
            <div class="border-default universal-padding">
                <div class="group-title">
                    <h2>Popular Categories</h2>
                </div>
                <div class="row" style="margin-top: 60px">
                    @foreach($popularCategories as $category)
                    <!-- Single Categorie Start -->
                    <div class="col-md-3 col-sm-6">
                        <div class="single-categorie">
                            <div class="categorie-img">
                                <a href="#"><img src="{{asset($category->category_image)}}" class="thumbnail" height="133px" width="260px" alt="categorie-image"></a>
                            </div>
                            <div class="categorie-content">
                                <h3>{{$category->category_name}}</h3>
                                <div class="cat-content-list text-capitalize">
                                    <p>{{$category->category_description}}</p>
                                </div>
                                <a class="cat-link" href="">View more</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Categorie End -->
                   @endforeach
                </div>
                <!-- Row End -->
                <!-- Row End -->
            </div>
        </div>
        <!-- Container End -->
    </div>
    <div class="popular-categorie pb-50">
        <div class="container">
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
        </div>
    </div>
    <!-- Popular Categorie End -->
    <!-- Random Products Start -->
    <div class="random-product pb-50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="border-default universal-padding">
                        <div class="group-title">
                            <h2>Random products</h2>
                        </div>
                        <!-- Random Product Activation Start -->
                        <div class="random-pro-active owl-carousel slider-right-content">
                            <!-- Double Product Start -->
                            @foreach($RandomProducts as $randomProduct)
                                <div class="double-pro">
                                    <!-- Single Product Start -->
                                    <div class="single-product" style="border-right: 1px solid #eee;">
                                        <div class="pro-img">
                                            <a href="{{url('/brand-product-details/').$randomProduct->id}}"><img class="img" src="{{$randomProduct->product_image}}" alt="product-image"></a>
                                        </div>
                                        <div class="pro-content" style="padding-left: 5px;">
                                            <h4><a href="{{url('/brand-product-details/').$randomProduct->id}}">{{$randomProduct->product_name}}</a></h4>

                                            <p><span class="price"> ৳ {{$randomProduct->product_price}}</span></p><br>
                                            <div class="actions-primary">
                                                <a href="{{url('/brand-product-details/'.$randomProduct->id)}}" data-toggle="tooltip" title="Show Details">Show Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                        @endforeach
                        <!-- Double Product End -->
                        </div>
                        <!-- Random Product Activation End -->
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Random Products End -->

@endsection