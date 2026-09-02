<?php

use App\Http\Controllers\LayoutsController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\PickupLocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;



//Landing Page

Route::get('/', function () {
    return view('landing-page');
});



// Authorize utk Login & Logout ataupun Registrasi

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authorized', [AuthController::class, 'authorized'])->name('authorized');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



// Fitur Khusus User
Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/customer-dashboard', [LayoutsController::class,'indexcustomer'])->name('customer.dashboard');
    Route::resource('vehicles', VehiclesController::class);
    Route::resource('transaction', TransactionController::class);
});

// Fitur khusus User yg memiliki status_mitra = 'Verified' 
Route::middleware(['auth','mitra.verified'])->group(function () {
    Route::get('/mitra-dashboard', [LayoutsController::class,'indexmitra'])->name('mitra.dashboard');
    Route::patch('/pickup-location/{id}/status', [PickupLocationController::class,'status'])->name('pickup-location.status');
    Route::get('/pickup-location/{id}/veh', [PickupLocationController::class,'veh'])->name('pickup-location.veh');
    Route::post('/pickup-location/{id}/addveh', [PickupLocationController::class,'addveh'])->name('pickup-location.addveh');
    Route::get('/pickup-location/{id}/manage', [PickupLocationController::class,'manage'])->name('pickup-location.manage');
    Route::put('/pickup-location/{id}/addmanage', [PickupLocationController::class,'addmanage'])->name('pickup-location.addmanage');
    Route::get('/pickup-location/{id}/profile', [PickupLocationController::class,'profile'])->name('pickup-location.profile');
    Route::put('/pickup-location/{id}/addprofile', [PickupLocationController::class,'addprofile'])->name('pickup-location.addprofile');
    Route::resource('vehicle', VehicleController::class);
    Route::resource('pickup-location', PickupLocationController::class);
});

// Fitur Khusus Admin & Superadmin
Route::middleware(['auth', 'role:Admin,Superadmin'])->group(function () {
    Route::get('/admin-dashboard', [LayoutsController::class, 'index'])->name('admin.dashboard');
    Route::resource('user', UserController::class);
    Route::resource('vehicle-type', VehicleTypeController::class);
});