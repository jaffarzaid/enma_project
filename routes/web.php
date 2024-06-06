<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

                // Route: Display all trainers: 
                Route::get('/all-trainers', [AdminController::class, 'DisplayAllTrainer'])->name('all.trainers');

                // Route: View Current Trainer Detail: 
                Route::get('/view/trainer/{id}', [AdminController::class, 'ViewTrainer'])->name('view.trainer.details');

                // Route:: Edit a specific trainer: 
                Route::get('/edit/trainer/{id}', [AdminController::class, 'EditTrainer'])->name('edit.trainer');

                // Route: update a specific trainer:
                Route::post('/update/trainer/{id}', [AdminController::class, 'UpdateTrainer'])->name('update.trainer');

                // Route: Display Adding courses page: 
                Route::get('/add-courses', [AdminController::class, 'AddCourses'])->name('add.course');

                // Route: Store Courses: 
                Route::post('/store/course', [AdminController::class, 'StoreCourse'])->name('store.course');

                // Route: Display All Added Courses: 
                Route::get('/all-courses', [AdminController::class, 'DisplayAllCourses'])->name('view.courses');

                // Route: Display Edit Course Page: 
                Route::get('/edit/course/{id}', [AdminController::class, 'EditCourse'])->name('edit.course'); 

                // Route: Update Course data: 
                Route::post('/update/course/{id}', [AdminController::class, 'UpdateCourse'])->name('update.course');

                // Route: View Course data: 
                Route::get('/view/course/{id}', [AdminController::class, 'ViewCourse'])->name('view.course');

                // Route: Display Create Child Admin: 
                Route::get('/create/child-admin', [AdminController::class, 'CreateChildAdmin'])->name('create.child_admin');
            });
        });
    });
});


Auth::routes();


Auth::routes(['register' => false]);

