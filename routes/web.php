<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Firebase\Admins;
use App\Http\Controllers\Firebase\HomeTesting;
use App\Http\Controllers\Firebase\OnlineReports;
use App\Http\Controllers\Firebase\Users;






// Route::get('/', function() {
//     return view('welcome');
// });

Route::get('/', [Admins::class,'adminprofile'])->name('firebase.admin.profile');
Route::get('/addnumber', [Admins::class,'addnumber'])->name('firebase.admin.addnumber');
Route::post('/addnumber', [Admins::class,'store']);
Route::get('editnumber/{id}',[Admins::class,'edit']);
Route::put('updatednumber/{id}',[Admins::class,'update']);
Route::get('deletenumber/{id}',[Admins::class,'delete']);
