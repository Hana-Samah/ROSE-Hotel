<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;



route::get('/',[AdminController::class,'home']);

route::get('/home',[AdminController::class,'index'])->name('home');

Route::get('/contact', function () { return view('home.contact');});

Route::get('/about', function () { return view('home.about');});
Route::get('/gallery', [HomeController::class, 'showGallery']);



route::get('/create_room',[AdminController::class,'create_room']);

route::post('/add_room',[AdminController::class,'add_room']);

route::get('/view_room',[AdminController::class,'view_room']);

route::get('/room_delete/{id}',[AdminController::class,'room_delete']);

route::get('/room_update/{id}',[AdminController::class,'room_update']);

route::post('/edit_room/{id}',[AdminController::class,'edit_room']);

route::get('/room_details/{id}',[HomeController::class,'room_details']);

route::post('/add_booking/{id}',[HomeController::class,'add_booking']);

route::get('/bookings',[AdminController::class,'bookings']);

route::get('/delete_booking/{id}',[AdminController::class,'delete_booking']);

route::get('/approve_book/{id}',[AdminController::class,'approve_book']);

route::get('/rejected_book/{id}',[AdminController::class,'rejected_book']);

route::get('/view_gallary',[AdminController::class,'view_gallary']);

route::post('/upload_gallary',[AdminController::class,'upload_gallary']);

route::get('/delete_gallary/{id}',[AdminController::class,'delete_gallary']);

route::post('/contact',[HomeController::class,'contact']);


route::get('/all_messages',[AdminController::class,'all_messages']);

route::get('/send_email/{id}',[AdminController::class,'send_email']);

route::post('/mail/{id}',[AdminController::class,'mail']);

route::get('/our_room',[HomeController::class,'our_room']);

route::get('auth/google',[GoogleController::class,'googlepage']);

route::get('auth/google/callback',[GoogleController::class,'googlecallback']);

route::get('auth/facebook',[FacebookController::class,'facebookpage']);

route::get('auth/facebook/callback',[FacebookController::class,'facebookredirect']);

Route::get('room_details/{id}', [HomeController::class, 'room_details']);
Route::post('add_review/{room_id}', [HomeController::class, 'add_review']);
Route::post('add_booking/{room_id}', [HomeController::class, 'add_booking']);

Route::get('view_reviews', [AdminController::class, 'view_reviews']);




