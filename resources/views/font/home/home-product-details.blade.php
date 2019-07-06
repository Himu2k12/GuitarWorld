@extends('font.master')
@section('content')


    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li class="active"><a href="{{url('/product-details/'.$productDetails->id)}}">Product</a></li>
                </ul>
            </div>
        </div>
        @if(!isset(Auth::user()->id))
            <div class="alert alert-danger" style="text-align: center">
                <strong style="text-align: center">Please Login to Add product in the Cart</strong>
            </div>
        @endif
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
                            <a data-fancybox="images" href="{{asset($productDetails->product_image)}}"><img src="{{asset($productDetails->product_image)}}" alt="product-view"></a>
                        </div>
                        <div id="thumb2" class="tab-pane fade">
                            <a data-fancybox="images" href="{{asset($productDetails->product_image)}}"><img src="{{asset($productDetails->product_image)}}" alt="product-view"></a>
                        </div>
                        <div id="thumb3" class="tab-pane fade">
                            <a data-fancybox="images" href="{{asset('/fontAsset/')}}/img/products/3.jpg"><img src="{{asset('/fontAsset/')}}/img/products/3.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb4" class="tab-pane fade">
                            <a data-fancybox="images" href="{{asset('/fontAsset/')}}/img/products/4.jpg"><img src="{{asset('/fontAsset/')}}/img/products/4.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb5" class="tab-pane fade">
                            <a data-fancybox="images" href="{{asset('/fontAsset/')}}/img/products/5.jpg"><img src="{{asset('/fontAsset/')}}/img/products/5.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb6" class="tab-pane fade">
                            <a data-fancybox="images" href="{{asset('/fontAsset/')}}/img/products/6.jpg"><img src="{{asset('/fontAsset/')}}/img/products/6.jpg" alt="product-view"></a>
                        </div>
                    </div>
                    <!-- Thumbnail Large Image End -->

                    <!-- Thumbnail Image End -->
                    <div class="product-thumbnail">
                        <div class="thumb-menu owl-carousel">
                            <div class="active">
                                <a data-toggle="tab" href="#thumb1"> <img src="{{asset($productDetails->product_image)}}" alt="product-thumbnail"></a>
                            </div>
                            <div>
                                <a data-toggle="tab" href="#thumb2"> <img src="{{asset('/fontAsset/')}}/img/products/2.jpg" alt="product-thumbnail"></a>
                            </div>
                            <div>
                                <a data-toggle="tab" href="#thumb3"> <img src="{{asset('/fontAsset/')}}/img/products/3.jpg" alt="product-thumbnail"></a>
                            </div>
                            <div>
                                <a data-toggle="tab" href="#thumb4"> <img src="{{asset('/fontAsset/')}}/img/products/4.jpg" alt="product-thumbnail"></a>
                            </div>
                            <div>
                                <a data-toggle="tab" href="#thumb5"> <img src="{{asset('/fontAsset/')}}/img/products/5.jpg" alt="product-thumbnail"></a>
                            </div>
                            <div>
                                <a data-toggle="tab" href="#thumb6"> <img src="{{asset('/fontAsset/')}}/img/products/6.jpg" alt="product-thumbnail"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Thumbnail image end -->
                </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-sm-7">
                    <div class="thubnail-desc fix">
                        <h3 class="product-header">{{$productDetails->product_name}}</h3>
                        <div class="rating-summary fix mtb-10">

                        </div>
                        <div class="pro-price mb-10">
                            <p><span class="price">৳ {{$productDetails->product_price-($productDetails->product_price*$productDetails->product_discount/100)}}</span>
                                @if($productDetails->product_discount>0)
                                    <del class="prev-price">{{$productDetails->product_price}}</del>
                                @endif
                            </p>
                        </div>
                        <div class="pro-ref mb-15">
                            @if($productDetails->product_quantity> 0)
                                <p><span class="in-stock">IN STOCK</span><span class="sku">Product Code:</span>{{$productDetails->product_code}}<span></span></p>
                            @else
                                <p><span class="in-stock" style="color: red">OUT OF STOCK</span><span class="sku">Product Code:</span>{{$productDetails->product_code}}<span></span></p>
                            @endif
                        </div>
                        <div class="box-quantity">


                                <input  class="proQty" id="qty" min="1" max="{{$productDetails->product_quantity}}" onblur="checkQty({{$productDetails->product_quantity}})" name="quantity" type="number" value="1" />
                                <input name="product_id" id="productID" type="hidden" value="{{$productDetails->id}}">
                                <input id="productQty" type="hidden" value="{{$productDetails->product_quantity}}">
                                @if($productDetails->uid!=Auth::user()->id)
                                @if($productDetails->product_quantity> 0 && isset(Auth::user()->id))
                                    <button class="btn btn-primary" onclick="AddtoCart()">Add To Cart</button>
                                @else
                                <button class="btn btn-primary" disabled >Add To Cart</button>
                                @endif
                                    @endif


                        </div>
                        <div class="product-link">
                            <ul class="list-inline">
                                <li><a href="{{url('/wishlist-new-product-customer/'.$productDetails->id)}}">Add to Wish List</a></li>
                                <li><a href="{{url('/add-to-compare-customer/'.$productDetails->id)}}">Add to compare</a></li>
                            </ul>
                        </div>
                        <p class="ptb-20">{{$productDetails->short_description}}</p>
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
                        <li><a data-toggle="tab" href="#review">Reviews 1</a></li>
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content border-default">
                        <div id="dtail" class="tab-pane fade in active">
                            <p></p>
                            <ul class="tab-list-item">
                                <li>Add By: <span> <b> {{$productDetails->name}}</b></span></li>
                                <li>Category Name:<span> <b> {{$productDetails->category_name}}</b></span></li>
                                <li>Available Product: <span> <b> {{$productDetails->product_quantity}}</b></span></li>
                                <li>Product Details: <span> <b> {{$productDetails->long_description}}</b></span></li>
                            </ul>
                        </div>
                        <div id="review" class="tab-pane fade">
                            <!-- Reviews Start -->
                            <div class="review border-default universal-padding">
                                <div class="group-title">
                                    <h2>customer review</h2>
                                </div>
                                <h4 class="review-mini-title">Bigon</h4>
                                <ul class="review-list">
                                    <!-- Single Review List Start -->
                                    <li>
                                        <span>Quality</span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <label>Bigon</label>
                                    </li>
                                    <!-- Single Review List End -->
                                    <!-- Single Review List Start -->
                                    <li>
                                        <span>price</span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <label>Review by <a href="https://themeforest.net/user/Bigon">Bigon</a></label>
                                    </li>
                                    <!-- Single Review List End -->
                                    <!-- Single Review List Start -->
                                    <li>
                                        <span>value</span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <label>Posted on 7/20/18</label>
                                    </li>
                                    <!-- Single Review List End -->
                                </ul>
                            </div>
                            <!-- Reviews End -->
                            <!-- Reviews Start -->
                            <div class="review border-default universal-padding mt-30">
                                <h2 class="review-title mb-30">You're reviewing: <br><span>Go-Get'r Pushup Grips</span></h2>
                                <p class="review-mini-title">your rating</p>
                                <ul class="review-list">
                                    <!-- Single Review List Start -->
                                    <li>
                                        <span>Quality</span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </li>
                                    <!-- Single Review List End -->
                                    <!-- Single Review List Start -->
                                    <li>
                                        <span>price</span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </li>
                                    <!-- Single Review List End -->
                                    <!-- Single Review List Start -->
                                    <li>
                                        <span>value</span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </li>
                                    <!-- Single Review List End -->
                                </ul>
                                <!-- Reviews Field Start -->
                                <div class="riview-field mt-40">
                                    <form autocomplete="off" action="#">
                                        <div class="form-group">
                                            <label class="req" for="sure-name">Nickname</label>
                                            <input type="text" class="form-control" id="sure-name" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="req" for="subject">Summary</label>
                                            <input type="text" class="form-control" id="subject" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="req" for="comments">Review</label>
                                            <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                                        </div>
                                        <button type="submit" class="btn-submit">Submit Review</button>
                                    </form>
                                </div>
                                <!-- Reviews Field Start -->
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
                    @foreach($relatedProducts->RelatedProduct($productDetails->category_id) as $relatedProduct)

                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="{{url('/product-details/'.$relatedProduct->id)}}">
                                <img class="primary-img" src="{{url($relatedProduct->product_image)}}" alt="single-product">
                                <img class="secondary-img" src="{{url($relatedProduct->product_image)}}" alt="single-product">
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content"><br>
                            <h4><a href="{{url('/product-details'.$relatedProduct->id)}}">{{$relatedProduct->product_name}}</a></h4>
                            <div class="product-rating">
                                ({{$relatedProduct->role}})
                            </div>
                            <p><span class="price">৳ {{$relatedProduct->product_price}}</span>
                                @if($relatedProduct->product_discount>0)
                                    <del class="prev-price">৳ {{$relatedProduct->product_price}}</del>
                                @endif
                            </p>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="{{url('/product-details/'.$relatedProduct->id)}}" data-toggle="tooltip" title="Show Details">Show Details</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="{{url('/wishlist-new-product-customer/')}}/{{$relatedProduct->id}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="{{url('/add-to-compare-customer')}}/{{$relatedProduct->id}}" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        @if($relatedProduct->product_discount>0)
                        <span class="sticker-new">OFF-{{$relatedProduct->product_discount}}%</span>
                            @endif
                    </div>
                    <!-- Single Product End -->
                    @endforeach
                </div>
                <!-- Realted Product Activation End -->
            </div>
        </div>
    </div>
    <!-- Realted Product End -->

@endsection
