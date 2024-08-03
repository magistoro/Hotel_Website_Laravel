<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\HomeController as AuthController;

use App\Http\Controllers\Admin\PenthouseController as AdminPenthouseController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

use App\Http\Controllers\Admin\ServiceController as AdminServiceController;

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\AmenityController as AdminAmenityController;
use App\Http\Controllers\Admin\Check_IntoController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\GoogleController;

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

Route::get('/',  function(){
    return redirect()->route('home');
});

Route::get('/home', [IndexController::class, 'index'])->name('home');

Route::get('/account', [AccountController::class, 'index'])->name('account')->middleware('account');


Route::group([
    'prefix' => 'rooms',
    'namespace' => 'App\Http\Controllers\Rooms',
    'as' => 'rooms.',
  ], function () {

  

    Route::get('/', [IndexController::class, 'rooms'])->name('rooms');
    Route::get('/search', [IndexController::class, 'search'])->name('search');

    Route::get('/booking', [IndexController::class, 'showBookingForm'])->name('booking.form');
    Route::post('/booking', [IndexController::class, 'store'])->name('booking.store');

    Route::get('/order/{order}', [IndexController::class, 'order'])->name('order');

    Route::get('/{room}', [IndexController::class, 'room'])->name('show');
   
  });
 
 




Route::get('/about-us', [IndexController::class, 'aboutUs'])->name('about-us');
Route::get('/blog', [IndexController::class, 'blog'])->name('blog');
Route::get('/blog_details', [IndexController::class, 'blog_details'])->name('blog_details');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');


