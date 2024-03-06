<?php

use App\Http\Controllers\SalesController;
use App\Http\Controllers\ReceiveItemController;
use App\Http\Controllers\AdjustmentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CustomerController;
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
use App\Http\Controllers\VendorController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/wishlist', function () {
    return view('user.wishlist');
})->name('wishlist');

Route::get('/profile', function () {
    return view('user.profile');
})->name('profile');

Route::get('/item-details', function () {
    return view('user.item_details');
})->name('item-details');

Route::get('/catalog', function () {
    return view('user.catalog');
})->name('catalog');

Route::get('/checkout', function () {
    return view('user.checkout');
})->name('checkout');

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

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    

    // Transaction
    Route::group(['prefix' => 'transaction'], function () {
        Route::resource('sales', SalesController::class, [
            'as' => 'transaction'
        ]);
        Route::get('sales/{sales}/print', [SalesController::class, 'print'])->name('transaction.sales.print');

        Route::resource('purchasing', PurchasingController::class, [
            'as' => 'transaction'
        ]);
        Route::get('purchasing/{purchasing}/print', [PurchasingController::class, 'print'])->name('transaction.purchasing.print');

        Route::group(['prefix' => 'purchases'], function () {
            Route::resource('receive_item', ReceiveItemController::class);
            Route::get('receive_item/{receive_item}/print', [ReceiveItemController::class, 'print'])->name('receive_item.print');

        });
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
        Route::resource('category', CategoryController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('transfer', TransferController::class);
        Route::get('transfer/{transfer}/print', [TransferController::class, 'print'])->name('transfer.print');
        Route::resource('warehouses', WarehouseController::class);
    });
    Route::resource('promotions', PromotionController::class);
    Route::group(['prefix' => 'settings'], function () {
        Route::resource('customer', CustomerController::class);
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
});
