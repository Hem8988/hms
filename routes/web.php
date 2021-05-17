<?php

use App\Models\admin;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\reservationController;
use App\Http\Controllers\countryselelct;
use App\Http\Controllers\paymentcontroller;
use App\Models\room_Category;
use App\Http\Controllers\roosAvalableController;
use App\Http\Controllers\reinformationController;




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

Auth::routes();

//route for select country state and city
Route::get('/home', [countryselelct::class, 'getCountry'])->name('reservation');
Route::post('/get-state', [countryselelct::class, 'fetchState']);
Route::post('/get-city', [countryselelct::class, 'fetchCity']);

// Route::get('/home', [countryselelct::class, 'roomCategories'])

Route::get('/RoomsAvalability', [roosAvalableController::class, 'view']);
Route::post('/error', [reservationController::class, 'insertreservation'])->name('error');
Route::post('/reservation', [reservationController::class, 'insertreservation'])->name('reservation-done');
Route::get('/reservation-Information', [reinformationController::class, 'reservationInformation']);


// route for admin login
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {
        Route::view('login', 'admin.login')->name('admin.login');
        Route::post('login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.auth');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::view('dashboard', 'admin.home')->name('admin.home');
        Route::post('logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
    });
});

//route for add room category
Route::get('/roomcategory', function () {
    return view('admin.room_category.add');
});
Route::post('/roomcategory', [RoomCategoryController::class, 'addCategoryroom']);
Route::get('/roomlist', [RoomCategoryController::class, 'roomList'])->name('admin.room_category.list');
Route::get('/delete/{id}', [RoomCategoryController::class, 'delete']);
Route::get('/Edit/{id}', [RoomCategoryController::class, 'ShowEditCategory']);
Route::post('/EditRoom/{id}', [RoomCategoryController::class, 'EditCategory']);

// route for add room
Route::get('/addrRoom', function () {
    $categoryRoom = room_Category::all();
    return view('admin.room.add', compact('categoryRoom'));
});
Route::post('/addrRoom', [roomController::class, 'addRoom']);
Route::get('/Listofroom', [roomController::class, 'room_list'])->name('admin.room.list');
Route::get('/deleteRoom/{id}', [roomController::class, 'delete']);
Route::get('/edit/{id}', [roomController::class, 'ShowEditRoom']);
Route::post('/editRoom/{id}', [roomController::class, 'EditRoom']);



//payment route
Route::get('/amount', [paymentcontroller::class, 'getamount'])->name('index');
Route::get('/success', [paymentcontroller::class, 'success']);
Route::post('/payments', [paymentcontroller::class, 'payment']);
Route::post('/pay', [paymentcontroller::class, 'pay']);
Route::post('/error', [paymentcontroller::class, 'error']);
