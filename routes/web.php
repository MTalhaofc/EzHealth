<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Firebase\Admins;
use App\Http\Controllers\Firebase\HomeTesting;
use App\Http\Controllers\Firebase\OnlineReports;
use App\Http\Controllers\Firebase\Reports;
use App\Http\Controllers\Firebase\Users;
use App\Http\Controllers\Firebase\auth;
use App\Http\Controllers\Firebase\tests;
use App\Http\Controllers\Firebase\Notifications;


use App\Http\Middleware\SuperAdminMiddleware;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Routing\Router;





// Public Routes
Route::get('/', [auth::class, 'loginpage']);
Route::get('login', [auth::class, 'loginpage'])->name('login');
Route::post('/loginadmin', [auth::class, 'loginadmin'])->name('loginadmin');

// Routes accessible by Admin and SuperAdmin
Route::group(['middleware' => ['admin']], function () {
    Route::get('dashboard', [auth::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [auth::class, 'logout'])->name('logout');
});

// Routes accessible only by SuperAdmin
Route::group(['middleware' => ['superadmin']], function () {
    Route::get('add_admin', [Admins::class, 'addadmin'])->name('add_admin');
    Route::get('view_admins', [Admins::class, 'viewadmin'])->name('view_admin');
    Route::post('/add_admin', [Admins::class, 'newadmin']);
    Route::get('editadmin/{id}', [Admins::class, 'editadmin']);
    Route::put('updateadmin/{id}', [Admins::class, 'updateadmin']);
    Route::get('deleteadmin/{id}', [Admins::class, 'deleteadmin']);
    
    // SuperAdmin also has access to dashboard and logout
    Route::get('dashboard', [auth::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [auth::class, 'logout'])->name('logout');
    Route::get('viewallreports',[Reports::class,'viewallreports'])->name('viewallreports');
Route::get('add_user',[Users::class,'add_user'])->name('add_users');
Route::post('upload_user', [Users::class, 'upload_user'])->name('upload_user');
});


//Testing routes will be added in middleware soon after setup
Route::get('viewallreports',[Reports::class,'viewallreports'])->name('viewallreports');
Route::post('add_user', [Users::class, 'addusers'])->name('add_user');

//will be used for accesing reports list
Route::get('/view_reports/{id}',[Reports::class,'view_reports'])->name('view_reports');
//will be used for viewing reports of each user
Route::get('/view_reports/{id}/add_reports', [Reports::class, 'add_reports'])->name('add_reports');
//will be used for upload reports -> method post //
Route::post('/view_reports/{id}/add_reports', [Reports::class, 'upload_reports'])->name('upload_reports');

//will be used for each user each report




//Test list Routes
Route::get('viewalltests', [tests::class, 'viewalltests'])->name('viewalltests');

Route::get('/add_test',[tests::class, 'add_test'])->name('add_test');
Route::post('/upload_test',[tests::class, 'upload_test'])->name('upload_test');



Route::get('/view_test/{id}',[tests::class, 'view_test'])->name('view_test');
Route::get('edit_test/{id}',[tests::class, 'edit_test'])->name("edit_test");
Route::Post('update_test/{id}',[tests::class, 'update_test'])->name("update_test");
Route::delete('delete_test/{id}',[tests::class, 'delete_test'])->name("delete_test");




//temporary routes for adding home tests (appointments)
Route::get('viewallappointments', [HomeTesting::class, 'viewallappointments'])->name('viewallappointments'); //For Pending
Route::get('viewcompleteappointments',[HomeTesting::class,'viewcompleteappointmests'])->name('viewcompleteappointments');
Route::get('viewsallusersappointments', [HomeTesting::class, 'viewallusers_appointments'])->name('viewallusers_appointments');
Route::get('viewsusersappointments/{id}', [HomeTesting::class, 'viewusers_appointments'])->name('viewusers_appointments');
Route::get('viewuserreport/{id}/add_user_appointments', [HomeTesting::class, 'add_appointment'])->name('add_appointment');
Route::post('viewuserreport/{id}/upload_hometest', [HomeTesting::class, 'upload_hometest'])->name('upload_hometest');
Route::post('/update-appointment-status', [HomeTesting::class, 'updateAppointmentStatus'])->name('update.appointment.status');



// Route to view all appointments for a specific user
Route::get('/view_appointments/{id}', [Appointments::class, 'view_appointments'])->name('view_appointments');

// Route to load the form for adding appointments for a specific user (GET request)
Route::get('/view_appointments/{id}/add_appointments', [Appointments::class, 'add_appointments'])->name('add_appointments');

// Route to upload the appointment data (POST request)
Route::post('/view_appointments/{id}/add_appointments', [Appointments::class, 'upload_appointments'])->name('upload_appointments');


//Notification Route
Route::get('/notifications', [Notifications::class, 'notifications'])->name('notifications');
Route::post('/notifications/mark-as-read', [Notifications::class, 'markNotificationsAsRead']);


Route::get('/viewallusers',[Users::class,'viewallusers'])->name('viewallusers');