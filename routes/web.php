<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', 'WelcomeController@showHome');
Route::get('/cart-content', 'CartController@showCart');
Route::get('/checkout', 'CartController@showCheckout');

Route::get('/about', 'WelcomeController@ShowAbout');
Route::get('/contact', 'WelcomeController@ShowContact');
Route::get('/product-details/{id}', 'ProductController@productDetails');

//customer routes start here
Route::get('/artist-profile', 'WelcomeController@showArtistProfile');
Route::get('/customer-profile', 'WelcomeController@showCustomerProfile');
Route::post('/save-customer-profile', 'WelcomeController@saveCustomerProfileData');
Route::post('/update-customer-profile', 'WelcomeController@updateCustomerProfileData');
Route::get('/sell-buy', 'BuyAndSellController@ShowItems');
Route::post('/new-items', 'BuyAndSellController@newItems');
Route::get('/disabled-buy&sell-product/{id}', 'BuyAndSellController@disabledProductInfo');
Route::get('/activate-buy&sell-product/{id}', 'BuyAndSellController@activeProductInfo');
Route::get('/edit-buy&sell-product/{id}', 'BuyAndSellController@editItemForm');
Route::post('/update-customer-buySell-items', 'BuyAndSellController@updateProduct');
Route::post('/range', 'BuyAndSellController@range');


Route::get('/item-details/{id}', 'BuyAndSellController@ShowDetailsItem');
Route::get('/pickupBuyAndSell', 'BuyAndSellController@ShowPickup');
Route::post('/savePickup', 'BuyAndSellController@SavePickup');
Route::get('/add-Items-To-Buy-And-Sell', 'BuyAndSellController@ShowAddItemForm');
Route::get('/manage-own-Items-To-Buy-And-Sell', 'BuyAndSellController@manageOwnItems');
Route::post('/add-product-cart', 'CartController@addToCartOfCustomers');
Route::post('/remove-product-cart', 'CartController@removeToCartOfCustomers');
Route::post('/update-cart-customer', 'CartController@updateCartByIdCustomers');
//Dealer routes
Route::get('/product-id-for-add/{Pid}/{Oid}', 'DealerController@dealerAddProduct');
Route::post('/add-dealer-product', 'DealerController@DealerSaveProduct');
Route::post('/save-withdraw-dealer', 'AccountController@saveWithDrawDealer');

//Brand/Company Routes start here
Route::get('/brand-home', 'ComingBrandController@NewBrandView');
Route::get('/brand-statistic', 'ComingBrandController@brandStatistic');
Route::get('/brand-add-product', 'ComingBrandController@addProduct');
Route::get('/brand-manage-product', 'ComingBrandController@manageProduct');
Route::get('/brand-edit-product/{id}', 'ComingBrandController@editProduct');
Route::get('/disabled-brand-product/{id}', 'ComingBrandController@disabledProductInfo');
Route::get('/activate-brand-product/{id}', 'ComingBrandController@activeProductInfo');
Route::post('/brand-new-product', 'ComingBrandController@saveProduct');
Route::post('/brand-update-product', 'ComingBrandController@updateProduct');
Route::get('/brand-profile', 'ComingBrandController@showProfile');
Route::post('/coming-brand-description', 'ComingBrandController@saveBrandDetails');
Route::post('/coming-brand-description-update', 'ComingBrandController@UpdateBrandDetails');
Route::get('/brand-product-details/{id}', 'ComingBrandController@detailsProduct');
Route::get('/brand-sell', 'ComingBrandController@SellHistory');
Route::post('/add-to-cart', 'CartController@addToCart');
Route::get('/remove-cart-product/{id}', 'CartController@removeFromCart');
Route::post('/update-cart', 'CartController@updateCartById');
Route::post('/search', 'WelcomeController@searchProduct');


Route::get('/add-category', 'CategoryController@addCategory');
Route::post('/new-category', 'CategoryController@newCategory');
Route::get('/manage-category', 'CategoryController@manageCategoryInfo');
Route::get('/disable-category/{id}', 'CategoryController@disabledCategoryInfo');
Route::get('/active-category/{id}', 'CategoryController@activeCategoryInfo');
Route::get('/edit-category/{id}', 'CategoryController@editCategoryInfo');
Route::post('/update-category', 'CategoryController@updateCategoryInfo');




