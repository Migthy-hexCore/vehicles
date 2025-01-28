<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DependencyController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

route::resource('users', UserController::class)->middleware('can:manage users');

route::resource('assignments', AssignmentController::class);

route::resource('vehicles', VehicleController::class);
route::resource('societies', SocietyController::class);
route::resource('divisions', DivisionController::class);
route::resource('agencies', AgencyController::class);
route::resource('brands', BrandController::class);

route::resource('employees', EmployeeController::class);
route::resource('levels', LevelController::class);
route::resource('dependencies', DependencyController::class);
route::resource('directions', DirectionController::class);
Route::resource('areas', AreaController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
