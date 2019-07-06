<!-- Header Area Start -->
<header>
    <!-- Header Top Start -->
    <div class="header-top off-white-bg">
        <div class="container">
            <!-- Header Top left Start -->
            <div class="header-top-left f-left">
                <ul class="header-list-menu">
                    <!-- Currency Start -->
                    <li><a href="#">Us Dollar<i class="fa fa-angle-down"></i></a>
                        <ul class="ht-dropdown">
                            <li><a href="#">USD</a></li>
                            <li><a href="#">GBP</a></li>
                            <li><a href="#">EUR</a></li>
                        </ul>
                    </li>
                    <!-- Currency End -->
                    <!-- Language Start -->
                    <li><a href="#">English1<i class="fa fa-angle-down"></i></a>
                        <ul class="ht-dropdown">
                            <li><a href="#">Spanish</a></li>
                            <li><a href="#">Bengali</a></li>
                            <li><a href="#">Russian</a></li>
                        </ul>
                    </li>
                    <!-- Language End -->
                </ul>
                <!-- Header-list-menu End -->
            </div>
            <!-- Header Top left End -->
            <!-- Header Top Right Start -->
            <div class="header-top-right f-right">
                <ul class="header-list-menu right-menu">
                    <li class="hidden-xs"><span><i class="fa fa-phone"></i> Ordered before 17:30, shipped today  - Support: (012) 800 456 789</span></li>
                    @if(isset(Auth::user()->name))
                    <li><a href="#"><i class="fa fa-cog"></i>{{Auth::user()->name}}</a>
                        <ul class="ht-dropdown ht-account">
                            @can('isBrand')
                            <li><a href="{{url('/brand-profile')}}">My account</a></li>
                            @endcan
                            @can('isDealer')
                                 <li><a href="{{url('/dealer-profile')}}">My account</a></li>
                            @endcan
                            <li><a href="{{url('/wishlist')}}">my wishlist</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </li>
                        </ul>
                    </li>
                    @else
                    <li><a href="#"><i class="fa fa-cog"></i>Register/Login</a>
                        <ul class="ht-dropdown ht-account">
                           <li><a href="{{url('/register')}}">sign Up</a></li>
                           <li><a href="{{url('/login')}}">Log in</a></li>
                        </ul>
                    </li>
                        @endif
                </ul>
                <!-- Header-list-menu End -->
            </div>
            <!-- Header Top Right End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Top End -->
    <!-- Header Middle Start -->
    <div class="header-middle-three home-4 header-middle white-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 hidden-xs">
                    <!-- Logo Start -->
                    <div class="logo-style-two logo pull-left">
                        <a href="{{url('/')}}"> <h1 style="color: white">Guitar World</h1></a>
                    </div>
                    <!-- Logo End -->
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="search-box-style-three search-box-view fix">
                        <form action="#">
                            <input type="text" class="email" id="searchP" onkeyup="search();" placeholder="Search for item...">
                            <button type="submit" class="submit"></button>
                        </form>
                    </div>
                    <div   >
                        <ul id="result"></ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="cart-style-three cart-box text-right">
                        <ul>@if(Cart::instance('wishlist')->count()>0)
                            <li><a href="{{url('/wishlist')}}"><i class="fa fa-heart"></i><span class="cart-counter">{{Cart::instance('wishlist')->count()}}</span></a></li>
                           @else
                            <li><a href="{{url('/wishlist')}}"><i class="fa fa-heart-o"></i><span class=""></span></a></li>
                           @endif
                            <li><a href="{{url('/compare-view')}}"><i class="fa fa-signal"></i></a></li>
                            <li><a href="{{url('/cart-content')}}"><i class="fa fa-shopping-basket"></i>
                                        <span class="cart-counter-shopping">{{Cart::instance('shopping')->count()}}</span>
                                      </a>
                                <ul class="ht-dropdown main-cart-box" id="cartItem">

                                    <li>
                                        <!-- Cart Box Start -->
                                        @foreach(Cart::instance('shopping')->content() as $item)
                                            <div class="single-cart-box">
                                                <div class="cart-img">
                                                    <a href=""><img src="{{asset($item->options->ItemImage)}}" alt="cart-image"></a>
                                                </div>
                                                <div class="cart-content">
                                                    <h6><a href="">{{$item->name}}</a></h6>
                                                    <span>{{$item->qty}} × ${{$item->price}}</span>
                                                </div>
                                                <a class="del-icone" href="{{url('/remove-cart-product/'.$item->rowId)}}"><i class="fa fa-window-close-o"></i></a>
                                            </div>
                                    @endforeach
                                    <!-- Cart Box End -->
                                        <!-- Cart Footer Inner Start -->
                                        @if(Cart::instance('shopping')->count()==0)

                                            <P>No Item!!!</P>
                                        @else
                                            <div class="cart-footer fix" id="totalMoney">
                                                <h5>total :<span class="f-right">{{Cart::instance('shopping')->total()}}</span></h5>
                                                <div class="cart-actions">
                                                    <a class="checkout" href="{{url('/checkout')}}">Checkout</a>
                                                </div>
                                            </div>
                                    @endif
                                        <!-- Cart Footer Inner End -->
                                    </li>
                                </ul>
                            </li>
                            <li class="search-bar-xs visible-xs"><a href="#"><i class="fa fa-search"></i></a>
                                <div class="ht-dropdown search-box-view">
                                    <form action="#">
                                        <input type="text" class="email" placeholder="Search for item..." name="email">
                                        <button type="submit" class="submit"></button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Middle End -->
    <!-- Header Bottom Start -->
    <div class="home-4 header-bottom black-bg header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 visible-xs full-col">
                    <!-- Logo Start -->
                    <div class="logo mt-10">
                        <h1 style="color: white">Guitar World</h1>
                    </div>
                    <!-- Logo End -->
                </div>
                <!-- Primary Vertical-Menu Start -->
                <div class="col-md-3 col-sm-4 hidden-xs">

                    <div class="vertical-menu mt-10">
                        <span class="categorie-title">all Categories </span>
                        <nav>
                            <ul class="vertical-menu-list menu-hidden">
                              <?php $categories="";
                                $categories=\App\Categories::all(); ?>
                                @foreach($categories as $category)
                                <li><a href=""><span><img src="{{asset('fontAsset/')}}/img/vertical-menu/1.png" alt="menu-icon" height="20px"></span>{{$category->category_name}}</a></li>
                                @endforeach
                               </ul>
                        </nav>
                    </div>
                </div>
                <!-- Primary Vertical-Menu End -->
                <!-- Cartt Box Start -->
                <div class="col-xs-6 full-col fl-r visible-xs">
                    <div class="cart-box text-right">
                        <ul>
                            <li><a href="{{url('/wishlist')}}"><i class="fa fa-heart-o"></i></a></li>
                            <li><a href="{{url('/compare-view')}}"><i class="fa fa-signal"></i></a></li>
                            <li><a href="{{url('/cart-content')}}"><i class="fa fa-shopping-basket"></i>
                                    @if(Cart::instance('shopping')->count()>0)
                                    <span class="cart-counter-shopping">{{Cart::instance('shopping')->count()}}</span>
                                    @else

                                    @endif
                                </a>
                                @if(Cart::instance('shopping')->count()!=0)
                                <ul class="ht-dropdown main-cart-box" id="cartItemm">

                                    <li>
                                        <!-- Cart Box Start -->
                                        @foreach(Cart::instance('shopping')->content() as $item)
                                            <div class="single-cart-box">
                                                <div class="cart-img">
                                                    <a href=""><img src="{{asset($item->options->ItemImage)}}" alt="cart-image"></a>
                                                </div>
                                                <div class="cart-content">
                                                    <h6><a href="product.html">{{$item->name}}</a></h6>
                                                    <span>{{$item->qty}} × ${{$item->price}}</span>
                                                </div>
                                                <a class="del-icone" href="{{url('/remove-cart-product/'.$item->rowId)}}"><i class="fa fa-window-close-o"></i></a>
                                            </div>
                                        @endforeach
                                    <!-- Cart Box End -->
                                        <!-- Cart Footer Inner Start -->



                                                <div class="cart-footer fix" id="totalMoney2">
                                                    <h5>total :<span class="f-right">{{Cart::instance('shopping')->total()}}</span></h5>
                                                    <div class="cart-actions">
                                                        <a class="checkout" href="{{url('/checkout')}}">Checkout</a>
                                                    </div>
                                                </div>


                                    <!-- Cart Footer Inner End -->
                                    </li>
                                </ul>
                                @endif
                            </li>
                            <li class="search-bar-xs visible-xs"><a href="#"><i class="fa fa-search"></i></a>
                                <div class="ht-dropdown search-box-view">
                                    <form action="#">
                                        <input type="text" class="email" placeholder="Search for item..." name="email">
                                        <button type="submit" class="submit"></button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Cartt Box End -->
                <!-- Mobile Menu  Start -->
                <div class="col-xs-12 visible-xs">
                    <div class="mobile-menu mobile-menu-four">
                        <nav>
                            <ul class="menu-styel-three middle-menu-list">


                                {{--Brand Menu Start--}}
                                @can('isBrand')
                                    <li><a href="{{url('/brand-home')}}">Home</a></li>
                                    <li><a href="{{url('/brand-profile')}}">Profile</a></li>
                                    <?php if(Auth::user()->role=='brand' && Auth::user()->access==1) { ?>
                                    <li><a href="{{url('/brand-sell')}}">view Sells</a></li>
                                    <li><a href="{{url('/brand-statistic')}}">Statistic</a></li>
                                    <li><a href="#">Products<i class="fa fa-angle-down"></i></a>
                                        <!--Brand product Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="{{url('/brand-add-product')}}">Add Product</a></li>
                                            <li><a href="{{url('/brand-manage-product')}}">Manage Product</a></li>

                                        </ul>
                                        <!--Brand product Dropdown End -->
                                    </li>
                                    <?php } ?>
                                @endcan
                                {{--Brand Menu End--}}
                                {{--Dealer Menu Start From here--}}
                                @can('isDealer')
                                    <li><a href="{{url('/brand-home')}}">Brand Products</a></li>
                                    <li><a href="{{url('/customer-profile')}}">Profile</a></li>
                                    <li><a href="{{url('/brand-home')}}">History</a></li>
                                @endcan
                                {{--Dealer menu Ends Here--}}
                                {{--Customer Menu Start from here--}}
                                @cannot('isBrand')
                                    <li><a href="{{url('/')}}">Home</a> </li>
                                @endcannot
                                @can('isArtist')
                                    <li><a href="{{url('/artist-profile')}}">Profile</a></li>
                                    <li><a href="{{url('/forum')}}">Forum</a></li>
                                @endcan
                                @can('isCustomer')

                                    <li><a href="{{url('/sell-buy')}}">Sell&Buy</a></li>
                                    <li><a href="{{url('/customer-profile')}}">Profile</a></li>
                                    <li><a href="{{url('/forum')}}">Forum</a></li>
                                @endcan

                                <li><a href="{{url('/about')}}">About</a> </li>
                                <li><a href="{{url('/contact')}}">Contact Us</a> </li>


                                {{--Customer menu Ends here--}}
                                @can('isAdmin')
                                    <li><a href="{{url('/admin-view')}}">Admin</a></li>
                                @endcan
                                {{--Artist menu Start Here--}}

                                {{--Artist menu ends here--}}
                            </ul>
                        </nav>

                    </div>
                </div>
                <!-- Mobile Menu  End -->
                <div class="col-md-9">
                    <!-- Header Middle Menu Start -->
                    <div class="middle-menu hidden-xs">
                        <nav>
                            <ul class="menu-styel-three middle-menu-list">


                                {{--Brand Menu Start--}}
                                @can('isBrand')
                                <li><a href="{{url('/brand-home')}}">Home</a></li>
                                <li><a href="{{url('/brand-profile')}}">Profile</a></li>
                                    <?php if(Auth::user()->role=='brand' && Auth::user()->access==1) { ?>
                                    <li><a href="{{url('/brand-sell')}}">view Sells</a></li>
                                    <li><a href="{{url('/brand-statistic')}}">Statistic</a></li>
                                    <li><a href="#">Products<i class="fa fa-angle-down"></i></a>
                                        <!--Brand product Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="{{url('/brand-add-product')}}">Add Product</a></li>
                                            <li><a href="{{url('/brand-manage-product')}}">Manage Product</a></li>

                                        </ul>
                                        <!--Brand product Dropdown End -->
                                    </li>
                                    <?php } ?>
                                @endcan
                                {{--Brand Menu End--}}
                                    {{--Dealer Menu Start From here--}}
                                @can('isDealer')
                                    <li><a href="{{url('/brand-home')}}">Brand Products</a></li>
                                    <li><a href="{{url('/customer-profile')}}">Profile</a></li>
                                    <li><a href="{{url('/brand-home')}}">History</a></li>
                                @endcan
                                  {{--Dealer menu Ends Here--}}
                                {{--Customer Menu Start from here--}}
                                @cannot('isBrand')
                                    <li><a href="{{url('/')}}">Home</a> </li>
                                @endcannot
                                @can('isArtist')
                                    <li><a href="{{url('/artist-profile')}}">Profile</a></li>
                                    <li><a href="{{url('/forum')}}">Forum</a></li>
                                    <li><a href="{{url('/service')}}">Servicing</a></li>
                                @endcan
                                @can('isCustomer')

                                    <li><a href="{{url('/sell-buy')}}">Sell&Buy</a></li>
                                    <li><a href="{{url('/customer-profile')}}">Profile</a></li>
                                    <li><a href="{{url('/forum')}}">Forum</a></li>
                                    <li><a href="{{url('/service')}}">Servicing</a></li>
                                @endcan

                                <li><a href="{{url('/about')}}">About</a> </li>
                                <li><a href="{{url('/contact')}}">Contact Us</a> </li>


                                {{--Customer menu Ends here--}}
                                @can('isAdmin')
                                <li><a href="{{url('/admin-view')}}">Admin</a></li>
                                @endcan
                                {{--Artist menu Start Here--}}

                                {{--Artist menu ends here--}}
                                </ul>
                        </nav>
                    </div>
                    <!-- Header Middle Menu End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>

    <!-- Header Bottom End -->
</header>
<!-- Header Area End -->
<!-- Mobile Vertical Menu Start -->
<div class="mobile-vertical-menu visible-xs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Primary Vertical-Menu Start -->
                <div class="vertical-menu">
                    <span class="categorie-title">all Categories </span>
                    <nav>
                        <ul class="vertical-menu-list menu-hidden">
                            <li><a href="shop.html"><span><img src="{{asset('fontAsset/')}}/img/vertical-menu/1.png" alt="menu-icon"></span>Computer</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Primary Vertical Menu End -->
            </div>
        </div>
    </div>
</div>
<!-- Mobile Vertical-Menu End -->
<!-- Slider Area Start -->

       