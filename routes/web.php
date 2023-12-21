<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\SyllabusController;
use App\Http\Controllers\RoutineController;


// Route::get('/', function () {
//     return view('layouts.app');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('lessons', LessonController::class);
    Route::resource('exams', ExamController::class);
    Route::resource('lives', LiveController::class);
    Route::resource('enrollment-request', EnrollmentController::class);
    Route::resource('syllabus', SyllabusController::class);
    Route::resource('routines', RoutineController::class);
    Route::get('enrollment-request/{id}/accept', [EnrollmentController::class, 'accept'])->name('enrollment-request.accept');
    Route::get('enrollment-request/{id}/reject', [EnrollmentController::class, 'reject'])->name('enrollment-request.reject');
    Route::post('/enroll/submit/{course_id}', [EnrollmentController::class, 'submitEnroll'])->name('enroll.submit');
    Route::get('/active-status/{id}','CourseController@activestatus');
    Route::get('/not-status/{id}','CourseController@notstatus');
    Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::get('/qustion/create','ExamController@quscreate')->name('qustion.create');
    Route::post('/qustion/store','ExamController@qusstore')->name('qustion.store');
    Route::get('/qustion/{id}/edit','ExamController@qusedit')->name('qustion.edit');
    Route::get('/qustion/{id}','ExamController@qusshow')->name('qustion.show');
    Route::get('/qustion','ExamController@qusindex')->name('qustion.index');
    Route::get('/qustion/delete/{id}','ExamController@qusdestroy')->name('qustion.destroy');
    Route::post('/qustion/update/{id}','ExamController@qusupdate')->name('qustion.update');
    Route::get('/quiz', 'ExamController@giveExam')->name('qustion.quiz');
    Route::get('/login-history', 'LoginHistoryController@index')->name('login.history');
    Route::get('/student/dashboard', 'StudentDashboardController@index')->name('student.dashboard');
    });
});

// admin routes
    Route::group(['namespace'=>'App\Http\Controllers\Admin', 'middleware' =>'auth'], function(){
        Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
        Route::get('/admin/logout','AdminController@logout')->name('admin.logout');
        Route::get('/admin/password/change','AdminController@passwordChange')->name('admin.password.change');
        Route::post('/admin/password/update','AdminController@passwordUpdate')->name('admin.password.update');
    });

//Website Setting
    Route::group(['namespace'=>'App\Http\Controllers\Admin'], function(){
        Route::group(['prefix'=>'website'], function() {
            Route::group(['prefix'=>'setting'], function(){
                Route::get('/','SettingController@website')->name('website.setting');
                Route::post('/update/{id}','SettingController@WebsiteUpdate')->name('website.setting.update');
            });
        });
    });

//Front Route
    Route::group(['namespace'=>'App\Http\Controllers'], function(){
        Route::get('/home','IndexController@index');
        Route::get('/course-details/{course_slug}','IndexController@CourseDetails')->name('course.details');
    });