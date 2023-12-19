<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;

// Unprotected routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/browse', [ProductController::class, 'browseProducts'])->name('products.browse');
Route::get('/products/search', [ProductController::class, 'searchProducts'])->name('products.search');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/view', [CartController::class, 'viewCart'])->name('cart.view');

    // Orders Routes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/history', [OrderController::class, 'viewOrderHistory'])->name('orders.history');

   // User Profile Routes
Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile.show');
Route::get('/user/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
Route::put('/user/profile/update', [UserProfileController::class, 'updateUserProfile'])->name('profile.update');
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Logout Route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/manage-orders', [AdminController::class, 'manageOrders'])->name('admin.manageOrders');
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
    Route::get('/admin/add-product', [AdminController::class, 'addProduct'])->name('admin.addProduct');
    Route::post('/admin/store-product', [AdminController::class, 'storeProduct'])->name('admin.storeProduct');
    Route::get('/admin/store-product-view', [AdminController::class, 'storeProductView'])->name('admin.storeProductView');
    Route::delete('/admin/remove-product/{product}', [AdminController::class, 'removeProduct'])->name('admin.removeProduct');
     // View order details
     Route::get('/admin/order/{orderId}', [AdminController::class, 'orderDetails'])
     ->name('admin.orderDetails');

 // Edit order
 Route::get('/admin/order/{orderId}/edit', [AdminController::class, 'editOrder'])
     ->name('admin.editOrder');

 Route::put('/admin/order/{orderId}/update', [AdminController::class, 'updateOrder'])
     ->name('admin.updateOrder');

 // Update order status
 Route::get('/admin/order/{orderId}/update-status', [AdminController::class, 'showUpdateOrderStatusForm'])
     ->name('admin.showUpdateOrderStatusForm');

 Route::put('/admin/order/{orderId}/update-status', [AdminController::class, 'updateOrderStatus'])
     ->name('admin.updateOrderStatus');
});
//Shipping routes
Route::middleware(['auth'])->group(function () {
    Route::get('/shipping/options', ['\App\Http\Controllers\User\ShippingController', 'showShippingOptions'])->name('shipping.options');
    Route::get('/shipping/costs', ['\App\Http\Controllers\User\ShippingController', 'showShippingCosts'])->name('shipping.costs');
    Route::get('/shipping/timeframes', ['\App\Http\Controllers\User\ShippingController', 'showDeliveryTimeframes'])->name('shipping.timeframes');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/payment/methods', [PaymentController::class, 'showPaymentMethods'])->name('payment.methods');
    Route::post('/payment/process/{method}', [PaymentController::class, 'processPayment'])->name('payment.process');

    // Routes for specific payment methods
    Route::get('/payment/mpesa', [PaymentController::class, 'showMpesaPaymentForm'])->name('payment.mpesa');
    Route::post('/payment/mpesa', [PaymentController::class, 'processMpesaPayment']);

    Route::get('/payment/card', [PaymentController::class, 'showCardPaymentForm'])->name('payment.card');
    Route::post('/payment/card', [PaymentController::class, 'processCardPayment']);

    Route::get('/payment/bank', [PaymentController::class, 'showBankPaymentForm'])->name('payment.bank');
    Route::post('/payment/bank', [PaymentController::class, 'processBankTransfer']);

    Route::get('/payment/tigo', [PaymentController::class, 'showTigoPaymentForm'])->name('payment.tigo');
    Route::post('/payment/tigo', [PaymentController::class, 'processTigoPesaPayment']);

    Route::get('/payment/airtel', [PaymentController::class, 'showAirtelPaymentForm'])->name('payment.airtel');
    Route::post('/payment/airtel', [PaymentController::class, 'processAirtelMoneyPayment']);

    Route::get('/payment/cod', [PaymentController::class, 'showCashOnDeliveryForm'])->name('payment.cod');
    Route::post('/payment/cod', [PaymentController::class, 'processCashOnDelivery']);

    Route::get('/payment/pesapal', [PaymentController::class, 'showPesapalPaymentForm'])->name('payment.pesapal');
    Route::post('/payment/pesapal', [PaymentController::class, 'processPesaPalPayment']);
});
