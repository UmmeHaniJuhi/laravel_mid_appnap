<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


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

/*Route::get('/', function () {
    return view('welcome');
});
*/
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/', [HomeController::class,'redirect']);
Route::get('/', [HomeController::class,'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/logout', [HomeController::class,'logout']);


Route::middleware('admin')->group(function () {

    Route::get('/view_catagory', [AdminController::class,'view_catagory']);
    Route::post('/add_catagory', [AdminController::class,'add_catagory']);
    Route::get('/delete_catagory/{id}', [AdminController::class,'delete_catagory']);

    Route::get('/create', [ProductController::class,'create']);
    Route::post('/store', [ProductController::class,'store']);
    Route::get('/show_product', [ProductController::class,'show_product']);
    Route::get('/delete_product/{id}', [ProductController::class,'delete_product']);
    Route::get('/edit_product/{id}', [ProductController::class,'edit_product']);
    Route::post('/update_product/{id}', [ProductController::class,'update_product']);

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';


