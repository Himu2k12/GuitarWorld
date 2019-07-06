@extends('font.master')
@section('content')
    <script>
        var min= '<?php echo $productDetails->product_sell_number  ?>'
        var max= '<?php echo $productDetails->product_quantity  ?>'

    </script>

    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/brand-home')}}">Home</a></li>
                    <li class="active"><a href="{{url('/brand-product-details/'.$productDetails->id)}}">Product</a></li>
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
                            <a data-fancybox="images" href="{{asset($productDetails->product_image)}}"><img src="{{asset($productDetails->product_image)}}" alt="product-view"></a>
                        </div>
                        <div id="thumb2" class="tab-pane fade">
                            <a data-fancybox="images" href="{{asset($productDetails->product_image)}}"><img src="{{asset($productDetails->product_image)}}" alt="product-view"></a>
                        </div>
                        <div id="thumb3" class="tab-pane fade">
                            <a data-fancybox="images" href="img/products/3.jpg"><img src="img/products/3.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb4" class="tab-pane fade">
                            <a data-fancybox="images" href="img/products/4.jpg"><img src="img/products/4.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb5" class="tab-pane fade">
                            <a data-fancybox="images" href="img/products/5.jpg"><img src="img/products/5.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb6" class="tab-pane fade">
                            <a data-fancybox="images" href="img/products/6.jpg"><img src="img/products/6.jpg" alt="product-view"></a>
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
                                <a data-toggle="tab" href="#thumb2"> <img src="img/products/2.jpg" alt="product-thumbnail"></a>
                            </div>
                            <div>
                                <a data-toggle="tab" href="#thumb3"> <img src="img/products/3.jpg" alt="product-thumbnail"></a>
                            </div>
                            <div>
                                <a data-toggle="tab" href="#thumb4"> <img src="img/products/4.jpg" alt="product-thumbnail"></a>
                            </div>
                            <div>
                                <a data-toggle="tab" href="#thumb5"> <img src="img/products/5.jpg" alt="product-thumbnail"></a>
                            </div>
                            <div>
                                <a data-toggle="tab" href="#thumb6"> <img src="img/products/6.jpg" alt="product-thumbnail"></a>
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
                            @if($productDetails->product_quantity> $productDetails->product_sell_number)
                                <p><span class="in-stock">IN STOCK</span><span class="sku">Product Code:</span>{{$productDetails->product_code}}<span></span></p>
                            @else
                                <p><span class="in-stock" style="color: red">OUT OF STOCK</span><span class="sku">Product Code:</span>{{$productDetails->product_code}}<span></span></p>
                            @endif
                                  </div>
                        <div class="box-quantity">
                            <form action="{{url('/add-to-cart')}}" method="post">
                                {{csrf_field()}}
                                <input required class="number" id="qty" onblur="return checkQty(min,max);" name="quantity" type="number" min="{{$productDetails->product_sell_number}}" max="{{$productDetails->product_quantity}}" value="{{$productDetails->product_sell_number}}">
                                <input name="product_id" type="hidden" value="{{$productDetails->id}}">
                                @if($productDetails->brand_id!=Auth::user()->id)
                                @if($productDetails->product_quantity> $productDetails->product_sell_number)
                                    <input class="btn btn-primary" style="background-color: #a4d9ff; width: 100px" type="submit" value="Add To Cart">
                                @else
                                    <input class="btn btn-primary" disabled style="background-color: #a4d9ff; width: 100px" type="submit" value="Add To Cart">
                                @endif
                                    @endif

                            </form>
                        </div>
                        <div class="product-link">
                            <ul class="list-inline">
                                <li><a href="{{url('/wishlist-new-product/'.$productDetails->id)}}">Add to Wish List</a></li>
                                <li><a href="{{url('/add-to-compare/'.$productDetails->id)}}">Add to compare</a></li>
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
                                <li>Brand Name: <span> <b> {{$brandName->name}}</b></span></li>
                                <li>Category Name:<span> <b> {{$CategoryName->category_name}}</b></span></li>
                                <li>Product Quantity: <span> <b> {{$productDetails->product_quantity}}</b></span></li>
                                <li>Product Warranty: <span> <b> {{$productDetails->product_warranty}} Month</b></span></li>
                                <li>Product Minimum Sell Amount(In Pieces): <span> <b> {{$productDetails->product_sell_number}}</b></span></li>
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
                    @foreach($relatedProducts->RelatedBrandProducts($productDetails->category_id) as $relatedProduct)

                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="{{url('/brand-product-details'.$relatedProduct->id)}}">
                                    <img class="primary-img" src="{{url($relatedProduct->product_image)}}" height="192px" alt="single-product">
                                    <img class="secondary-img" src="{{url($relatedProduct->product_image)}}" alt="single-product">
                                </a>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content">
                                <br>
                                <h4><a href="{{url('/brand-product-details'.$relatedProduct->id)}}">{{$relatedProduct->product_name}}</a></h4>
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
                                        <a href="{{url('/brand-product-details/'.$relatedProduct->id)}}" data-toggle="tooltip" title="Show Details">Show Details</a>
                                    </div>
                                    <div class="actions-secondary">
                                        <a href="{{url('/wishlist-new-product/')}}/{{$relatedProduct->id}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                        <a href="{{url('/add-to-compare')}}/{{$relatedProduct->id}}" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
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
    <!-- Categorie Page Brand Banner Start -->
    <div class="container">
        <!-- Brand Banner Start -->
        <div class="brand-banner border-default owl-carousel pt-30 mb-50">
            <div class="single-brand">
                <a href="#"><img class="img" src="img/brand/1.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/2.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/3.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/4.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/1.png" alt="brand-image"></a>
            </div>
        </div>
        <!-- Brand Banner End -->
    </div>
    <!-- Categorie Page Brand Banner End -->
    <!-- Signup Newsletter Start -->


@endsection