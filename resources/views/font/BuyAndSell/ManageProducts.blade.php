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
                        <a href="#"><img src="{{asset('/fontAsset')}}/img/banner/banner6.jpg" alt="slider-banner"></a>
                    </div>
                    <!-- Single Banner End -->
                    <div class="tab-pane" id="products">
                        <br>
                        <h2 style="text-align: center">My Products</h2>

                        <hr>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Product Net price</th>
                                <th>Ordered Quantity</th>
                                <th>Posted At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($ManageCustomerProducts as $ManageCustomerProduct)
                                <tr class="odd gradeX">
                                    <td>{{$ManageCustomerProduct->id}}</td>
                                    <td>{{$ManageCustomerProduct->product_name}}</td>
                                    <td><img src="{{$ManageCustomerProduct->product_image}}" height="50px" width="50px"/> </td>
                                    <td>{{$ManageCustomerProduct->product_price}}</td>
                                    <td>{{$ManageCustomerProduct->product_quantity}}</td>
                                    <td>{{$ManageCustomerProduct->created_at}}</td>
                                    <td>
                                        @if($ManageCustomerProduct->status ==1)
                                            <a href="{{ url('/disabled-buy&sell-product/'.$ManageCustomerProduct->id) }}" onclick="return confirm('Are you sure??')"  class="btn btn-danger btn-xs" title="Delete Product">
                                                <span class="glyphicon glyphicon-trash" ></span>
                                            </a>
                                        @endif

                                        <a href="{{ url('/edit-buy&sell-product/'.$ManageCustomerProduct->id) }}" class="btn btn-primary btn-xs" title="View Product">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            <!-- Trigger the modal with a button -->

                            </tbody>
                        </table>
                    </div><!--/tab-pane-->

                </div>
                <!-- product Categorie List End -->
                <!-- Sidebar Shopping Option Start -->
                <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9">
                    <div class="sidebar white-bg">
                        <div class="border-default universal-padding" style="background-color: #546B82;margin-bottom: 30px">

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
                        <div class="border-default universal-padding">
                            <div class="group-title">
                                <h2>Compare Products</h2>
                            </div>
                            <div class="best-seller-pro-two compare-pro best-seller-pro-two owl-carousel">
                                <!-- Best Seller Multi Product Start -->
                                <div class="best-seller-multi-product">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{url('/item-details')}}">
                                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/17.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="{{url('/item-details')}}">Set of Sprite Yoga Straps</a></h4>
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
                                </div>
                                <!-- Best Seller Multi Product End -->
                                <!-- Best Seller Multi Product Start -->
                                <div class="best-seller-multi-product">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{url('/item-details')}}">
                                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/16.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="{{url('/item-details')}}">Strive Shoulder Pack</a></h4>
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
                                <!-- Best Seller Multi Product Start -->
                                <div class="best-seller-multi-product">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{url('/item-details')}}">
                                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/17.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="{{url('/item-details')}}">Set of Sprite Yoga Straps</a></h4>
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
                                </div>
                                <!-- Best Seller Multi Product End -->
                            </div>
                        </div>
                        <div class="border-default universal-padding mtb-40">
                            <div class="group-title">
                                <h2>My Wish List</h2>
                            </div>
                            <div class="best-seller-pro-two compare-pro best-seller-pro-two owl-carousel">
                                <!-- Best Seller Multi Product Start -->
                                <div class="best-seller-multi-product">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{url('/item-details')}}">
                                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/11.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="{{url('/item-details')}}">Push It Messenger Bag</a></h4>
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
                                </div>
                                <!-- Best Seller Multi Product End -->
                                <!-- Best Seller Multi Product Start -->
                                <div class="best-seller-multi-product">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{url('/item-details')}}">
                                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/14.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="{{url('/item-details')}}">Strive Shoulder Pack</a></h4>
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
                                <!-- Best Seller Multi Product Start -->
                                <div class="best-seller-multi-product">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{url('/item-details')}}">
                                                <img class="primary-img" src="{{asset('/fontAsset')}}/img/products/17.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="{{url('/item-details')}}">Set of Sprite Yoga Straps</a></h4>
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
                                </div>
                                <!-- Best Seller Multi Product End -->
                            </div>
                        </div>
                        <!-- Single Banner Start -->
                        <div class="single-banner zoom mb-50">
                            <a href="#" class="hidden-sm"><img src="{{asset('/fontAsset')}}/img/banner/8.jpg" alt="slider-banner"></a>
                            <a href="#" class="visible-sm"><img src="{{asset('/fontAsset')}}/img/banner/6.jpg" alt="slider-banner"></a>
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
        <div class="brand-banner border-default owl-carousel pt-30 mt-30 mb-50">
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