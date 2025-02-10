<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PassengerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\DriverManagementController;
use App\Http\Controllers\PassengerManagementController;
use App\Http\Controllers\RideManagementController;
use App\Http\Controllers\ReportAnalyticController;
use App\Http\Controllers\UserFeedbackController;

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

Route::get('/get-started', function () {
    return view('get-started');
})->name('get.started');

Route::get('/admin-login-register', function () {
    return view('admin-login-register');
})->name('admin.login.register');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management');
Route::get('/ride-management', [RideManagementController::class, 'index'])->name('ride.management');
Route::get('/report-analytic', [ReportAnalyticController::class, 'index'])->name('report.analytic');
Route::get('/user-feedback', [UserFeedbackController::class, 'index'])->name('user.feedback');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::middleware('auth:driver')->group(function () {
    Route::get('/driver/dashboard', [DriverController::class, 'dashboard'])->name('driver.dashboard');
    Route::post('/driver/logout', [DriverController::class, 'logout'])->name('driver.logout');
});

Route::get('/driver/dashboard', [DriverController::class, 'dashboard'])
    ->name('driver.dashboard')
    ->middleware('auth:driver');

Route::get('/user-management', [App\Http\Controllers\UserManagementController::class, 'index'])->name('user.management');
Route::get('/driver-management', [App\Http\Controllers\DriverManagementController::class, 'index'])->name('driver.management');
Route::get('/passenger-management', [App\Http\Controllers\PassengerManagementController::class, 'index'])->name('passenger.management');

Route::get('/passenger/login', [PassengerController::class, 'login'])->name('passenger.login');
Route::get('/driver/login', [DriverController::class, 'login'])->name('driver.login');
Route::get('/driver-management', [DriverManagementController::class, 'index'])->name('driver.management');
Route::get('/passenger-management', [PassengerManagementController::class, 'index'])->name('passenger.management');

Route::get('/ride-management', [RideManagementController::class, 'index'])->name('ride.management');
Route::get('/driver-management', [DriverController::class, 'index'])->name('drivers.index');

Route::get('/driver-management', [DriverController::class, 'index'])->name('driver.management');


Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');

Route::patch('/drivers/{id}/verify-license', [DriverController::class, 'verifyLicense'])->name('drivers.verify-license');
Route::patch('/drivers/{driver}/verify-license', [DriverController::class, 'verifyLicense'])->name('drivers.verify-license');

Route::get('/drivers', [DriverController::class, 'index'])->name('driver.management');

Route::resource('drivers', DriverController::class);
Route::patch('/drivers/{id}/suspend', [DriverController::class, 'suspend'])->name('drivers.suspend');
Route::patch('/drivers/{driver}/suspend', [DriverController::class, 'suspend'])->name('drivers.suspend');


Route::resource('passengers', PassengerController::class);
Route::post('/passengers/{id}/verify', [PassengerController::class, 'verify'])->name('passengers.verify');
Route::post('/passengers/{id}/suspend', [PassengerController::class, 'suspend'])->name('passengers.suspend');

Route::get('/passengers', [PassengerController::class, 'index'])->name('passengers.index');
Route::get('/passengers/create', [PassengerController::class, 'create'])->name('passengers.create');
Route::post('/passengers', [PassengerController::class, 'store'])->name('passengers.store');
Route::get('/passengers/{id}', [PassengerController::class, 'show'])->name('passengers.show');
Route::get('/passengers/{id}/edit', [PassengerController::class, 'edit'])->name('passengers.edit');
Route::put('/passengers/{id}', [PassengerController::class, 'update'])->name('passengers.update');
Route::delete('/passengers/{id}', [PassengerController::class, 'destroy'])->name('passengers.destroy');

//Admin Routes
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');

//Driver Routes
Route::get('/driver/login', [DriverController::class, 'showLoginForm'])->name('driver.login');
Route::post('/driver/login', [DriverController::class, 'login']);
Route::get('/driver/register', [DriverController::class, 'showRegisterForm'])->name('driver.register');
Route::post('/driver/register', [DriverController::class, 'register']);
Route::get('/driver/logout', [DriverController::class, 'logout'])->name('driver.logout');

//Passenger Routes
Route::get('/passenger/login', [PassengerController::class, 'showLoginForm'])->name('passenger.login');
Route::post('/passenger/login', [PassengerController::class, 'login']);
Route::get('/passenger/register', [PassengerController::class, 'showRegisterForm'])->name('passenger.register');
Route::post('/passenger/register', [PassengerController::class, 'register']);