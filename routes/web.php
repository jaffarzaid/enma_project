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
Route::group(['middleware' => ['rate-requests', 'sanitize.input', 'http.headers']], function () {

    // Route: Home Page:
    Route::get('/', function () {
        return view('frontend.body.index');
    })->name('home');


    // Route: Display Job seeker Registration Main page:
    Route::get('/registration-main-page/job-seeker', [HomeController::class, 'MainPageRegistrationJobSeeker'])->name('main.registration');

    // Route: Display Job Seeker Page:
    Route::get('/registration/job-seeker', [HomeController::class, 'DisplayJobSeekerRegistrationPage'])->name('display.job_seeker.registration');

    // Route: Display Employee Registration Main page:
    Route::get('/registration-main-page/employee', [HomeController::class, 'MainPageRegistrationEmployee'])->name('main.registration.emp');

    // Route: Display Employee Page Registration:
    Route::get('/registration/employee', [HomeController::class, 'DisplayEmployeeRegistrationPage'])->name('display.employee.registration');

    // Route: Display University Student Registration Main page:
    Route::get('/registration-main-page/university-student', [HomeController::class, 'MainPageRegistrationStudent'])->name('main.registration.student');

    // Route: Display University Student Page Registration:
    Route::get('/registration/university-student', [HomeController::class, 'DisplayStudentRegistrationPage'])->name('display.student.registration');

    // Route: Display Expat Registration Page:
    Route::get('/registration/expat', [HomeController::class, 'DisplayExpatRegistrationPage'])->name('display.expat.registration');

    // Route: Save student data:
    Route::post('/store-student-data', [HomeController::class, 'StoreTraineeInfo'])->name('store.student.data');

    // Route: Display Page for Job Seeker Trainee re-enrollment:
    Route::get('/job-seeker/re-enrollment', [HomeController::class, 'JobSeekerReEnrollment'])->name('job_seeker_reenrollment');

    // Route: Display Page for Employee Trainee re-enrollment:
    Route::get('/employee/re-enrollment', [HomeController::class, 'EmployeeReEnrollment'])->name('employee.reenrollment');

    // Route: Display Page for university Trainee re-enrollment:
    Route::get('/university-student/re-enrollment', [HomeController::class, 'UniversityStuReEnrollment'])->name('univ_stu.reenrollment');

    // Route: Store re-enrollment data of old Trainee:
    Route::post('/store/old-trainee-data', [HomeController::class, 'StoreOldTraineeEnrollment'])->name('store.old_trainee.data');


    // Admin Routes
    Route::group(['middleware' => ['prevent-back-history', 'check.userStatus', 'prevent.edit']], function () {
        Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
            Route::get('/dashboard', function () {
                return view('backend.body.index');
            })->name('dashboard');

            // Administration Routes:
            Route::prefix('admin')->group(function () {

                // Route:: Logout:
                Route::post('/logout', [AdminController::class, 'Logout'])->name('logout');

                // ============= Trainees Section =============

                // Middleware to check if a user has access to Trainees section: 
                Route::group(['middleware' => ['check.traineeSection', 'prevent.trainee_approval']], function () {

                     // Route: View all Trainees
                    Route::get('/all-trainees', [AdminController::class, 'ViewAllTrainees'])->name('view.all.trainees');

                    // Route: View All Employee Trainees only:
                    Route::get('/employed-trainees', [AdminController::class, 'ViewEmployeeTrainees'])->name('view.employee.trainees');

                    // Route: View Job Seeker Trainees only:
                    Route::get('/job-seeker-trainees', [AdminController::class, 'ViewJobSeekerTrainees'])->name('view.job_seeker.trainees');

                    // Route: View University Job Seeker Trainees:
                    Route::get('/university-student-trainees', [AdminController::class, 'ViewUnivStudentTrainees'])->name('view.univ_students.trainees');

                    // Route: View Edit Trainee Page:
                    Route::get('/edit/trainee/{id}', [AdminController::class, 'EditTraineeInfo'])->name('edit.trainee.info');

                    // Rout: Update Trainee Data:
                    Route::post('/update/trainee/{id}', [AdminController::class, 'UpdateTraineeData'])->name('update.trainee');

                    // Route: Display page to see student details and approve a trainee:
                    Route::get('/edit/trainee/approval/{id}', [AdminController::class, 'DisplayApprovePage'])->name('view.trainee.details');

                    // Route: Approve Trainee:
                    Route::post('/accept/trainee/{id}', [AdminController::class, 'UpdateApproveStatus'])->name('approve.trainee');

                    // Route: Reject a Trainee:
                    Route::post('/Reject/trainee/{id}', [AdminController::class, 'RejectTrainee'])->name('reject.trainee');

                    // Route: Only view Trainee details with approved status details:
                    Route::get('/view/trainee-details/{id}', [AdminController::class, 'ReadTraineeDetails'])->name('read.trainee.details');

                    // Route: Display only pending registration of trainees:
                    Route::get('/pending/trainees', [AdminController::class, 'ViewPendingTrainees'])->name('pending.trainees');

                    // Route: Display Trainee History Details:
                    Route::get('/trainee-history/{id}', [AdminController::class, 'ViewTraineeHistory'])->name('trainee.history.details');

                    // Route:: Download Trainee Files:
                    Route::get('/download/trainee-files/{id}', [AdminController::class, 'DownloadFiles'])->name('download.trainee.files');
                });
                // ============= End of Trainees Section =============


                // ============= Trainer Section =============
                Route::group(['middleware' => ['check.trainerSection']], function () {
                    // Route: Display Adding Tutor Page:
                    Route::get('/add-trainer', [AdminController::class, 'AddTrainer'])->name('add.trainer');

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

                });
                // ============= End of Trainer Section =============


                // ============= Courses Section =============
                Route::group(['middleware' => ['check.coursesSection']], function () {
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
                });
                // ============= End of Courses Section =============


                // ============= Child Admin Section =============
                Route::group(['middleware' => ['check.childAdminSection']], function () {
                    // Route: Display Create Child Admin:
                    Route::get('/create/child-admin', [AdminController::class, 'CreateChildAdmin'])->name('create.child_admin');

                    // Route: Store new child Admin:
                    Route::post('/store/child-admin', [AdminController::class, 'StoreChildAdmin'])->name('store.child.admin');

                    // Route: Display All child admins:
                    Route::get('/all/child-admins', [AdminController::class, 'ViewChildAdmins'])->name('all.child_admins');

                    // Route: To Display Edit Child Admin:
                    Route::get('/edit/child-admin/{id}', [AdminController::class, 'EditChildAdmin'])->name('edit.childAdmin');

                    // Route: Update Child Admin Data:
                    Route::post('/update/child-admin/{id}', [AdminController::class, 'UpdateChildAdmin'])->name('update.child.admin');

                    // Route: Deactivate Child Admin:
                    Route::post('/deactivate/child-admin/{id}', [AdminController::class, 'DeactivateChildAdmin'])->name('deactivate.child_admin');

                    // Route: Activate Child Admin:
                    Route::post('/activate/child-admin/{id}', [AdminController::class, 'ActivateChildAdmin'])->name('activate.child_admin');
                });
                // ============= End of Child Admin Section =============
            });
        });
    });
});


// Disabling some of Jetstream Feature
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);



