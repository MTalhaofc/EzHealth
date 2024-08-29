<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Firebase\Admins;
use App\Http\Controllers\Firebase\HomeTesting;
use App\Http\Controllers\Firebase\OnlineReports;
use App\Http\Controllers\Firebase\Users;
use App\Http\Controllers\Firebase\auth;






// Route::get('/', function() {
//     return view('welcome');
// });

// Route::get('/', [Admins::class,'adminprofile'])->name('firebase.admin.profile');
Route::get('/addnumber', [Admins::class,'addnumber'])->name('firebase.admin.addnumber');
Route::post('/addnumber', [Admins::class,'store']);
Route::get('editnumber/{id}',[Admins::class,'edit']);
Route::put('updatednumber/{id}',[Admins::class,'update']);
Route::get('deletenumber/{id}',[Admins::class,'delete']);


//lOGIN WEB Routes start from here :

Route::get('/',[auth::class,'loginpage']);
Route::get('login',[auth::class,'loginpage'])->name('login');
Route::post('/loginadmin',[auth::class,'loginadmin'])->name('loginadmin');
Route::get('dashboard',[auth::class,'dashboard'])->name('dashboard');
Route::get('superadmin_login', [UserController::class, 'superadmin_login']);

// ADMINS Web Routes staring from here:


Route::get('add_admin',[Admins::class,'addadmin'])->name('add_admin');
Route::get('view_admins',[Admins::class,'viewadmin'])->name('view_admin');
Route::post('/add_admin',[Admins::class,'newadmin']);
Route::get('editadmin/{id}',[Admins::class,'editadmin']);
Route::put('updateadmin/{id}',[Admins::class,'updateadmin']);
Route::get('deleteadmin/{id}',[Admins::class,'deleteadmin']);


