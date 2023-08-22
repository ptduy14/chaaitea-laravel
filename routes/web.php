<?php

// admin
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductPhotosController;
use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\OrderManageController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ManageAccAdminController;
use App\Http\Controllers\Admin\StaffController;

//main-page
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\AuthCustomerController;
use App\Http\Controllers\Main\CartController;
use App\Http\Controllers\Main\CartDetailController;
use App\Http\Controllers\Main\AccountController;
use App\Http\Controllers\Main\OrderController;
use App\Http\Controllers\Main\ProductsController;
use App\Http\Controllers\Main\CategoryMainController;

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

Route::middleware('auth.guest')->group(function () {
    // admin
    Route::get('/admin/login', [AuthAdminController::class, 'indexLoginForm']);
    Route::post('/admin/login', [AuthAdminController::class, 'handleLogin']);

    // customer
    Route::get('/register', [AuthCustomerController::class, 'indexFormRegister']);
    Route::post('/register', [AuthCustomerController::class, 'handleFormRegister']);

    Route::get('/login', [AuthCustomerController::class, 'indexFormLogin']);
    Route::post('/login', [AuthCustomerController::class, 'handleFormLogin']);

    Route::get('/verify/{id}', [AuthCustomerController::class, 'indexVerifyAccount'])->name('verify.index');
    Route::get('/verify/{id}/{token}', [AuthCustomerController::class, 'handleVerifyAccount'])->name('verify.account');
    Route::get('/re-verify/{id}', [AuthCustomerController::class, 'handleReVerifyAccount']);

    Route::get('/forget-password', [AuthCustomerController::class, 'indexForgetPasswordValidateForm']);
    Route::post('/forget-password', [AuthCustomerController::class, 'handleForgetPasswordValidateForm']);

    Route::post('/forget-password/handling', [AuthCustomerController::class, 'handleForgetPasswordForm']);
});

