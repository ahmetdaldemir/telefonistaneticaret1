<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EcommerceSettingController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VirtualMarketController;
use App\Http\Controllers\Ecommerce\EcommerceController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\Route;

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


Route::get('/paymenttest', function () {
    \Illuminate\Support\Facades\Artisan::call('payment:test');
});

Route::domain('telefonistan.com')->group(function () {

    Route::get('/', [EcommerceController::class, 'index'])->name('index');

    Route::post('add_wishlist/{id}', [EcommerceController::class, 'add_wishlist'])->name('add_wishlist');
    Route::get('detail', [EcommerceController::class, 'detail'])->name('detail');
    Route::get('cart_delete', [EcommerceController::class, 'cart_delete'])->name('cart_delete');
    Route::get('kargo_bedava', [EcommerceController::class, 'freeshipping'])->name('kargo_bedava');
    Route::post('add_to_cart', [EcommerceController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('basket', [EcommerceController::class, 'basket'])->name('sepet');
    Route::get('iletisim', [EcommerceController::class, 'contact'])->name('iletisim');
    Route::post('checkout', [EcommerceController::class, 'checkout'])->name('checkout');
    Route::post('sendMail', [EcommerceController::class, 'sendMail'])->name('sendMail');
    Route::get('information', [EcommerceController::class, 'information'])->name('information');
    Route::get('support-guest', [EcommerceController::class, 'support_guest'])->name('support-guest');
    Route::get('sss', [EcommerceController::class, 'sss'])->name('sss');
    Route::get('siparis-takip', [EcommerceController::class, 'siparis_takip'])->name('siparis-takip');
    Route::post('order_tracking_get', [EcommerceController::class, 'order_tracking_get'])->name('order_tracking_get');
    Route::get('register', [EcommerceController::class, 'register'])->name('register');
    Route::get('login', [EcommerceController::class, 'login'])->name('login');
    Route::post('registerStore', [EcommerceController::class, 'registerStore'])->name('registerStore');
    Route::get('shipping', [EcommerceController::class, 'shipping'])->name('shipping');
    Route::get('cartTotal', [EcommerceController::class, 'cartTotal'])->name('cartTotal');
    Route::get('checkout_complate', [EcommerceController::class, 'checkout_complate'])->name('checkout_complate');

    Route::prefix('newsletter')->name('newsletter.')->middleware([])->group(function () {
        Route::post('newsletterStore', [EcommerceController::class, 'newsletterStore'])->name('newsletterStore');
    });
    Route::get('logout', [EcommerceController::class, 'logout'])->name('logout');

    // GoogleLoginController redirect and callback urls
    Route::get('/login/google', [\App\Http\Controllers\Ecommerce\GoogleAuthController::class, 'redirectToGoogle'])->name('google_login');
    Route::get('handleGoogleCallback', [\App\Http\Controllers\Ecommerce\GoogleAuthController::class, 'handleGoogleCallback']);
    Route::get('profil', [EcommerceController::class, 'profil'])->name('profil');
});

Route::post('paymentCallback', [EcommerceController::class, 'checkout_complate'])->name('paymentCallback');


Route::domain('adminnew.telefonistan.com')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->middleware(['admin'])->name('dashboard');
    Route::post('dashboard_data', [AdminController::class, 'getDashboardData'])->name('dashboard_data');

    Route::get('adminlogin', [LoginController::class, 'adminlogin'])->name('adminlogin');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::prefix('brand')->name('brand.')->middleware(['admin'])->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('edit', [BrandController::class, 'edit'])->name('edit');
        Route::get('get', [BrandController::class, 'show'])->name('get');
        Route::get('delete', [BrandController::class, 'destroy'])->name('delete');
        Route::post('store', [BrandController::class, 'store'])->name('store');
        Route::post('update', [BrandController::class, 'update'])->name('update');
        Route::post('update_status', [BrandController::class, 'update_status'])->name('update_status');
    });

    Route::prefix('product')->name('product.')->middleware(['admin'])->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('edit', [ProductController::class, 'edit'])->name('edit');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::get('get', [ProductController::class, 'show'])->name('get');
        Route::get('delete', [ProductController::class, 'destroy'])->name('delete');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::post('update}', [ProductController::class, 'update'])->name('update');
        Route::get('getCategories', [ProductController::class, 'getCategories'])->name('getCategories');
        Route::post('getAttributeList', [ProductController::class, 'getAttributeList'])->name('getAttributeList');
        Route::post('getAttributeListEdit', [ProductController::class, 'getAttributeListEdit'])->name('getAttributeListEdit');
        Route::post('getCategoryDetails', [ProductController::class, 'getCategoryDetails'])->name('getCategoryDetails');
        Route::get('getCategory', [ProductController::class, 'getCategory'])->name('getCategory');

        Route::post('mounthdeal/{id}/{status}', [ProductController::class, 'mounthdeal'])->name('mounthdeal');
        Route::post('getVirtualBrandList', [ProductController::class, 'getVirtualBrandList'])->name('getVirtualBrandList');
        Route::post('getVirtualAttributeList', [ProductController::class, 'getVirtualAttributeList'])->name('getVirtualAttributeList');
        Route::post('image-upload', [ProductController::class, 'imageUpload'])->name('image-upload');
        Route::post('edit-image-upload', [ProductController::class, 'editImageUpload'])->name('edit-image-upload');
        Route::post('ajax_remove_file', [ProductController::class, 'removeFile'])->name('ajax_remove_file');
        Route::post('update_price_stock', [ProductController::class, 'update_price_stock'])->name('update_price_stock');
        Route::post('update_status', [ProductController::class, 'update_status'])->name('update_status');
        Route::post('update_variant_status', [ProductController::class, 'update_variant_status'])->name('update_variant_status');

    });
    Route::prefix('model')->name('model.')->middleware(['admin'])->group(function () {
        Route::get('/', [ModelController::class, 'index'])->name('index');
        Route::get('edit', [ModelController::class, 'edit'])->name('edit');
        Route::get('get', [ModelController::class, 'show'])->name('get');
        Route::get('delete', [ModelController::class, 'destroy'])->name('delete');
        Route::get('getBrand', [ModelController::class, 'getBrand'])->name('getBrand');
        Route::post('store', [ModelController::class, 'store'])->name('store');
        Route::post('update', [ModelController::class, 'update'])->name('update');
    });
    Route::prefix('slider')->name('slider.')->middleware(['admin'])->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('index');
        Route::get('edit', [SliderController::class, 'edit'])->name('edit');
        Route::get('get', [SliderController::class, 'show'])->name('get');
        Route::get('delete', [SliderController::class, 'destroy'])->name('delete');
        Route::get('getBrand', [SliderController::class, 'getBrand'])->name('getBrand');
        Route::post('store', [SliderController::class, 'store'])->name('store');
        Route::put('update/{id}', [SliderController::class, 'update'])->name('update');

    });

    Route::prefix('banner')->name('banner.')->middleware(['admin'])->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('edit', [BannerController::class, 'edit'])->name('edit');
        Route::get('get', [BannerController::class, 'show'])->name('get');
        Route::get('delete', [BannerController::class, 'destroy'])->name('delete');
        Route::get('getBrand', [BannerController::class, 'getBrand'])->name('getBrand');
        Route::post('store', [BannerController::class, 'store'])->name('store');
        Route::put('update/{id}', [BannerController::class, 'update'])->name('update');

    });

    Route::prefix('ecommerceSetting')->name('ecommerceSetting.')->middleware(['admin'])->group(function () {
        Route::get('/', [EcommerceSettingController::class, 'index'])->name('index');
        Route::get('get', [EcommerceSettingController::class, 'show'])->name('get');
        Route::post('store', [EcommerceSettingController::class, 'store'])->name('store');
        Route::put('update/{id}', [EcommerceSettingController::class, 'update'])->name('update');
        Route::get('delete', [EcommerceSettingController::class, 'destroy'])->name('delete');
    });

    Route::prefix('category')->name('category.')->middleware(['admin'])->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('get', [CategoryController::class, 'show'])->name('get');
        Route::get('edit', [CategoryController::class, 'edit'])->name('edit');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::put('update', [CategoryController::class, 'update'])->name('update');
        Route::delete('delete', [CategoryController::class, 'destroy'])->name('delete');
        Route::get('getcategory', [CategoryController::class, 'getcategory'])->name('getcategory');
        Route::get('getCategoryList', [CategoryController::class, 'getCategoryList'])->name('getCategoryList');

    });


    Route::prefix('faq')->name('faq.')->middleware(['admin'])->group(function () {
        Route::get('/', [FaqController::class, 'index'])->name('index');
        Route::get('get', [FaqController::class, 'show'])->name('get');
        Route::post('store', [FaqController::class, 'store'])->name('store');
        Route::put('update/{id}', [FaqController::class, 'update'])->name('update');
        Route::get('delete', [FaqController::class, 'destroy'])->name('delete');

    });


    Route::prefix('product_attribute')->name('product_attribute.')->middleware(['admin'])->group(function () {
        Route::prefix('group')->name('group.')->middleware([])->group(function () {
            Route::get('/', [ProductAttributeController::class, 'index'])->name('index');
            Route::get('get', [ProductAttributeController::class, 'product_attribute_group_show'])->name('get');
            Route::get('attributes', [ProductAttributeController::class, 'product_attribute_group_attributes'])->name('attributes');
            Route::post('store', [ProductAttributeController::class, 'product_attribute_group_store'])->name('store');
            Route::put('update/{id}', [ProductAttributeController::class, 'update'])->name('update');
            Route::put('edit/{id}', [ProductAttributeController::class, 'update'])->name('edit');
            Route::get('delete', [ProductAttributeController::class, 'product_attribute_group_delete'])->name('delete');
        });
        Route::get('delete', [ProductAttributeController::class, 'product_attribute_delete'])->name('delete');
        Route::post('store', [ProductAttributeController::class, 'store'])->name('store');
        Route::get('get', [ProductAttributeController::class, 'show'])->name('get');
        Route::get('getattribute', [ProductAttributeController::class, 'getattribute'])->name('getattribute');

    });



    Route::prefix('order')->name('order.')->middleware(['admin'])->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('ecommerce', [OrderController::class, 'ecommerce'])->name('ecommerce');
          Route::post('update', [OrderController::class, 'update'])->name('update');
         Route::get('detail', [OrderController::class, 'detail'])->name('detail');
         Route::get('status', [OrderController::class, 'status'])->name('status');
        Route::get('delete', [OrderController::class, 'destroy'])->name('delete');

    });



    Route::prefix('user')->name('user.')->middleware(['admin'])->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('getUsers', [UserController::class, 'getUsers'])->name('getUsers');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::delete('delete', [UserController::class, 'destroy'])->name('delete');
        Route::put('statusupdate', [UserController::class, 'statusupdate'])->name('statusupdate');
    });

    Route::prefix('customer')->name('customer.')->middleware(['admin'])->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('getcustomers', [CustomerController::class, 'getcustomers'])->name('getcustomers');
        Route::post('store', [CustomerController::class, 'store'])->name('store');
        Route::delete('delete', [CustomerController::class, 'destroy'])->name('delete');
        Route::put('statusupdate', [CustomerController::class, 'statusupdate'])->name('statusupdate');
    });



    Route::prefix('virtual_market')->name('virtual_market.')->middleware(['admin'])->group(function () {
        Route::get('/', [VirtualMarketController::class, 'index'])->name('index');
        Route::get('show', [VirtualMarketController::class, 'show'])->name('show');
        Route::post('store', [VirtualMarketController::class, 'store'])->name('store');
        Route::get('trendyol_category_compare', [VirtualMarketController::class, 'trendyol_category_compare'])->name('trendyol_category_compare');
        Route::get('trendyol_attribute_compare', [VirtualMarketController::class, 'trendyol_attribute_compare'])->name('trendyol_attribute_compare');
        Route::get('getCategories', [VirtualMarketController::class, 'getCategories'])->name('getCategories');
        Route::get('getAttributes', [VirtualMarketController::class, 'getAttributes'])->name('getAttributes');
        Route::get('myCategories', [VirtualMarketController::class, 'myCategories'])->name('myCategories');
        Route::post('saveCompare', [VirtualMarketController::class, 'saveCompare'])->name('saveCompare');

        Route::prefix('virtual_market_setting')->name('virtual_market_setting.')->middleware([])->group(function () {
            Route::get('/', [VirtualMarketController::class, 'index'])->name('index');
            Route::post('store', [VirtualMarketController::class, 'virtual_market_setting_store'])->name('store');
            Route::post('update', [VirtualMarketController::class, 'update'])->name('update');
            Route::get('edit', [VirtualMarketController::class, 'edit'])->name('edit');
            Route::post('companyStatusUpdate', [VirtualMarketController::class, 'companyStatusUpdate'])->name('companyStatusUpdate');
        });

    });

    Route::prefix('supervisor')->name('supervisor.')->middleware(['role.guard:admin,supervisor'])->group(function () {
        Route::get('/', [SupervisorController::class, 'index'])->name('index');
        Route::post('store', [SupervisorController::class, 'store'])->name('store');
        Route::delete('delete', [SupervisorController::class, 'destroy'])->name('delete');
        Route::post('update', [SupervisorController::class, 'update'])->name('update');
        Route::get('edit', [SupervisorController::class, 'edit'])->name('edit');
        Route::post('siteUpdate', [SupervisorController::class, 'siteUpdate'])->name('siteUpdate');
     });

    Route::prefix('transaction')->name('transaction.')->middleware(['role.guard:admin'])->group(function () {
        Route::get('/', [SupervisorController::class, 'index'])->name('index');
    });


    Route::prefix('shippings')->name('shippings.')->middleware(['admin'])->group(function () {
        Route::get('/', [ShippingsController::class, 'index'])->name('index');
        Route::post('store', [ShippingsController::class, 'store'])->name('store');
        Route::delete('delete', [ShippingsController::class, 'destroy'])->name('delete');
        Route::post('update', [ShippingsController::class, 'update'])->name('update');
        Route::get('edit', [ShippingsController::class, 'edit'])->name('edit');
        Route::post('companyStore', [ShippingsController::class, 'companyStore'])->name('companyStore');
        Route::post('companyStatusUpdate', [ShippingsController::class, 'companyStatusUpdate'])->name('companyStatusUpdate');
    });

    Route::get('/blog', [BlogController::class, 'index'])->name('index');
    Route::post('/generate-content', [BlogController::class, 'generateContent'])->name('generate-content');


});
