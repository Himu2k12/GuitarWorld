@extends('font.master')
@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="wishlist.html">Wishlist</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Wish List Start -->
    <div class="cart-main-area wish-list pb-50">
        <div class="container">
            <!-- Section Title Start -->
            <h2 class="text-capitalize sub-heading">wishlist</h2>
            <!-- Section Title Start End -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <button id="button"> Clear Wishlist</button>
                    <!-- Form Start -->

                        <!-- Table Content Start -->
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-remove">Remove</th>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Unit Price</th>
                                    <th class="product-quantity">Stock Status</th>
                                    <th class="product-subtotal">add to cart</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlistProducts as $wishlistProduct)
                                <tr>

                                    <td class="product-remove"> <a href="{{url('/remove-wishlist-product/'.$wishlistProduct->rowId)}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="{{asset($wishlistProduct->options->ItemImage)}}" alt="cart-image" /></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{$wishlistProduct->name}}</a></td>
                                    <td class="product-price"><span class="amount">{{$wishlistProduct->price}}</span></td>
                                    <td class="product-stock-status"><span>@if($wishlistProduct->options->Items < $wishlistProduct->options->ItemsMinSell)out of stock @else In stock @endif</span></td>
                                    <td class="product-add-to-cart"><button onclick="AddtoCartfromCompare({{$wishlistProduct->id}})"><i class="fa fa-shopping-basket"></i></button></td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Content Start -->

                    <!-- Form End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Wish List End -->


@endsection