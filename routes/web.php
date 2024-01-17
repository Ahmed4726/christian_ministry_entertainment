<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaypalWithdrawalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripeShopController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\GiftcardController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PaypalShopController;
use App\Http\Controllers\EventController;
use App\Http\Middleware\Dashboard;
use App\Http\Middleware\CheckUserRole;
use App\Http\Middleware\UserRole;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/test', [ProductController::class,'test'])->name('test');
// if (Auth::user()->role_id == 2 && Auth::user()->status == 'Unpaid') {
    // Redirect the user to the payment_methods route
//     Route::get('/', function () {
//         return view('payment_methods');
//     })->name('payment_methods');
// }
// Route::get('/withdrawals', [PaypalWithdrawalController::class,'showWithdrawalForm'])->name('withdrawal');
// Route::post('/withdrawals', 'WithdrawalController@store')->name('withdrawal.post');

// Route::view('withdrawals','withdrawals');

// Show withdrawal form
Route::get('/withdrawal', [WithdrawalController::class, 'showWithdrawalForm'])->name('withdrawal.form');

// Process the withdrawal
Route::post('/withdrawal', [WithdrawalController::class, 'processWithdrawal'])->name('withdrawal.post');

// Show the withdrawal method selection modal
Route::get('/withdrawal/method', [WithdrawalMethodController::class, 'showWithdrawalMethodForm'])->name('withdrawal.method');

// Process the selected withdrawal method
Route::post('/withdrawal/method', [WithdrawalMethodController::class, 'processWithdrawalMethod'])->name('withdrawal.method.post');



