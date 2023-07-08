<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ChackoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\ProductCategory;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\ThyankyouComponent;
use App\Http\Livewire\ContactComponent;

//user 
use App\Http\Livewire\User\UserDashboard;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;


//admin
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\HomeSlider;
use App\Http\Livewire\Admin\AdminAddHomeSlider;
use App\Http\Livewire\Admin\AdminEditHomeSlider;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminAddCouponsComponent;
use App\Http\Livewire\Admin\AdminEditCouponsComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\Admin\AdminSubcategoriComponent;
use App\Http\Livewire\Admin\AdminAddSubcategoriComponent;
use App\Http\Livewire\Admin\AdminEditSubcategoriComponent;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('home');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}', ProductCategory::class)->name('product.category');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');
Route::get('/contact-us', ContactComponent::class)->name('contact');

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


//user Or Customer
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function(){
    
    Route::get('/checkout', ChackoutComponent::class)->name('checkout');
    Route::get('/thank-you', ThyankyouComponent::class)->name('thankyou');

    Route::get('/user/dashbord', UserDashboard::class)->name('user.dashbord');
    Route::get('/user/orders', UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('/user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');

    Route::get('/user/change-password', UserChangePasswordComponent::class)->name('user.changepassword');
});


//Admin
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified','authadmin'])->group(function(){
    
   //Route::get('/checkout', ChackoutComponent::class)->name('checkout');
   //Route::get('/thank-you', ThyankyouComponent::class)->name('thankyou');

   Route::get('/admin/dashbord', AdminDashboard::class)->name('admin.dashbord');
   Route::get('/admin/category', AdminCategoryComponent::class)->name('admin.category');
   Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
   Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
   Route::get('/admin/product', AdminProductComponent::class)->name('admin.product');
   Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
   Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');

   Route::get('/admin/home-slider', HomeSlider::class)->name('admin.homeslider');
   Route::get('/admin/home-slider/add', AdminAddHomeSlider::class)->name('admin.addhomeslider');
   Route::get('/admin/home-slider/edit/{slider_id}', AdminEditHomeSlider::class)->name('admin.edithomeslider');

   Route::get('/admin/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');
   Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');

   Route::get('/admin/coupon', AdminCouponsComponent::class)->name('admin.coupon');
   Route::get('/admin/coupon/add', AdminAddCouponsComponent::class)->name('admin.addcoupon');
   Route::get('/admin/coupon/edit/{coupon_id}', AdminEditCouponsComponent::class)->name('admin.editcoupon');

   Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
   Route::get('/admin/orders/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');

   Route::get('/admin/contact-us', AdminContactComponent::class)->name('admin.contact');
   Route::get('/admin/settings', AdminSettingComponent::class)->name('admin.settings');

   Route::get('/admin/subcategory', AdminSubcategoriComponent::class)->name('admin.subcategory');
   Route::get('/admin/subcategory/add', AdminAddSubcategoriComponent::class)->name('admin.addsubcategory');
   Route::get('/admin/subcategory/edit/{subcategory_slug}', AdminEditSubcategoriComponent::class)->name('admin.editsubcategory');
});

