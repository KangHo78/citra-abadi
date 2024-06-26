<?php

use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ReceiveItemController;
use App\Http\Controllers\AdjustmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PurchasingController;
use App\Http\Controllers\ReportCartController;
use App\Http\Controllers\ReportGrossController;
use App\Http\Controllers\ReportHppController;
use App\Http\Controllers\ReportIncomeController;
use App\Http\Controllers\ReportShareProductController;
use App\Http\Controllers\ReportStockController;
use App\Http\Controllers\ReportStockMutationController;
use App\Http\Controllers\ReportUserController;
use App\Http\Controllers\ReportWishlistController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\MobileAppSettingsController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WishlistController;
use App\Models\Services;
use Rabiloo\LaravelLocalTemporaryUrl\Controllers\LocalTemporaryUrlController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/local-temp/{path}', [LocalTemporaryUrlController::class, 'getUrl'])
//     ->name('local.temp');
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/material',[HomeController::class, 'dataMaterial'])->name('dataMaterial');
Route::post('/share-product',[HomeController::class, 'shareProduct'])->name('share-product');
Route::get('/catalog',[CatalogController::class, 'index'])->name('catalog');
Route::get('/product-details/{id}',[ProductDetailsController::class, 'index'])->name('product-details');
Route::get('/profile',[HomeController::class, 'profile'])->name('profile');
Route::post('/update-profile/{id}',[HomeController::class, 'updateProfile'])->name('update-profile');
Route::post('/login', [LoginController::class, 'login'])->middleware('login.redirect');

Route::post('/add-to-cart',[CartsController::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart',[CartsController::class, 'cart'])->name('cart');

Route::post('/remove-item-cart',[CartsController::class, 'removeItemCart'])->name('remove-item-cart');
Route::post('/add-quantity-item-cart',[CartsController::class, 'addQuantityItemCart'])->name('add-quantity-item-cart');
Route::post('/decrease-quantity-item-cart',[CartsController::class, 'decreaseQuantityItemCart'])->name('decrease-quantity-item-cart');
Route::post('/sync-quantity-item-cart',[CartsController::class, 'syncQuantityItemCart'])->name('sync-quantity-item-cart');

Route::post('/place-order',[CartsController::class, 'placeOrder'])->name('place-order');


Route::get('/wishlist',[WishlistController::class, 'index'])->name('wishlist');
Route::post('/add-to-wishlist',[WishlistController::class, 'addToWishlist'])->name('add-to-wishlist');



// Route::get('/item-details', function () {
//     return view('user.item_details');
// })->name('item-details');

// Route::get('/checkout', function () {
//     return view('user.checkout');
// })->name('checkout');

Route::get('/about-us', function () {
    return view('user.about_us');
})->name('about-us');

Route::get('/service', function () {
    return view('user.service');
})->name('service');

Route::get('/contact-us', function () {
    return view('user.contact_us');
})->name('contact-us');



Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Transaction
    Route::group(['prefix' => 'transaction'], function () {
        Route::resource('sales', EnquiryController::class, [
            'as' => 'transaction'
        ]);
        Route::get('sales/{sales}/print', [EnquiryController::class, 'print'])->name('transaction.sales.print');
        Route::get('sales/{sales}/email', [EnquiryController::class, 'email'])->name('transaction.sales.email');
        Route::get('data/sales/get-data-item-detail',[EnquiryController::class, 'getDataItemDetail'])->name('transaction.sales.get-data-item-detail');

    
    });
    Route::group(['prefix' => 'front-end'], function () {
        Route::get('about-us', [FrontendController::class, 'aboutUsIndex'])->name('front-end.about-us.index');
        Route::post('about-us-store', [FrontendController::class, 'aboutUsStore'])->name('front-end.about-us.store');

        Route::get('services', [FrontendController::class, 'servicesIndex'])->name('front-end.services.index');
        Route::post('services-store', [FrontendController::class, 'servicesStore'])->name('front-end.services.store');

        // Route::resource('about-us', FrontendController::class, [
        //     'as' => 'front-end'
        // ]);
        // Route::resource('services', FrontendController::class, [
        //     'as' => 'front-end'
        // ]);
    });


    Route::resource('vendor', VendorController::class);



    // Report 
    Route::group(['prefix' => 'report'], function () {
        Route::get('stock', [ReportStockController::class, 'index'])->name('report.stock.index');
        Route::get('stock-mutation', [ReportStockMutationController::class, 'index'])->name('report.stock-mutation.index');
        Route::get('user', [ReportUserController::class, 'index'])->name('report.user.index');
        Route::get('income', [ReportIncomeController::class, 'index'])->name('report.income.index');
        Route::get('hpp', [ReportHppController::class, 'index'])->name('report.hpp.index');
        Route::get('gross', [ReportGrossController::class, 'index'])->name('report.gross.index');
        Route::get('wishlist', [ReportWishlistController::class, 'index'])->name('report.wishlist.index');
        Route::get('cart', [ReportCartController::class, 'index'])->name('report.cart.index');
        Route::get('share-product', [ReportShareProductController::class, 'index'])->name('report.share-product.index');
    });

    


    Route::group(['prefix' => 'inventory'], function () {
        Route::resource('adjustment', AdjustmentController::class);
        Route::get('adjustment/{adjustment}/print', [AdjustmentController::class, 'print'])->name('adjustment.print');
        Route::get('stok_opname', [AdjustmentController::class, 'stok_opname'])->name('adjustment.stok_opname');
        Route::get('stok_opname_print', [AdjustmentController::class, 'stok_opname_print'])->name('adjustment.stok_opname_print');

        Route::resource('item', ItemController::class);
        Route::get('items/export', [ItemController::class, 'export'])->name('items.export');
        Route::get('item_detail/export', [ItemController::class, 'export_item_detail'])->name('item_detail.export');
        Route::post('items/import', [ItemController::class, 'import'])->name('items.import');
        Route::post('item_detail/import', [ItemController::class, 'import_item_detail'])->name('item_detail.import');
        Route::resource('category', CategoryController::class);
        Route::resource('brand', BrandController::class);
        Route::get('brand/search', [BrandController::class, 'search'])->name('brand.search');
        Route::resource('transfer', TransferController::class);
        Route::get('transfer/{transfer}/print', [TransferController::class, 'print'])->name('transfer.print');
        Route::resource('warehouses', WarehouseController::class);
    });
    Route::resource('promotions', PromotionController::class);
    Route::group(['prefix' => 'settings'], function () {
        Route::resource('customer', UserController::class);
        Route::post('customer/store', 'UserController@store')->name('customer.store2');
        Route::get('customer/search', [UserController::class, 'search'])->name('customer.search');
        Route::resource('role', RoleController::class);
        Route::resource('staff', StaffController::class);
        Route::resource('general', SettingsController::class);
        Route::resource('mobile_app', MobileAppSettingsController::class);
    });

    Route::group(['prefix' => 'components', 'as' => 'components.'], function () {
        Route::get('/alert', function () {
            return view('admin.component.alert');
        })->name('alert');
        Route::get('/accordion', function () {
            return view('admin.component.accordion');
        })->name('accordion');
    });
    
    Route::get('/about-us', function () {
        return view('user.about_us');
    })->name('about-us');
    
    Route::get('/service', function () {
        return view('user.service');
    })->name('service');
    
    Route::get('/contact-us', function () {
        return view('user.contact_us');
    })->name('contact-us');

   
});
