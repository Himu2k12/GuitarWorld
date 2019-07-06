@extends('font.master')

@section('content')
    <!-- Slider Area Start -->
    <div class="slider-area pb-50">
        <div class="slider-wrapper theme-default">
            <!-- Slider Background  Image Start-->
            <div id="slider" class="nivoSlider">
                <a href=""><img src="{{asset('fontAsset/')}}/img/slider/7.jpg" data-thumb="{{asset('fontAsset/')}}/img/slider/7.jpg" alt="" title="#htmlcaption" /></a>
                <a href=""><img src="{{asset('fontAsset/')}}/img/slider/8.jpg" data-thumb="{{asset('fontAsset/')}}/img/slider/8.jpg" alt="" title="#htmlcaption2" /></a>
            </div>
            <!-- Slider Background  Image Start-->
        </div>
    </div>
    <!-- Slider Area End -->
    <!-- Company Policy Start -->
    <div class="policy-style-two company-policy pb-50">
        <div class="container">
            <div class="main-policy">
                <div class="row">
                    <!-- Single Policy Start -->
                    <div class="col-md-3 col-sm-6">
                        <div class="policy-conditions">
                            <div class="single-policy po-1">
                                <div class="policy-desc">
                                    <h3>Free Delivery</h3>
                                    <p>Free shipping on all order</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Policy End -->
                    <!-- Single Policy Start -->
                    <div class="col-md-3 col-sm-6">
                        <div class="policy-conditions">
                            <div class="single-policy po-2">
                                <div class="policy-desc">
                                    <h3>Online Support 24/7</h3>
                                    <p>Support online 24 hours</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Policy End -->
                    <!-- Single Policy Start -->
                    <div class="col-md-3 col-sm-6">
                        <div class="policy-conditions">
                            <div class="single-policy po-3">
                                <div class="policy-desc">
                                    <h3>Money Return</h3>
                                    <p>Back guarantee under 7 days</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Policy End -->
                    <!-- Single Policy Start -->
                    <div class="col-md-3 col-sm-6">
                        <div class="policy-conditions">
                            <div class="single-policy po-4">
                                <div class="policy-desc">
                                    <h3>Member Discount</h3>
                                    <p>Onevery order over $30.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Policy End -->
                </div>
                <!-- Row End -->
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Company Policy End -->
    <!-- Slider Under Main Wrapper Content Start -->
    <div class="slider-under-content pb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
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
                                    <!-- Single Product Start -->
                                    @foreach($Products as $product)
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{url('/product-details/'.$product->id)}}">
                                                <img class="primary-img" src="{{asset($product->product_image)}}" height="150" alt="single-product">
                                                <img class="secondary-img" src="{{asset($product->product_image)}}" height="150" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content"><br>
                                            <h4><a href="{{url('/product-details/'.$product->id)}}">{{$product->product_name}}</a></h4>
                                           <p><span class="price">৳ {{$product->product_price-($product->product_price*$product->product_discount/100)}}</span>
                                                   @if($product->product_discount>0)
                                               <del class="prev-price">{{$product->product_price}}</del>
                                           @endif
                                           </p>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="{{url('/product-details/'.$product->id)}}" data-toggle="tooltip" title="Show Details">Show Details</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <a href="{{url('/wishlist-new-product-customer/')}}/{{$product->id}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a href="{{url('/add-to-compare-customer')}}/{{$product->id}}" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        @if($product->product_discount>0)
                                        <span class="sticker-new">OFF-{{$product->product_discount}}%</span>
                                            @endif
                                    </div>
                                    @endforeach
                                    <!-- Single Product End -->

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
                                            <a href="{{url('/product-details/'.$OnSaleProduct->id)}}">
                                                <img class="primary-img" src="{{url($OnSaleProduct->product_image)}}" alt="single-product">
                                                <img class="secondary-img" src="{{url($OnSaleProduct->product_image)}}" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="{{url('/product-details/'.$OnSaleProduct->id)}}">{{$OnSaleProduct->product_name}}</a></h4>

                                            <p><span class="price">৳ {{$OnSaleProduct->product_price-($OnSaleProduct->product_price*$OnSaleProduct->product_discount/100)}}</span><del class="prev-price">{{$OnSaleProduct->product_price}}</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="{{url('/product-details/'.$OnSaleProduct->id)}}" data-toggle="tooltip" title="Show Details">Show Details</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <a href="{{url('/wishlist-new-product-customer/')}}/{{$OnSaleProduct->id}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a href="{{url('/add-to-compare-customer')}}/{{$OnSaleProduct->id}}" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
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
                                    <!-- Single Product Start -->
                                    @foreach($featuredProducts as $featuredProduct)
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{$featuredProduct->id}}">
                                                <img class="primary-img" src="{{$featuredProduct->product_image}}" alt="single-product">
                                                <img class="secondary-img" src="{{$featuredProduct->product_image}}" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content"><br>
                                            <h4><a href="{{url('/product-details/'.$featuredProduct->id)}}">{{$featuredProduct->product_name}}</a></h4>

                                            <p><span class="price">৳ {{$featuredProduct->product_price-($featuredProduct->product_price*$featuredProduct->product_discount/100)}}
                                                    @if($featuredProduct->product_discount>0)
                                                    </span><del class="prev-price">{{$featuredProduct->product_price}}</del></p>
                                            @endif
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="{{url('/product-details/'.$featuredProduct->id)}}" data-toggle="tooltip" title="Show Details">Show Details</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <a href="{{url('/wishlist-new-product-customer/')}}/{{$featuredProduct->id}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a href="{{url('/add-to-compare-customer')}}/{{$featuredProduct->id}}" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->

                                    </div>
                                    @endforeach
                                    <!-- Single Product End -->
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
                        <a href="#"><img src="{{asset('fontAsset/')}}/img/banner/banner10.jpg" alt="slider-banner"></a>
                    </div>
                    <!-- Single Banner End -->
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
                                        @foreach($CategoryProducts->CustomerProducts($item->id) as $customerProduct)
                                            <!-- Double Product Start -->
                                                <div class="double-product">
                                                    <!-- Single Product Start -->
                                                    <div class="single-product">
                                                        <!-- Product Image Start -->
                                                        <div class="pro-img">
                                                            <a href="{{url('product-details/'.$customerProduct->id)}}">
                                                                <img class="primary-img" src="{{$customerProduct->product_image}}" height="160px" alt="single-product">
                                                                <img class="secondary-img" src="{{$customerProduct->product_image}}" height="160px" alt="single-product">
                                                            </a>
                                                        </div>
                                                        <!-- Product Image End -->
                                                        <!-- Product Content Start -->
                                                        <div class="pro-content" style="margin-top: 20px">
                                                            <h4><a href="">{{$customerProduct->product_name}}</a></h4>
                                                            <h6>({{$customerProduct->role}})</h6><br>

                                                            <p><span class="price">৳ {{$customerProduct->product_price}}</span></p>
                                                            <div class="pro-actions">
                                                                <div class="actions-primary">
                                                                    <a href="{{url('product-details/'.$customerProduct->id)}}" data-toggle="tooltip" title="View Details">View Details</a>
                                                                </div>
                                                                <div class="actions-secondary">

                                                                    <a href="{{url('/wishlist-new-product/'.$customerProduct->id)}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>


                                                                    <a href="{{url('/add-to-compare/'.$customerProduct->id)}}" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Product Content End -->
                                                        @if($customerProduct->product_quantity > 0)
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

                </div>
                <div class="col-md-3">
                    <!-- Home-2 Best Seller Product Start -->
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
                            <!-- Best Seller Multi Product Start -->
                            <div class="best-seller-multi-product">
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="{{asset('fontAsset/')}}/img/products/13.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Rival Field Messenger</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$54.00</span><del class="prev-price">$46.00</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="{{asset('fontAsset/')}}/img/products/18.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Set of Sprite Yoga Straps</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$38.00</span><del class="prev-price">$36.00</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="{{asset('fontAsset/')}}/img/products/17.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Set of Sprite Yoga Straps</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$38.00</span><del class="prev-price">$36.00</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="{{asset('fontAsset/')}}/img/products/16.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Strive Shoulder Pack</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$32.00</span></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
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
                                        <a href="{{url('/product-details/'.$MostViewProduct->id)}}">
                                            <img class="primary-img" src="{{url($MostViewProduct->product_image)}}" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{url('/product-details/'.$MostViewProduct->id)}}">{{$MostViewProduct->product_name}}</a></h4>
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
                                            <a href="{{url('/product-details/'.$MostViewProduct->id)}}">
                                                <img class="primary-img" src="{{url($MostViewProduct->product_image)}}" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="{{url('/product-details/'.$MostViewProduct->id)}}">{{$MostViewProduct->product_name}}</a></h4>
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
                <div class="row">
                    @foreach($categories as $category)
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
                    @endforeach
                    <!-- Single Categorie End -->
                </div>
                <!-- Row End -->
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
                <!-- Row End -->
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Popular Categorie End -->
    <!-- Blog Page Start -->
    <div class="blog pb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="border-default universal-padding">
                        <div class="group-title">
                            <h2>From Our Forum</h2>
                        </div>
                        <div class="row">
                            <!-- Popular Categorie Activation Start -->
                            <div class="popular-cat-active owl-carousel">
                                <!-- Dual Blog Start -->
                                <div class="dual-pop-pro">
                                    <!-- Single Blog Start -->
                                    @foreach($posts as $post)
                                        <div class="main-pop-cat col-xs-12">
                                            <div class="pop-cat-img">
                                                <a href="{{url('/post-description/'.$post->id)}}"><img src="{{$post->post_image}}" height="130px" width="200px" alt="blog-image"></a>
                                            </div>
                                            <div class="pop-cat-content">
                                                <h4><a href="blog-details.html">{{$post->post}}</a></h4>
                                                <span>{{$post->created_at}}</span>
                                                <a class="pop-link" href="{{url('/post-description/'.$post->id)}}">Read more</a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- Single Blog End -->
                                </div>
                                <!-- Dual Blog End -->
                                <!-- Dual Blog Start -->
                                <div class="dual-pop-pro">
                                    <!-- Single Blog Start -->
                                    @foreach($postsTwo as $post)
                                        <div class="main-pop-cat col-xs-12">
                                            <div class="pop-cat-img">
                                                <a href="{{url('/post-description/'.$post->id)}}"><img src="{{$post->post_image}}" height="130px" width="200px" alt="blog-image"></a>
                                            </div>
                                            <div class="pop-cat-content">
                                                <h4><a href="blog-details.html">{{$post->post}}</a></h4>
                                                <span>{{$post->created_at}}</span>
                                                <a class="pop-link" href="{{url('/post-description/'.$post->id)}}">Read more</a>
                                            </div>
                                        </div>
                                @endforeach
                                    <!-- Single Blog End -->
                                </div>
                                <!-- Dual Blog End -->
                                <!-- Dual Blog Start -->
                                <div class="dual-pop-pro">
                                    <!-- Single Blog Start -->
                                    @foreach($postsThree as $post)
                                    <div class="main-pop-cat col-xs-12">
                                        <div class="pop-cat-img">
                                            <a href="{{url('/post-description/'.$post->id)}}"><img src="{{$post->post_image}}" height="130px" width="200px" alt="blog-image"></a>
                                        </div>
                                        <div class="pop-cat-content">
                                            <h4><a href="blog-details.html">{{$post->post}}</a></h4>
                                            <span>{{$post->created_at}}</span>
                                            <a class="pop-link" href="{{url('/post-description/'.$post->id)}}">Read more</a>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- Single Blog End -->
                                </div>
                                <!-- Dual Blog End -->
                            </div>
                            <!-- Popular Categorie Activation End -->
                        </div>
                        <!-- Row End -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border-default main-testmonial universal-padding">
                        <div class="group-title">
                            <h2>WHAT THEY SAY</h2>
                        </div>
                        <!-- Blog Comments Activation Start -->
                        <div class="testimonial__container text-center">
                            <!-- Testmonial Text Start -->
                            <div class="testimonial__text__slide testext_active">
                                @foreach($artistPosts as $artistPost)
                                <div class="single-comments text-center">
                                    <p class="desc">"{{$artistPost->post}}"</p>
                                    <p class="email">{{$artistPost->email}}</p>
                                    <p><a class="name" href="#">{{$artistPost->name}} </a><span>@if(isset($artistPost->band_name)) {{$artistPost->band_name}} @endif </span></p>
                                </div>
                                    @endforeach

                            </div>
                            <!-- Testmonial Text End -->
                            <!-- Testmonial Image Start -->
                            <div class="tes__img__slide thumb_active">

                                @foreach($artistPosts as $artistPost)
                                    <div class="testimonial__img">
                                        <span><img src="{{asset($artistPost->artist_pp)}}" height="78px" class="img-circle" alt="testimonial image"></span>
                                    </div>
                                @endforeach

                            </div>
                            <!-- Testmonial Image End -->
                        </div>
                        <!-- Blog Comments Activation End -->
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Blog Page End -->
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
                                        <a href="{{url('/product-details/'.$randomProduct->id)}}"><img class="img" src="{{$randomProduct->product_image}}" alt="product-image"></a>
                                    </div>
                                    <div class="pro-content">
                                        <h4><a href="{{url('/product-details/'.$randomProduct->id)}}">{{$randomProduct->product_name}}</a></h4>

                                        <p><span class="price"> ৳ {{$randomProduct->product_price}}</span></p><br>
                                        <div class="actions-primary">
                                            <a href="{{url('/product-details/'.$randomProduct->id)}}" data-toggle="tooltip" title="Show Details">Show Details</a>
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
