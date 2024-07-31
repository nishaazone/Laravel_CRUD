<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestController;

// For testing
// Route::post('/test', function () {
//     echo "Hello World";
// });

Route::post('/user/manage', [TestController::class, 'storeManage']);

Route::get('user/manage/{id}', [TestController::class,'showManage']);

Route::put('/user/manage/update/{id}', [TestController::class,'updateManage']);

Route::delete('user/manage/delete/{id}', [TestController::class,'destroyManage']);

/////////////////////////////////////////////////////////////////////////////////////

// check this 
Route::post('/user/track', [TestController::class, 'storeTrack']);

Route::get('user/track/{id}', [TestController::class,'showTrack']);

Route::delete('user/track/delete/{id}', [TestController::class,'destroyTrack']);

// Create API for PUT i.e. update method

//////////////////////////////////////////////////////////////////////////////////////

Route::get('/bills/{id}',[TestController::class, 'showBills']);