@extends('font.master')
@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="">Items</a></li>
                    <li class="active"><a href="">Product</a></li>
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
                    <div class="tab-content">
                        <div id="thumb1" class="tab-pane fade in active">
                            <a data-fancybox="images" href="{{asset($CustomerProduct->product_image)}}"><img src="{{asset($CustomerProduct->product_image)}}" alt="product-view"></a>
                        </div>
                        <div id="thumb2" class="tab-pane fade">
                            <a data-fancybox="images" href="{{asset('/fontAsset')}}/img/products/2.jpg"><img src="{{asset('/fontAsset')}}/img/products/2.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb3" class="tab-pane fade">
                            <a data-fancybox="images" href="{{asset('/fontAsset')}}/img/products/3.jpg"><img src="{{asset('/fontAsset')}}/img/products/3.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb4" class="tab-pane fade">
                            <a data-fancybox="images" href="{{asset('/fontAsset')}}/img/products/4.jpg"><img src="{{asset('/fontAsset')}}/img/products/4.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb5" class="tab-pane fade">
                            <a data-fancybox="images" href="{{asset('/fontAsset')}}/img/products/5.jpg"><img src="{{asset('/fontAsset')}}/img/products/5.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb6" class="tab-pane fade">
                            <a data-fancybox="images" href="{{asset('/fontAsset')}}/img/products/6.jpg"><img src="{{asset('/fontAsset')}}/img/products/6.jpg" alt="product-view"></a>
                        </div>
                    </div>
                    <!-- Thumbnail Large Image End -->

                    </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-sm-7">
                    <div class="thubnail-desc fix">
                        <h3 class="product-header">{{$CustomerProduct->product_name}}</h3><br>

                        <div class="pro-price mb-10">
                            <p><span class="price">{{$CustomerProduct->product_price-($CustomerProduct->product_price*$CustomerProduct->product_discount/100)}}</span><del class="prev-price">{{$CustomerProduct->product_price}}</del></p>
                        </div>
                        <div class="pro-ref mb-15">
                            @if($CustomerProduct->product_quantity> 0)
                                <p><span class="in-stock">IN STOCK</span><span class="sku">Product Code:</span>{{$CustomerProduct->product_code}}<span></span></p>
                            @else
                                <p><span class="in-stock" style="color: red">OUT OF STOCK</span><span class="sku">Product Code:</span>{{$CustomerProduct->product_code}}<span></span></p>
                            @endif </div>
                        <div class="box-quantity">

                                <input class="number" id="qty"  name="quantity" type="number" min=1 max="{{$CustomerProduct->product_quantity}}" value="1">
                                <input name="product_id" id="productID" type="hidden" value="{{$CustomerProduct->id}}">
                            @if($CustomerProduct->uid!=Auth::user()->id)
                                @if($CustomerProduct->product_quantity> 0 && isset(Auth::user()->id))
                                    <button class="btn btn-primary" onclick="AddtoCart()">Add To Cart</button>
                                @else
                                    <button class="btn btn-primary" disabled >Add To Cart</button>
                                @endif
                            @endif

                        </div>
                        <div class="product-link">
                            <ul class="list-inline">
                                <li><a href="{{url('/wishlist-new-product/'.$CustomerProduct->id)}}">Add to Wish List</a></li>
                                <li><a href="{{url('/add-to-compare/'.$CustomerProduct->id)}}">Add to compare</a></li>
                                <li><a href="#">Share</a></li>
                            </ul>
                        </div>
                        <p class="ptb-20">{{$CustomerProduct->long_description}}</p>
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail End -->
    <!-- Product Thumbnail Description Start -->
    <div class="thumnail-desc pb-50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="main-thumb-desc">
                        <li class="active"><a data-toggle="tab" href="#dtail">Details</a></li>
                        <li><a data-toggle="tab" href="#review">Contact</a></li>
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content border-default">

                        <div id="dtail" class="tab-pane fade in active">
                            <div class="group-title">
                                <h2>Product Details</h2>
                            </div>
                            <h4 class="review-mini-title">Guitar World Buy and Sell</h4>
                            <ul class="review-list">
                                <!-- Single Review List Start -->
                                <li>
                                    <span>Add By</span>

                                    <label>{{$CustomerProduct->name}}</label>
                                </li>
                                <br>
                                <li>
                                    <span>Publish On</span>

                                    <label>{{$CustomerProduct->created_at}}</label>
                                </li>
                                <br>
                                <li>
                                    <span>Discount</span>

                                    <label>{{$CustomerProduct->product_discount}}%</label>
                                </li>
                                <br>
                                <li>
                                    <span>Category Name</span>

                                    <label>{{$CustomerProduct->category_name}}</label>
                                </li>
                                <br>
                                <li>
                                    <span>Product Quantity</span>

                                    <label>{{$CustomerProduct->product_quantity}}</label>
                                </li>
                                <br>
                                <li>
                                    <span>Product Details</span>

                                    <label>{{$CustomerProduct->short_description}}</label>
                                </li>
                                <br>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                </ul>
                        </div>
                        <div id="review" class="tab-pane fade">
                            <!-- Reviews Start -->
                            <div class="review border-default universal-padding">
                                <div class="group-title">
                                    <h2>Contact Details</h2>
                                </div>
                                <h4 class="review-mini-title">Guitar World Buy and Sell</h4>
                                <ul class="review-list">
                                    <!-- Single Review List Start -->
                                    <li>
                                        <span>Name</span>

                                        <label>{{$CustomerProduct->pname}}</label>
                                    </li>
                                    <!-- Single Review List End -->
                                    <!-- Single Review List Start -->
                                    <li>
                                        <span>Phone</span>

                                        <label>{{$CustomerProduct->pphone}}</label>
                                    </li>
                                    <!-- Single Review List End -->
                                    <!-- Single Review List Start -->
                                    <li>
                                        <span>Address 1</span>

                                        <label>{{$CustomerProduct->paddress1}}</label>
                                    </li>
                                    <li>
                                        <span>Address 2</span>

                                        <label>{{$CustomerProduct->paddress2}}</label>
                                    </li>
                                    <li>
                                        <span>Town</span>

                                        <label>{{$CustomerProduct->ptown}}</label>
                                    </li>
                                    <li>
                                        <span>State</span>

                                        <label>{{$CustomerProduct->pstate}}</label>
                                    </li>
                                    <li>
                                        <span>Post Code</span>

                                        <label>{{$CustomerProduct->ppostcode}}</label>
                                    </li>
                                    <!-- Single Review List End -->
                                </ul>
                            </div>
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
    <!-- Realted Product Start -->
    <div class="related-product mb-50">
        <div class="container">
            <div class="border-default universal-padding">
                <div class="group-title">
                    <h2>related product</h2>
                </div>
                <!-- Realted Product Activation Start -->
                <div class="new-pro-active new-upsell-pro owl-carousel">
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/8.jpg" alt="single-product">
                                <img class="secondary-img" src="{{asset('/fontAsset')}}/img/products/10.jpg" alt="single-product">
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <h4><a href="product.html">Push It Messenger Bag</a></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-new">OFF-32%</span>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/9.jpg" alt="single-product">
                                <img class="secondary-img" src="{{asset('/fontAsset')}}/img/products/15.jpg" alt="single-product">
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <h4><a href="product.html">Endeavor Daytrip Backpack</a></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p><span class="price">$30.00</span><del class="prev-price">$33.00</del></p>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-new">OFF-32%</span>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/12.jpg" alt="single-product">
                                <img class="secondary-img" src="{{asset('/fontAsset')}}/img/products/13.jpg" alt="single-product">
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <h4><a href="product.html">Impulse Duffle</a></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-new">OFF-32%</span>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/1.jpg" alt="single-product">
                                <img class="secondary-img" src="{{asset('/fontAsset')}}/img/products/8.jpg" alt="single-product">
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <h4><a href="product.html">Voyage Yoga Bag</a></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-new">OFF-32%</span>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/2.jpg" alt="single-product">
                                <img class="secondary-img" src="{{asset('/fontAsset')}}/img/products/11.jpg" alt="single-product">
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <h4><a href="product.html">Wayfarer Messenger Bag</a></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-sale">OFF-32%</span>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/7.jpg" alt="single-product">
                                <img class="secondary-img" src="{{asset('/fontAsset')}}/img/products/6.jpg" alt="single-product">
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <h4><a href="product.html">Push It Messenger Bag</a></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-new">OFF-32%</span>
                    </div>
                    <!-- Single Product End -->
                </div>
                <!-- Realted Product Activation End -->
            </div>
        </div>
    </div>
    <!-- Realted Product End -->
    <!-- Upsell Product Start -->
    <div class="related-product mb-50">
        <div class="container">
            <div class="border-default universal-padding">
                <div class="group-title">
                    <h2>upsell product</h2>
                </div>
                <!-- Upsell Product Activation Start -->
                <div class="new-pro-active new-upsell-pro owl-carousel">
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/17.jpg" alt="single-product">
                                <img class="secondary-img" src="{{asset('/fontAsset')}}/img/products/18.jpg" alt="single-product">
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
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/16.jpg" alt="single-product">
                                <img class="secondary-img" src="{{asset('/fontAsset')}}/img/products/2.jpg" alt="single-product">
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
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-new">OFF-0%</span>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/7.jpg" alt="single-product">
                                <img class="secondary-img" src="{{asset('/fontAsset')}}/img/products/6.jpg" alt="single-product">
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <h4><a href="product.html">Crown Summit Backpack</a></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p><span class="price">$52.00</span></p>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-new">OFF-0%</span>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/13.jpg" alt="single-product">
                                <img class="secondary-img" src="{{asset('/fontAsset')}}/img/products/4.jpg" alt="single-product">
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
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-sale">new</span>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/1.jpg" alt="single-product">
                                <img class="secondary-img" src="{{asset('/fontAsset')}}/img/products/8.jpg" alt="single-product">
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <h4><a href="product.html">Fusion Backpack</a></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p><span class="price">$38.00</span><del class="prev-price">$45.00</del></p>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-sale">new</span>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/2.jpg" alt="single-product">
                                <img class="secondary-img" src="{{asset('/fontAsset')}}/img/products/16.jpg" alt="single-product">
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <h4><a href="product.html">Strive Shoulder Pack</a></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p><span class="price">$44.00</span></p>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-new">OFF-0%</span>
                    </div>
                    <!-- Single Product End -->
                </div>
                <!-- Upsell Product Activation End -->
            </div>
        </div>
    </div>
    <!-- Upsell Product End -->
    <!-- Categorie Page Brand Banner Start -->
    <div class="container">
        <!-- Brand Banner Start -->
        <div class="brand-banner border-default owl-carousel pt-30 mb-50">
            <div class="single-brand">
                <a href="#"><img class="img" src="{{asset('/fontAsset')}}/img/brand/1.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="{{asset('/fontAsset')}}/img/brand/2.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="{{asset('/fontAsset')}}/img/brand/3.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="{{asset('/fontAsset')}}/img/brand/4.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="{{asset('/fontAsset')}}/img/brand/1.png" alt="brand-image"></a>
            </div>
        </div>
        <!-- Brand Banner End -->
    </div>
    <!-- Categorie Page Brand Banner End -->

@endsection