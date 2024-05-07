<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\CoblogController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OutgoingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UsertypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DatabaseSyncController;
use App\Http\Controllers\PlantprinterController;
use App\Http\Controllers\PlantproductController;
use App\Http\Controllers\SupplierproductController;
use App\Http\Controllers\PlantprinterproductController;



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
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    // Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    // Route::get('/', [LoginController::class, 'index']);
    Route::resource('roles', RoleController::class);
     Route::resource('users', UserController::class);
 });


// Route::get('/print', 'PlantprinterController@Toprinter');
Route::get('/prints', [PlantprinterController::class, 'Toprinter']);
Route::get('/prints1', [PlantprinterController::class, 'testprinter2']);
Route::get('/prints2', [PlantprinterController::class, 'testprinter3'])->name('prints2');
Route::get('/print-pos/{id}', [PlantprinterController::class, 'printPos'])->name('print.pos');
Route::get('/testprinter2', [PlantprinterController::class, 'testprinter2'])->name('testprinter2');
// Route::get('/print-pos', [PlantprinterController::class, 'printpos'])->name('printpos');
// Route::get('/printpos', [PlantprinterController::class, 'printpos'])->name('printpos');
Route::match(['GET', 'POST'], '/printpos', [PlantprinterController::class, 'printpos'])->name('printpos');








//product routes in laravel 9 syntax
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


//product routes in laravel 9 syntax
Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
Route::get('/locations/create', [ProductController::class, 'create'])->name('locations.create');
Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
Route::get('/locations/{location}', [LocationController::class, 'show'])->name('locations.show');
Route::get('/locations/{location}/edit', [LocationController::class, 'edit'])->name('locations.edit');
Route::put('/locations/{location}', [LocationController::class, 'update'])->name('locations.update');
Route::delete('/locations/{location}', [LocationController::class, 'destroy'])->name('locations.destroy');

//incoming routes in laravel 9 syntax
Route::get('/incomings', [IncomingController::class, 'index'])->name('incomings.index');
Route::get('/incomings/create', [IncomingController::class, 'create'])->name('incomings.create');
Route::post('/incomings', [IncomingController::class, 'store'])->name('incomings.store');
Route::get('/incomings/{incoming}', [IncomingController::class, 'show'])->name('incomings.show');
Route::get('/incomings/{incoming}/edit', [IncomingController::class, 'edit'])->name('incomings.edit');
Route::put('/incomings/{incoming}', [IncomingController::class, 'update'])->name('incomings.update');
Route::delete('/incomings/{incoming}', [IncomingController::class, 'destroy'])->name('incomings.destroy');


//Supplier routes in laravel 9 syntax
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show');
Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

// Customer routes in laravel 9 syntax

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');

// User routes in laravel 9 syntax

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Usertype routes in laravel 9 syntax

Route::get('/usertypes', [UsertypeController::class, 'index'])->name('usertypes.index');
Route::get('/usertypes/create', [UsertypeController::class, 'create'])->name('usertypes.create');
Route::post('/usertypes', [UsertypeController::class, 'store'])->name('usertypes.store');
Route::get('/usertypes/{usertype}', [UsertypeController::class, 'show'])->name('usertypes.show');
Route::get('/usertypes/{usertype}/edit', [UsertypeController::class, 'edit'])->name('usertypes.edit');
Route::put('/usertypes/{usertype}', [UsertypeController::class, 'update'])->name('usertypes.update');
Route::delete('/usertypes/{usertype}', [UsertypeController::class, 'destroy'])->name('usertypes.destroy');

//POS routes in laravel 9 syntax

Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
Route::get('/pos/create', [PosController::class, 'create'])->name('pos.create');
Route::post('/pos', [PosController::class, 'store'])->name('pos.store');
Route::get('/pos/{pos}', [PosController::class, 'show'])->name('pos.show');
Route::get('/pos/{pos}/edit', [PosController::class, 'edit'])->name('pos.edit');
Route::put('/pos/{pos}', [PosController::class, 'update'])->name('pos.update');
Route::delete('/pos/{pos}', [PosController::class, 'destroy'])->name('pos.destroy');
Route::get('/get-product-price/{product_id}/{customer_id}',  [PosController::class, 'getProductPrice']);
// Route::get('/get-product-price/{id}', 'PosController@getProductPrice');



Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store');
Route::get('/attendances/clock-in', [AttendanceController::class, 'clockIn'])->name('attendances.clockIn');
// Route::post('/attendances/clock-out', [AttendanceController::class, 'clockOut'])->name('attendances.clockout');
Route::post('/attendances/clock-out', [AttendanceController::class, 'clockOut'])->name('attendances.clock-out');


// coblog routes in laravel 9 syntax

Route::get('/coblogs', [CoblogController::class, 'index'])->name('coblogs.index');
Route::get('/coblogs/create', [CoblogController::class, 'create'])->name('coblogs.create');
Route::post('/coblogs', [CoblogController::class, 'store'])->name('coblogs.store');
Route::get('/coblogs/{coblog}', [CoblogController::class, 'show'])->name('coblogs.show');
Route::get('/coblogs/{coblog}/edit', [CoblogController::class, 'edit'])->name('coblogs.edit');
Route::put('/coblogs/{coblog}', [CoblogController::class, 'update'])->name('coblogs.update');
Route::delete('/coblogs/{coblog}', [CoblogController::class, 'destroy'])->name('coblogs.destroy');



// invnetory routes in laravel 9 syntax

Route::get('/inventories', [InventoryController::class, 'index'])->name('inventories.index');
Route::get('/inventories/create', [InventoryController::class, 'create'])->name('inventories.create');
Route::post('/inventories', [InventoryController::class, 'store'])->name('inventories.store');
Route::get('/inventories/{inventory}', [InventoryController::class, 'show'])->name('inventories.show');
Route::get('/inventories/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventories.edit');
Route::put('/inventories/{inventory}', [InventoryController::class, 'update'])->name('inventories.update');
Route::delete('/inventories/{inventory}', [InventoryController::class, 'destroy'])->name('inventories.destroy');

// dashboard routes in laravel 9 syntax

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.index');

//database sync routes in laravel 9 syntax
Route::post('/syncremotedatabase', [DatabaseSyncController::class, 'syncRemoteDatabase'])->name('database.sync');






Route::match(['GET', 'POST'], '/logout', [AuthController::class, 'logout'])->name('logout');


Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