Route::middleware('auth.login')->group(function() {

    Route::middleware('role:admin|staff')->group(function() {
        // admin page
        Route::get('/admin', [PageController::class, 'index']);

        // admin logout
        Route::get('/admin/logout', [AuthAdminController::class, 'handleLogout']);
        
        // category
        Route::resource('/admin/category', CategoryController::class);
        Route::get('/admin/category/{id}/product-in-cate', [CategoryController::class, 'indexProductInCate']);

        //product
        Route::resource('/admin/product', ProductController::class);

        //product-detail
        Route::get('/admin/product-detail/{id}/create', [ProductDetailController::class, 'createProductDetail']);
        Route::post('/admin/product-detail/{id}/store', [ProductDetailController::class, 'storeProductDetail']);
        Route::get('/admin/product-detail/{id}/index', [ProductDetailController::class, 'indexProductDetail']);
        Route::get('/admin/product-detail/{id}/edit', [ProductDetailController::class, 'editProductDetail']);
        Route::post('/admin/product-detail/{id}/update', [ProductDetailController::class, 'updateProductDetail']);

        //product-photos
        Route::get('/admin/product-photos/{id}/create', [ProductPhotosController::class, 'createProductPhotos']);
        Route::post('/admin/product-photos/{id}/store', [ProductPhotosController::class, 'storeProductPhotos']);
        Route::get('/admin/product-photos/{id}/index', [ProductPhotosController::class, 'indexProductPhotos']);
        Route::post('/admin/product-photos/{id}/update', [ProductPhotosController::class, 'updateProductPhotos']);

        // order
        Route::get('/admin/order', [OrderManageController::class, 'index']);
        Route::get('/admin/order/render', [OrderManageController::class, 'renderData']);
        Route::get('/admin/order/sort/{type}', [OrderManageController::class, 'hanldeSortOrder']);
        Route::get('/admin/order/{id}/{status}', [OrderManageController::class, 'handleChangeStatusOrder']);
        Route::get('/admin/order-detail/{id}', [OrderManageController::class, 'indexOrderDetail']);
        Route::get('/admin/order-search/{type}/{content}', [OrderManageController::class, 'handleSearchOrder']);

        // manager customer
        Route::get('/admin/customer', [CustomerController::class, 'indexCustomer']);
        Route::get('/admin/customer/search/{type}/{content}', [CustomerController::class, 'handleSearchCustomer']);
        
        Route::get('/admin/staff', [StaffController::class, 'indexStaff']);

    });

        // manager admin account
    Route::middleware('role:admin')->group(function() {
        // xử lí khi có người truy cập bằng phương thức GET mà không cung cấp mật khẩu xác thực
        Route::get('/admin/admin/edit', function () {
            return view('error-page');
        });
        Route::get('/admin/admin/delete', function () {
            return view('error-page');
        });

        Route::get('/admin/admin', [ManageAccAdminController::class, 'indexAdmin']);
        Route::get('/admin/admin/search/{type}/{content}', [ManageAccAdminController::class, 'handleSearchAdmin']);

        Route::get('/admin/admin/create', [ManageAccAdminController::class, 'indexCreateNewAdmin']);
        Route::post('/admin/admin/store', [ManageAccAdminController::class, 'storeCreateNewAddmin']);
        Route::post('/admin/admin/edit', [ManageAccAdminController::class, 'indexEditAdmin'])->middleware('check-password');
        Route::post('/admin/admin/update', [ManageAccAdminController::class, 'updateAdmin']);
        Route::post('/admin/admin/delete', [ManageAccAdminController::class, 'deleteAdmin'])->middleware('check-password');
    
        Route::get('/admin/staff/create', [StaffController::class, 'indexCreateNewStaff']);
        Route::post('/admin/staff/store', [StaffController::class, 'storeCreateNewStaff']);
        
    });

    Route::get('/logout', [AuthCustomerController::class, 'handleLogout']);

    Route::middleware('role:customer')->group(function() {

        Route::get('/account', [AccountController::class, 'index']);
        Route::post('/account', [AccountController::class, 'updateAccount']);
        Route::post('/account/change-passoword', [AccountController::class, 'ChangePasswordAccount']);


        Route::get('/order', [OrderController::class, 'indexOrder']);
        Route::get('/order/detail/{id}', [OrderController::class, 'indexOrderDetail'])->name('order.detail');

        Route::get('/order/payment', [OrderController::class, 'indexPayment']);
        Route::post('/order/payment', [OrderController::class, 'handlePaymentRequest']);
        Route::get('/order/confirm/{id}', [OrderController::class, 'handleConfirmOrder']);
        Route::get('/order/cancel/{id}', [OrderController::class, 'handleCancelOrder']);
    });
    
});

// Home
Route::get('', [HomeController::class, 'index']);

Route::get('/cart/add-cart-item/{id}', [CartController::class, 'addNewcartItemGET']);
Route::post('/cart/add-cart-item/{id}', [CartController::class, 'addNewcartItemPOST']);
Route::get('/cart/del-cart-item/{id}', [CartController::class, 'delCartItem']);
Route::get('/cart/edit-cart-item/{id}/{quantity}', [CartController::class, 'editCartItem']);
Route::get('/cart', [CartController::class, 'indexCart']);
Route::get('/cart-detail', [CartDetailController::class, 'index']);

// All product
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/product-detail/{id}', [HomeController::class, 'indexProductDetail']);
Route::get('/products/sort/{type}', [ProductsController::class, 'sortProducts']);
Route::get('/products/search/{content}', [ProductsController::class, 'searchProducts']);
Route::get('/products/filter/{price_start}/{price_end}', [ProductsController::class, 'filterProductsPrice']);

Route::get('/category/{id}/products/', [CategoryMainController::class,'productsOfCategory']);
Route::get('/category/{id}/products/sort/{type}', [CategoryMainController::class,'sortProductsOfCategory']);
Route::get('/category/{id}/products/search/{content}', [CategoryMainController::class,'seachProductsOfCategory']);
Route::get('/category/{id}/products/filter/{price_start}/{price_end}', [CategoryMainController::class,'filterProductsOfCategory']);