// Google
Route::prefix('google')->name('google.')->group(function () {
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::post('registration', [GoogleController::class, 'registrationWithGoogle'])->name('registration');
    Route::get('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});
Route::get('auth/google/callback', [GoogleController::class, 'callbackFromGoogle']);



Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
    'as' => 'admin.',
  ], function () {
      
    Route::get('/', [AdminIndexController::class, 'index'])->name('index');

    Route::prefix('penthouse')->namespace('App\Http\Controllers\Admin')->name('penthouse.')->group(function() {
        // products Index (Admin)
        Route::get('/', [AdminPenthouseController::class, 'index'])->name('index');
        // products Create
        Route::get('/create', [AdminPenthouseController::class, 'create'])->name('create');
        // products Store
        Route::post('/', [AdminPenthouseController::class, 'store'])->name('store');
        // products Edit 
        Route::get('/{penthouse}/edit', [AdminPenthouseController::class, 'edit'])->name('edit');
        Route::get('/{penthouse}', [AdminPenthouseController::class, 'show'])->name('show');
        // products Update
        Route::patch('/{penthouse}', [AdminPenthouseController::class, 'update'])->name('update');
        // products Destroy 
        Route::delete('/{penthouse}', [AdminPenthouseController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('room')->namespace('App\Http\Controllers\Admin')->name('room.')->group(function() {
        // products Index (Admin)
        Route::get('/', [RoomController::class, 'index'])->name('index');
        // products Create
        Route::get('/create', [RoomController::class, 'create'])->name('create');

        Route::get('/filter', [RoomController::class, 'filter'])->name('filter');

        // products Store
        Route::post('/', [RoomController::class, 'store'])->name('store');
        // products Edit 
        Route::get('/{room}/edit', [RoomController::class, 'edit'])->name('edit');
        Route::get('/{room}', [RoomController::class, 'show'])->name('show');
        // products Update
        Route::patch('/{room}', [RoomController::class, 'update'])->name('update');
        // products Destroy 
        Route::delete('/{room}', [RoomController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('category')->namespace('App\Http\Controllers\Admin')->name('category.')->group(function() {
        // products Index (Admin)
        Route::get('/', [AdminCategoryController::class, 'index'])->name('index');
        // products Create
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('create');
        // products Store
        Route::post('/', [AdminCategoryController::class, 'store'])->name('store');
        // products Edit 
        Route::get('/{category}/edit', [AdminCategoryController::class, 'edit'])->name('edit');

        Route::get('/{category}', [AdminCategoryController::class, 'show'])->name('show');
        // products Update
        Route::patch('/{category}', [AdminCategoryController::class, 'update'])->name('update');
        // products Destroy 
        Route::delete('/{category}', [AdminCategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('service')->namespace('App\Http\Controllers\Admin')->name('service.')->group(function() {
        // products Index (Admin)
        Route::get('/', [AdminServiceController::class, 'index'])->name('index');
        // products Create
        Route::get('/create', [AdminServiceController::class, 'create'])->name('create');
        // products Store
        Route::post('/', [AdminServiceController::class, 'store'])->name('store');
        // products Edit 
        Route::get('/{service}/edit', [AdminServiceController::class, 'edit'])->name('edit');

        Route::get('/{service}', [AdminServiceController::class, 'show'])->name('show');
        // products Update
        Route::patch('/{service}', [AdminServiceController::class, 'update'])->name('update');
        // products Destroy 
        Route::delete('/{service}', [AdminServiceController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('amenity')->namespace('App\Http\Controllers\Admin')->name('amenity.')->group(function() {
        // products Index (Admin)
        Route::get('/', [AdminAmenityController::class, 'index'])->name('index');
        // products Create
        Route::get('/create', [AdminAmenityController::class, 'create'])->name('create');
        // products Store
        Route::post('/', [AdminAmenityController::class, 'store'])->name('store');
        // products Edit 
        Route::get('/{amenity}/edit', [AdminAmenityController::class, 'edit'])->name('edit');

        Route::get('/{amenity}', [AdminAmenityController::class, 'show'])->name('show');
        // products Update
        Route::patch('/{amenity}', [AdminAmenityController::class, 'update'])->name('update');
        // products Destroy 
        Route::delete('/{amenity}', [AdminAmenityController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('user')->namespace('App\Http\Controllers\Admin')->name('user.')->group(function() {
        // products Index (Admin)
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
        // products Create
        Route::get('/create', [AdminUserController::class, 'create'])->name('create');
        // products Store
        Route::post('/', [AdminUserController::class, 'store'])->name('store');
        // products Edit 
        Route::get('/{user}/edit', [AdminUserController::class, 'edit'])->name('edit');

        Route::get('/{user}', [AdminUserController::class, 'show'])->name('show');
        // products Update
        Route::patch('/{user}', [AdminUserController::class, 'update'])->name('update');
        // products Destroy 
        Route::delete('/{user}', [AdminUserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('role')->namespace('App\Http\Controllers\Admin')->name('role.')->group(function() {
        // products Index (Admin)
        Route::get('/', [RoleController::class, 'index'])->name('index');
        // products Create
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        // products Store
        Route::post('/', [RoleController::class, 'store'])->name('store');
        // products Edit 
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');

        Route::get('/{role}', [RoleController::class, 'show'])->name('show');
        // products Update
        Route::patch('/{role}', [RoleController::class, 'update'])->name('update');
        // products Destroy 
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('check_into')->namespace('App\Http\Controllers\Admin')->name('check_into.')->group(function() {
        // products Index (Admin)
        Route::get('/', [Check_IntoController::class, 'index'])->name('index');

        Route::get('/{ticket}', [Check_IntoController::class, 'settle'])->name('settle');
        Route::get('/order/{order}/settle-all', [Check_IntoController::class, 'settleAll'])->name('settle-all');

        Route::get('/create', [Check_IntoController::class, 'create'])->name('create');


        Route::get('/{ticket}/evict', [Check_IntoController::class, 'evict'])->name('evict');
        Route::get('/order/{order}/evict-all', [Check_IntoController::class, 'evictAll'])->name('evict-all');

        Route::get('/{ticket}/cancel', [Check_IntoController::class, 'cancel'])->name('cancel');
        Route::post('/order/{order}/cancel-all', [Check_IntoController::class, 'cancelAll'])->name('cancel-all');


        // products Store
        Route::post('/', [Check_IntoController::class, 'store'])->name('store');
        // products Edit 
        Route::get('/{product:slug}/edit', [Check_IntoController::class, 'edit'])->name('edit');
        // products Update
        Route::patch('/{product:slug}', [Check_IntoController::class, 'update'])->name('update');
        // products Destroy 
        Route::delete('/{product:slug}', [Check_IntoController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('order')->namespace('App\Http\Controllers\Admin')->name('order.')->group(function() {
        // products Index (Admin)
        Route::get('/new', [OrderController::class, 'new'])->name('new');
        Route::get('/occupied', [OrderController::class, 'occupied'])->name('occupied');
        Route::get('/completed', [OrderController::class, 'completed'])->name('completed');

        Route::get('/today_orders', [OrderController::class, 'today_orders'])->name('today_orders');

        
        // order Create
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        // order Store
        
        Route::post('/', [OrderController::class, 'store'])->name('store');

        // order Edit 
        Route::get('/{product:slug}/edit', [OrderController::class, 'edit'])->name('edit');
        // order Show
        Route::get('/{order}', [OrderController::class, 'show'])->name('show');
        // order Update
        Route::patch('/{product:slug}', [OrderController::class, 'update'])->name('update');
        // order Destroy 
        Route::delete('/{product:slug}', [OrderController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('ticket')->namespace('App\Http\Controllers\Admin')->name('ticket.')->group(function() {
        
        Route::get('/', [TicketController::class, 'index'])->name('index');
        // products Create
        Route::get('/create', [TicketController::class, 'create'])->name('create');
        // products Store
        Route::post('/', [TicketController::class, 'store'])->name('store');
        // products Edit 
        Route::get('/{product:slug}/edit', [TicketController::class, 'edit'])->name('edit');
        // products Show
        Route::get('/{ticket}', [TicketController::class, 'show'])->name('show');
        // products Update
        Route::patch('/{product:slug}', [TicketController::class, 'update'])->name('update');
        // products Destroy 
        Route::delete('/{product:slug}', [TicketController::class, 'destroy'])->name('destroy');
    });

});
// Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth.redirect');

Auth::routes();


