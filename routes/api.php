<?php

use App\Http\Controllers\Api\ApiController;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\ProductController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:sanctum')->group(function () {

    Route::get('users', [ApiController::class, 'users'])->name('users');
    Route::get('brands', [ApiController::class, 'brands'])->name('brands');
    Route::post('brands', [ApiController::class, 'brandStore'])->name('brands');

    Route::get('versions', [ApiController::class, 'versions'])->name('versions');
    Route::post('versions', [ApiController::class, 'versionStore'])->name('versions');
    Route::get('getVersions', [ApiController::class, 'getVersions'])->name('getVersions');



    Route::get('repairOrders', [ApiController::class, 'repair_orders'])->name('repairOrders');
    Route::post('repairOrders', [ApiController::class, 'repair_orders'])->name('repairOrders');


    Route::prefix('product')->name('product.')->middleware([])->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('edit', [ProductController::class, 'edit'])->name('edit');
        Route::get('delete', [ProductController::class, 'delete'])->name('delete');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('update', [ProductController::class, 'update'])->name('update');
        Route::get('show', [ProductController::class, 'show'])->name('show');
    });

    Route::prefix('page')->name('page.')->middleware([])->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('index');
        Route::post('store', [PageController::class, 'store'])->name('store');
        Route::get('update', [PageController::class, 'update'])->name('update');
        Route::get('show', [PageController::class, 'show'])->name('show');
        Route::delete('delete', [PageController::class, 'delete'])->name('delete');
    });

    Route::get('categories', [ApiController::class, 'categories'])->name('categories');



    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/login', [AuthController::class, 'login'])->name('login');


    Route::get('getPages', [ApiController::class, 'getPages'])->name('getPages');



});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tokens/create', function (Request $request) {

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $token = $user->createToken('API Token')->plainTextToken;

    return response()->json(['token' => $token]);

 });

