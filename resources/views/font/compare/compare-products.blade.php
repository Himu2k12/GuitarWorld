@extends('font.master')

@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active"><a href="{{'/compare-view'}}">Compare</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Compare Page Start -->
    <div class="compare-product pb-50">
        <div class="container">
            <div class="table-responsive">
                <table class="table text-center compare-content">
                    <thead>
                    <tr>
                        <td style="width: 25%">Product</td>
                        <td style="width: 25%">Product 1</td>
                        <td style="width: 25%">Product 2</td>
                        <td style="width: 25%">Product 3</td>
                    </tr>


                    </thead>
                    <tbody>
                    <tr>
                        <td class="product-title" >Name</td>
                        @foreach($compareProducts as $compareProduct)

                        <td class="product-description">
                            <div class="compare-details">
                                <div class="compare-detail-img">
                                    <a href=""><img src="{{asset($compareProduct->options->ItemImage)}}" alt="compare-product"></a>
                                </div>
                                <div class="compare-detail-content">
                                    <h4><a href="">{{$compareProduct->name}}</a></h4>
                                </div>
                            </div>
                        </td>
                            @endforeach
                    </tr>
                    <tr>
                        <td class="product-title">Category</td>
                        @foreach($compareProducts as $compareProduct)
                        <td class="product-description">
                            <p>{{$compareProduct->options->ItemsCategory}}</p>
                        </td>
                       @endforeach
                    </tr>
                    <tr>
                        <td class="product-title">Brand</td>
                        @foreach($compareProducts as $compareProduct)
                        <td class="product-description">
                            <p>{{$compareProduct->options->ItemsBrand}}</p>
                        </td>
                       @endforeach
                    </tr>
                    <tr>
                        <td class="product-title">Description</td>
                        @foreach($compareProducts as $compareProduct)
                        <td class="product-description">
                            <p>{{$compareProduct->options->ItemsDescription}}</p>
                        </td>
                       @endforeach
                    </tr>
                    <tr>
                        <td class="product-title">Price</td>
                        @foreach($compareProducts as $compareProduct)
                        <td class="product-description">${{$compareProduct->price}}</td>
                        @endforeach
                    </tr>

                    <tr>
                        <td class="product-title">Stock</td>
                        @foreach($compareProducts as $compareProduct)
                        <td class="product-description">@if($compareProduct->options->Items >0)In Stock @else Out of Stock @endif</td>
                            @endforeach
                    </tr>
                    <tr>
                        <td class="product-title">Add to cart</td>
                        @foreach($compareProducts as $compareProduct)
                        <td class="product-description">
                            <button class="compare-cart text-uppercase" onclick="AddtoCartfromCompare({{$compareProduct->id}})" ><i class="fa fa-shopping-cart"></i>add to cart</button>
                        </td>
                            @endforeach

                    </tr>
                    <tr>
                        <td class="product-title">Delete</td>
                        @foreach($compareProducts as $compareProduct)
                        <td class="product-description"><a href="{{url('/remove-from-compare/'.$compareProduct->rowId)}}"><i class="fa fa-trash-o"></i></a>
                            {{--<form method="post" action="{{url('/remove-from-compare')}}">--}}
                                {{--{{csrf_field()}}--}}
                                {{--<input type="hidden" name="delId" value="{{$compareProduct->rowId}}">{{$compareProduct->rowId}}--}}
                                {{--<input type="submit" value="ok"><i class="fa fa-trash-o"></i>--}}
                            {{--</form>--}}
                        </td>
                            @endforeach

                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Compare Page End -->


@endsection