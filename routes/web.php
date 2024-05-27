<?php

use App\Http\Controllers\PlateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     $restaurants = Restaurant::where('user_id', Auth::id())->get();
//     return view('dashboard', compact('restaurants'));
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// routes related to restaurant management are handled by the RestaurantController
Route::middleware('auth')->group(function (){
    Route::get('/registerRestaurant', [RestaurantController::class, 'create'])->name('registerRestaurant');
    Route::post('/registerRestaurant', [RestaurantController::class, 'store']);
    Route::get('/dashboard', [RestaurantController::class, 'index'])->name('restaurant');
});

Route::resource('plates', PlateController::class);

Route::get('/home', function () {
    return redirect()->away('http://localhost:5174/');
})->name('home');


require __DIR__.'/auth.php';
