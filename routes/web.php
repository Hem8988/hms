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
use App\Http\Controllers\roosAvalableController;
use App\Http\Controllers\reinformationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\Food_categoryController;
use App\Models\room_Category;

use App\Models\category_food;
use App\Models\room;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FoodController;




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
// frontend 
Route::get('/', [PageController::class, 'Home']);
Route::get('/about', [PageController::class, 'About']);
Route::get('/event', [PageController::class, 'Event']);
Route::get('/rooms', [PageController::class, 'Rooms']);


// Route::get('rooms','PageController@Rooms');	
//route for select country state and city
Route::get('/reservation', [countryselelct::class, 'getCountry'])->name('reservation');
Route::post('/get-state', [countryselelct::class, 'fetchState']);
Route::post('/get-city', [countryselelct::class, 'fetchCity']);

// Route::get('/home', [countryselelct::class, 'roomCategories'])

Route::get('/RoomsAvalability', [roosAvalableController::class, 'view']);
Route::post('/error', [reservationController::class, 'insertreservation'])->name('error');
Route::post('/reservation', [reservationController::class, 'insertreservation'])->name('reservation-done');
Route::get('/reservation-Information', [reinformationController::class, 'reservationInformation']);
Route::get('information/{id}', [reinformationController::class, 'getdetail']);
Route::post('/reservation-Cancellation', [reinformationController::class, 'reaervationCanclling']);

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




Route::get('AddEvent', function () {
    return view('admin.event.add');
});
Route::post('/EventAdd', [EventController::class, 'AddPost'])->name('admin.event.add');
Route::get('/list', [EventController::class, 'getEvent'])->name('admin.event.list');
Route::get('/edit/{id}', [EventController::class, 'Edit']);
Route::post('/editEvent/{id}', [EventController::class, 'EditPost']);
Route::get('/deleteEvent/{id}', [EventController::class, 'Delete']);



Route::get('/AboutList', [AboutController::class, 'getAbout'])->name('admin.about.list');
Route::get('/Aboutedit', [AboutController::class, 'edit']);
Route::post('/AboutEdit', [AboutController::class, 'Aboutpost']);


Route::get('/descriptionList', [DescriptionController::class, 'getDescription'])->name('admin.description.list');
Route::get('/Description&&Show&&show', [DescriptionController::class, 'editDescriptionShow']);
Route::post('/edit&&Description', [DescriptionController::class, 'editDescription']);


Route::get('/InformationList', [InformationController::class, 'getInformation'])->name('admin.information.list');
Route::get('/Information&&Edit&&show', [InformationController::class, 'InformationeditShow']);
Route::post('/Information&&Edit', [InformationController::class, 'informationEdit']);



Route::get('slider', function () {
    return view('admin.slide.add');
});
Route::post('/Slide&&Add', [SlideController::class, 'AddSlide']);
Route::get('/slide&&list', [SlideController::class, 'getSlide']);
Route::get('/Slide&&edit&&show/{id}', [SlideController::class, 'slideEditShow']);
Route::post('/Slide&&edit/{id}', [SlideController::class, 'Editslide']);
Route::get('/delete&&slide/{id}', [SlideController::class, 'slideDelete']);


Route::get('List&&Reservation', function () {
    $reservation = DB::table('reservations')
        ->join('countries', 'reservations.country', "=", 'countries.country_id')
        ->join('states', 'reservations.state', "=", 'states.state_id')
        ->join('cities', 'reservations.city', "=", 'cities.city_id')
        ->join('room__categories', 'reservations.troom', "=", 'room__categories.id')
        ->join('rooms', 'reservations.nroom', "=", 'rooms.id')
        ->select('reservations.*', 'countries.country_name', 'states.state_name', 'cities.city_name', 'room__categories.name', 'rooms.room_name')
        ->get();
    // dd($ReservationGet);
    return view('admin.reservation.list', compact('reservation'));
});

Route::get('viewDdetails/{id}', [reservationController::class, 'getdetail']);
Route::get('/Edit&&detail/{id}', [reservationController::class, 'Edit']);
Route::get('/Edit&&detail%%Post/{id}', [reservationController::class, 'EditPost']);
Route::get('/delete&&detail/{id}', [reservationController::class, 'Delete']);

//list of users
Route::get('list&&ouer', function () {
    $user = user::all();
    return view('admin.user.list', compact('user'));
});

//foodCategory
Route::get('addFoodCategory', function () {
    return view('admin.foodCategory.add');
});
Route::post('/Add&&Category', [Food_categoryController::class, 'inserCategory']);
Route::get('list&&Category', function () {
    $foodCategory = category_food::all();
    return view('admin.foodCategory.list', compact('foodCategory'));
});
Route::get('/Edit&&categoryofFood/{id}', [Food_categoryController::class, 'Editfood']);
Route::post('/Edit/categoryFood/{id}', [Food_categoryController::class, 'EditfoodPost']);
Route::get('/delete&&foodCategory/{id}', [Food_categoryController::class, 'Delete']);



Route::get('addFood', function () {
    $categoryFood = category_food::all();
    return view('admin.food.add', compact('categoryFood'));
});
Route::post('/Add/food', [FoodController::class, 'AddFood'])->name('admin.food.add');
Route::get('addFood', function () {
    $categoryFood = category_food::all();
    return view('admin.food.add', compact('categoryFood'));
});
Route::get('/list/food', [FoodController::class, 'getFood']);
Route::get('/show/Edit/Food/{id}', [FoodController::class, 'showEdit']);
Route::post('/Edit/Food/{id}', [FoodController::class, 'Editfood']);
Route::get('/delete/food/{id}', [FoodController::class, 'Delete']);