Route::get('/', function () { return view('welcome'); })->name('welcome')->middleware('CheckUserRole');
Route::get('/free', function () { return view('CSBCN'); })->name('free');
Route::get('/shopping-mall', [UserController::class,'shopping_mall'])->name('shopping_mall');
Route::get('/N-stores-ads', function () { return view('N_Stores_ads'); })->name('N-stores-ads');
Route::get('/psp', function () { return view('PSP');})->name('PSP');
Route::get('/crcsa', function () { return view('CRCSA');})->name('CRCSA');
Route::get('/events', function () { return view('events');})->name('events');
Route::get('/blog', function () { return view('blog');})->name('blog');
Route::get('/gift-card', [ProductController::class,'all_products'])->name('gift-card');
Route::get('/show_product/{id}', [ProductController::class,'show_product'])->name('show_product');
Route::get('/videos', function () { return view('videos');})->name('videos');
Route::get('/jobs', function () { return view('jobs');})->name('jobs');
Route::post('/addUser',[UserController::class, 'store'])->name('store.user');
Route::get('/newest_blog',[UserBlogController::class,'published_blogs'])->name('newest_blog');
Route::get('/allgroups',[GroupController::class,'index'])->name('allgroups'); 
Route::middleware(['auth'])->group(function () {
Route::post('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::get('/cart',[ProductController::class,'showCart'])->name('show.cart');
Route::post('/cart/{id}/update', [ProductController::class,'updateCart'])->name('cart.update');
Route::get('/cart/{id}/delete', [ProductController::class,'deleteCart'])->name('cart.delete');
Route::post('/checkout_page',[ProductController::class,'Checkout'])->name('checkout_page');
Route::get('/checkout',[ProductController::class,'showCheckout'])->name('checkout');
Route::get('/payment_methods', [ProductController::class,'payment_methods'])->name('payments');
Route::post('/create-user-blog',[UserBlogController::class,'create_blog']  )->name('create-user_blog');
Route::get('/user-blog',[UserBlogController::class,'user_blog']  )->name('user_blog');
Route::get('vendor-shop/{id}',[ShopController::class,'Shop'])->name('vendor-shop');
// Route::get('payment_methods', [ProductController::class,'payment_methods'])->name('payment_methods');
});

Route::get('/dashboard', function () { 
    return view('layouts.admin.main_dashboard'); })->name('dashboard')->middleware('Dashboard');

Route::middleware(['auth'])->group(function () {
    Route::prefix("admin")->group(function () {
        Route::get("/addUser", [UserController::class, "addUser"])->name("admin.users.addUser")->middleware('IsAdmin');
        Route::get("/allUsers", [UserController::class, "AllUser"])->name("admin.users.allUser")->middleware('IsAdmin');
        Route::post('/createUser', [UserController::class, 'createUser'])->name("admin.user.createUser")->middleware('IsAdmin');
        Route::get('/editUser/{id?}', [UserController::class, 'editUser'])->name('admin.user.editUser')->middleware('IsAdmin');
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix("admin")->group(function () {
        Route::get("/addProduct", [ProductController::class,"addProduct"])->name("admin.product.addProduct")->middleware('IsAdmin');
        Route::post('/createProduct', [ProductController::class, 'createProduct'])->name("admin.product.createProduct")->middleware('IsAdmin');
        Route::get('/editProduct/{id}', [ProductController::class, 'editProduct'])->name('admin.product.editProduct')->middleware('IsAdmin');
        Route::post('/updateProduct{id}', [ProductController::class, 'updateProduct'])->name("admin.product.updateProduct")->middleware('IsAdmin');
        Route::get('/deleteproduct/{id}', [ProductController::class, 'deleteProduct'])->name('admin.product.deleteProduct')->middleware('IsAdmin');
    
    });
});
Route::middleware('auth')->group(function () {
    Route::prefix("admin")->group(function () {
        Route::get("/addCategory", [CategoryController::class,"addCategory"])->name("admin.category.addCategory")->middleware('IsAdmin');
        Route::post('/createCategory', [CategoryController::class, 'createCategory'])->name("admin.category.createCategory")->middleware('IsAdmin');
        Route::get('/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('admin.category.editCategory')->middleware('IsAdmin');
        Route::post('/updateCategory/{id}', [CategoryController::class, 'updateCategory'])->name('admin.category.updateCategory')->middleware('IsAdmin');
        Route::get('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.category.deleteCategory')->middleware('IsAdmin');
    });
});
Route::middleware('auth')->group(function () { 
    Route::prefix("client")->group(function () {
    Route::get('/profile', [ProfileController::class, 'client_profile'])->name('client.profile.read');
    Route::get('/profile/{id}', [ProfileController::class, 'client_edit'])->name('client.profile.edit');
    Route::post('/profile/{id}', [ProfileController::class, 'client_update'])->name('client.profile.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('client.profile.destroy');
});
});

Route::middleware('auth')->group(function () { 
    Route::prefix("admin")->group(function () {
    Route::get('/profile', [ProfileController::class, 'admin_profile'])->name('admin.profile.read')->middleware('IsAdmin');
    Route::get('/profile/{id}', [ProfileController::class, 'edit_admin'])->name('admin.profile.edit')->middleware('IsAdmin');
    Route::post('/profile/{id}', [ProfileController::class, 'update_admin'])->name('admin.profile.update')->middleware('IsAdmin');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('admin.profile.destroy')->middleware('IsAdmin');
});

});

Route::middleware('auth')->group(function () { 


});

// Route::middleware('auth')->group(function () { 
//     Route::get('/withdrawals', [PaypalWithdrawalController::class,'showWithdrawalForm'])->name('withdrawal');
//     Route::post('/withdrawals', 'WithdrawalController@store')->name('withdrawal.post');
    
//     });

Route::middleware('auth')->group(function () { 
    Route::prefix("admin")->group(function () {
    Route::get('/withdrawals', [WithdrawalController::class,'index'])->name('admin.withdrawal')->middleware('IsAdmin');
    Route::post('/withdrawals', [WithdrawalController::class,'store'])->name('admin.withdrawal.post')->middleware('IsAdmin');
});
});

Route::middleware('auth')->group(function () { 
    Route::prefix("vendor")->group(function () {
        Route::get('/profile', [ProfileController::class, 'vendor_profile'])->name('vendor.profile.read');
        Route::get('/profile/{id}', [ProfileController::class, 'edit_vendor'])->name('vendor.profile.edit');
        Route::post('/profile/{id}', [ProfileController::class, 'update_vendor'])->name('vendor.profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('vendor.profile.destroy');
});
});

Route::middleware('auth')->group(function () {
    Route::prefix("admin")->group(function () {
    Route::get('/blog_requests', [UserBlogController::class, 'show'])->name('blog_requests.show')->middleware('IsAdmin');
    Route::put('/blogs_request/{id}/accept', [UserBlogController::class, 'accept'])->name('blogs.accept')->middleware('IsAdmin');
    Route::delete('/blogs/reject/{id}', [UserBlogController::class, 'reject'])->name('blogs.reject')->middleware('IsAdmin');
});
});

Route::middleware('auth')->group(function () {
    Route::prefix("admin")->group(function () {
    Route::get('/all_orders', [ProductController::class, 'show_all_orders'])->name('all.orders.show')->middleware('IsAdmin');
});
});

Route::middleware('auth')->group(function () {
    Route::prefix("admin")->group(function () {
    Route::get('/addGroup', [GroupController::class, 'addGroup'])->name('admin.group.addGroup')->middleware('IsAdmin');
    Route::post('/createGroup', [GroupController::class, 'createGroup'])->name("admin.group.createGroup")->middleware('IsAdmin');
    Route::get('/editGroup/{id}', [GroupController::class, 'editGroup'])->name('admin.group.editGroup')->middleware('IsAdmin');
    Route::post('/updateGroup/{id}', [GroupController::class, 'updateCategory'])->name('admin.group.updateGroup')->middleware('IsAdmin');
    Route::get('/deleteGroup/{id}', [GroupController::class, 'deleteCategory'])->name('admin.group.deleteGroup')->middleware('IsAdmin');
});
});
// Route::controller(StripeController::class)->group(function(){
//     Route::get('stripe', 'stripe')->name('stripe');
//     Route::post('stripe', 'stripePost')->name('stripe.post');
// });
Route::middleware('auth')->group(function () {
    Route::controller(StripeController::class)->group(function(){
        Route::get('stripe', 'stripe')->name('stripe');
        Route::post('stripe', 'stripePost')->name('stripe.post');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(StripeShopController::class)->prefix('shop')->group(function(){
        Route::get('stripe', 'stripe')->name('shop.stripe');
        Route::post('stripe', 'stripePost')->name('shop.stripe.post');
    });
});

// Route::middleware('auth')->group(function () {
// Route::get('paypal', [PayPalController::class, 'index'])->name('paypal');
// Route::get('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
// Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
// Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment/cancel');
// });
Route::middleware('auth')->group(function () {
Route::controller(PaypalController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal')->name('create.payment');
        Route::get('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
    });

});
Route::middleware('auth')->group(function () {
    Route::prefix('shop')->group(function () {
        Route::get('paypal', [PaypalShopController::class,'showPaypal'])->name('shop.show.paypal');
        Route::get('make-payment', [PaypalShopController::class,'handlePayment'])->name('shop.make.payment');
        Route::get('cancel-payment', [PaypalShopController::class,'paymentCancel'])->name('shop.cancel.payment');
        Route::get('success-payment', [PaypalShopController::class,'paymentSuccess'])->name('shop.success.payment');
    });
});
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
Route::controller(FullCalenderController::class)->group(function(){
    Route::get('fullcalender', 'index')->name('admin.calender.show');
    Route::post('fullcalenderAjax', 'ajax');
});
});
});
require __DIR__.'/auth.php';