//admin routes start from here
Route::get('/order-view', 'AdminWelcomeController@viewOrder');
Route::get('/order-view-brand', 'AdminWelcomeController@viewOrderBrand');
Route::get('/details-order-view/{id}', 'AdminWelcomeController@detailsOrder');
Route::get('/details-order-of-brand/{id}', 'AdminWelcomeController@detailsDealerOrder');
Route::get('/Confirm-delivery/{id}', 'AdminWelcomeController@confirmDelivery');
Route::get('/Confirm-delivery-brand/{id}', 'AdminWelcomeController@confirmDeliverybrand');
Route::get('/admin-view', 'AdminWelcomeController@ShowDashboard');
Route::get('/admin-view-customer', 'AdminWelcomeController@ShowCustomer');
Route::get('/admin-view-dealer', 'AdminWelcomeController@ShowDealer');
Route::get('/admin-view-brand', 'AdminWelcomeController@ShowBrand');
Route::get('/admin-view-artist', 'AdminWelcomeController@ShowArtist');
Route::get('/admin-disable-brand/{id}', 'AdminWelcomeController@disableBrandInfo');
Route::get('/admin-active-brand/{id}', 'AdminWelcomeController@activeBrandInfo');
Route::get('/view-brand-details/{id}', 'AdminWelcomeController@viewBrandDetails');
Route::get('/admin-disable-artist/{id}', 'AdminWelcomeController@disableArtistInfo');
Route::get('/admin-active-artist/{id}', 'AdminWelcomeController@activeArtistInfo');
Route::get('/view-artist-details/{id}', 'AdminWelcomeController@viewArtistDetails');
Route::get('/add-brand', 'BrandController@addBrand');
Route::post('/new-brand', 'BrandController@saveBrandInfo');
Route::get('/manage-brand', 'BrandController@managebrandInfo');
Route::get('/disabled-brand/{id}', 'BrandController@disabledbrandInfo');
Route::get('/active-brand/{id}', 'BrandController@activebrandInfo');
Route::get('/edit-brand/{id}', 'BrandController@editbrandInfo');
Route::post('/update-brand', 'BrandController@updatebrandInfo');
Route::get('/add-product', 'ProductController@addProduct');
Route::post('/new-product', 'ProductController@saveProductInfo');
Route::get('/manage-product', 'ProductController@manageProductInfo');
Route::get('/view-product/{id}', 'ProductController@viewProductInfo');
Route::get('/edit-product/{id}', 'ProductController@editProductInfo');
Route::post('/update-product', 'ProductController@updateProductInfo');
Route::get('/disabled-product/{id}', 'ProductController@disabledProductInfo');
Route::get('/activate-product/{id}', 'ProductController@activeProductInfo');
Route::get('/brand-account', 'AccountController@brandTurnOver');




//Route::get('/home', 'HomeController@index')->name('home');


//wishlist routes
Route::get('/wishlist', 'WishlistController@showWishlist');
Route::get('/wishlist-new-product/{id}', 'WishlistController@addToWishlist');
Route::get('/wishlist-new-product-customer/{id}', 'WishlistController@addToWishlistCustomer');
Route::get('/remove-wishlist-product/{id}', 'WishlistController@removeFromWishlist');
Route::get('/destroy-wishlist-product', 'WishlistController@destroyWishlist');


//payment routes
Route::get('/payment-form', 'CartController@showPaymentForm');
Route::get('/account-payment-form', 'CartController@showAccountPaymentForm');
Route::get('/confirm-order-brand', 'InvoiceController@confirmOrderMessage');
Route::post('/shipping-address', 'CartController@newShippingInfo');


//order for shipping routes
Route::post('/new-order-with-Shipping', 'OrderForShippingController@saveDealerOrderwithShipping');
Route::post('/new-order-with-Shipping-account', 'OrderForShippingController@saveOrderwithShippingAccountPayment');


//compare routes
Route::get('/compare-view', 'ComparisonController@ShowComparison');
Route::get('/add-to-compare/{id}', 'ComparisonController@addToCompare');
Route::get('/add-to-compare-customer/{id}', 'ComparisonController@addToCompareCustomer');
Route::get('/remove-from-compare/{id}', 'ComparisonController@removeCompare');



//servicing routes here
Route::get('/service', 'ServiceController@ShowService');
Route::get('/manage-services', 'ServiceController@allServiceProdducts');
Route::post('/add-to-service', 'ServiceController@addProductToService');
Route::post('/view-service', 'ServiceController@viewServiceById');
Route::get('/edit-service/{id}', 'ServiceController@editService');
Route::post('/update-service-product', 'ServiceController@updateService');
Route::get('/cancel-service-product/{id}', 'ServiceController@CancelService');
Route::get('/accept-service-product/{id}', 'ServiceController@saveService');
Route::post('/make-payment-service', 'ServiceController@saveShippings');
Route::post('/service-money-payment', 'ServiceController@savePaymentOfServicing');


//Forum routes here
Route::get('/forum', 'ArtistForumController@ShowForum');
Route::post('/post-status', 'ArtistForumController@savePost');
Route::post('/new-artist-profile', 'ArtistForumController@saveProfileInfo');
Route::post('/update-artist-profile', 'ArtistForumController@updateProfileInfo');
Route::get('/post-description/{id}', 'ArtistForumController@PostDescriptionById');
Route::get('/delete-post/{id}', 'ArtistForumController@DeletePost');
Route::post('/new-answer-of-post', 'ArtistForumController@newComment');
Route::get('/delete-post/{id}', 'ArtistForumController@deleteOwnPost');


//Invoice routees
Route::get('/view-invoice', 'InvoiceController@viewInvoice');
Route::get('/print-invoice', 'InvoiceController@PrintInvoice');


//Like dislike routes

Route::post('/like-dislike','ArtistForumController@saveLikeDislike' );
Route::post('/dislike-to-like','ArtistForumController@updateLikeDislike');
Route::get('/like-count','ArtistForumController@viewLike');
Route::get('/check-like','ArtistForumController@checkLike');
Route::get('/dislike-count','ArtistForumController@viewDislike');
