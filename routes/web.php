<?php

use App\Http\Controllers\ApprovalJoinVehicleController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\UserHistoryController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Models\LandingHero;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\PickupLocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionFilterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminLandingHeroController;
use App\Http\Controllers\AdminLandingAboutController;
use App\Http\Controllers\AdminLandingHowtoController;
use App\Http\Controllers\RentalTimeController;
use App\Http\Controllers\JoinPickupLocationController;



//Landing Page

Route::get('/', [LandingPageController::class, 'index'])->name('landing.page');



// Authorize utk Login & Logout ataupun Registrasi dan yang bisa diakses semua entitas
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authorized', [AuthController::class, 'authorized'])->name('authorized');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('profile', ProfileController::class);
Route::resource('user-history', UserHistoryController::class);



// Fitur Khusus User
Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/customer-dashboard', [LayoutsController::class,'indexcustomer'])->name('customer.dashboard');
    Route::resource('vehicles', VehiclesController::class);
    Route::resource('transaction', TransactionController::class);
    Route::get('search', [SearchController::class,'customer'])->name('search.customer');
    Route::get('search', [SearchController::class,'customer'])->name('search.customer');
});

// Fitur khusus User yg memiliki status_mitra = 'Verified' 
Route::middleware(['auth','mitra.verified'])->group(function () {
    Route::get('/mitra-dashboard', [LayoutsController::class,'indexmitra'])->name('mitra.dashboard');
    Route::resource('vehicle', VehicleController::class);
    Route::get('/join-pickup-location/{id}/veh', [JoinPickupLocationController::class,'veh'])->name('join-pickup-location.veh');
    Route::post('/join-pickup-location/{pickupLocation}/addveh/{vehicle}', [JoinPickupLocationController::class,'addveh'])->name('join-pickup-location.addveh');
    Route::resource('join-pickup-location', JoinPickupLocationController::class);
});

// Fitur Khusus Admin & Superadmin
Route::middleware(['auth', 'role:Admin,Superadmin'])->group(function () {
    Route::get('/admin-dashboard', [LayoutsController::class, 'index'])->name('admin.dashboard');
    Route::resource('user', UserController::class);
    Route::resource('vehicle-type', VehicleTypeController::class);
    Route::resource('region-filter', RegionFilterController::class);
    Route::resource('rental-time', RentalTimeController::class);
    Route::patch('/approval-join-vehicle/{id}/approve', [ApprovalJoinVehicleController::class, 'approve'])->name('approval-join-vehicle.approve');
    Route::get('/approval-join-vehicle/{id}/rejection', [ApprovalJoinVehicleController::class, 'rejection'])->name('approval-join-vehicle.rejection');
    Route::patch('/approval-join-vehicle/{id}/reject', [ApprovalJoinVehicleController::class, 'reject'])->name('approval-join-vehicle.reject');
    Route::resource('approval-join-vehicle', ApprovalJoinVehicleController::class);

    Route::patch('/pickup-location/{id}/status', [PickupLocationController::class,'status'])->name('pickup-location.status');
    Route::get('/pickup-location/{id}/veh', [PickupLocationController::class,'veh'])->name('pickup-location.veh');
    Route::post('/pickup-location/{pickupLocation}/addveh/{vehicle}', [PickupLocationController::class,'addveh'])->name('pickup-location.addveh');
    Route::patch('/pickup-location/{pickupLocation}/unveh/{vehicle}', [PickupLocationController::class,'unveh'])->name('pickup-location.unveh');
    Route::get('/pickup-location/{id}/manage', [PickupLocationController::class,'manage'])->name('pickup-location.manage');
    Route::put('/pickup-location/{id}/addmanage', [PickupLocationController::class,'addmanage'])->name('pickup-location.addmanage');
    Route::get('/pickup-location/{id}/profile', [PickupLocationController::class,'profile'])->name('pickup-location.profile');
    Route::put('/pickup-location/{id}/addprofile', [PickupLocationController::class,'addprofile'])->name('pickup-location.addprofile');
    Route::resource('pickup-location', PickupLocationController::class);

// Landing Page
    // Hero Section
    Route::get('hero', [AdminLandingHeroController::class, 'hero'])->name('landing.hero');
    Route::get('hero-edit', [AdminLandingHeroController::class, 'heroedit'])->name('landing.hero.edit');
    Route::put('hero/{id}/update', [AdminLandingHeroController::class, 'heroupdate'])->name('landing.hero.update');
    Route::post('hero-create', [AdminLandingHeroController::class, 'herocreate'])->name('landing.hero.create');

    // About Section
    Route::get('about', [AdminLandingAboutController::class, 'about'])->name('landing.about');
    Route::get('about-edit', [AdminLandingAboutController::class, 'aboutedit'])->name('landing.about.edit');
    Route::put('about/{id}/update', [AdminLandingAboutController::class, 'aboutupdate'])->name('landing.about.update');
    Route::post('about-create', [AdminLandingAboutController::class, 'aboutcreate'])->name('landing.about.create');

    // How To
    Route::get('howto', [AdminLandingHowtoController::class, 'howto'])->name('landing.howto');
    Route::get('howto-edit', [AdminLandingHowtoController::class, 'howtoedit'])->name('landing.howto.edit');
    Route::put('howto/{id}/update', [AdminLandingHowtoController::class, 'howtoupdate'])->name('landing.howto.update');
    Route::post('howto-create', [AdminLandingHowtoController::class, 'howtocreate'])->name('landing.howto.create');
});