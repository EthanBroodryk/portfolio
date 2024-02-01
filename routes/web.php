<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\frontpage;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });


Route::get('/', [frontpage::class, 'index']);
// $carouselImages = Admin::all();
// dd('Target',$carouselImages);
Route::post('/sendmail',[EmailController::class,'sendWelcomeEmail'])->name('sendmail');





Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/delete image',[AdminController::class,'deleteCarouselImage'])->name('removeCarouselImage');
    Route::get('/Admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/Admin', [AdminController::class, 'addCarouselImage'])->name('addCarouselImage');
    Route::post('/Admin/AddprojectImages', [AdminController::class, 'addProjectImage'])->name('addProjectPic');
    Route::post('/Admin/RemoveprojectImages', [AdminController::class, 'removeProjectCarousel'])->name('removeProjectCarousel');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/uploadCv', [AdminController::class, 'uploadResume'])->name('uploadResume');
    
});

require __DIR__.'/auth.php';
