<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
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

// Global Middleware to limit number of requests to authenticated or none-authenticated: 
Route::group(['middleware' =>['rate-requests', 'sanitize.input', 'http.headers']], function(){

    // Route: Home Page: 
    Route::get('/', function () {
        return view('frontend.body.index');
    })->name('home');

    // Route: Display Home Page: 
    Route::get('/registration', [HomeController::class, 'DisplayRegistrationPage'])->name('display.registration');


    // Route: Save student data: 
    Route::post('/store-student-data', [HomeController::class, 'StoreStudentInfo'])->name('store.student.data');


 
    Route::group(['middleware' => ['prevent-back-history']], function () {
        Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
            Route::get('/dashboard', function () {
                return view('backend.body.index');
            })->name('dashboard');

            // Administration Routes:
            Route::prefix('admin')->group(function () {
                
                // Route:: Logout: 
                Route::post('/logout', [AdminController::class, 'Logout'])->name('logout');

                // Route: Display Adding Tutor Page: 
                Route::get('/add-tutor', [AdminController::class, 'AddTrainer'])->name('add.trainer');

                // Route: Store trainer data: 
                Route::post('/store-trainer-data', [AdminController::class, 'StoreTrainer'])->name('store.trainer');

                // Route: Display Adding courses page: 
                Route::get('/add-courses', [AdminController::class, 'AddCourses'])->name('add.course');
            });
        });
    });
});






