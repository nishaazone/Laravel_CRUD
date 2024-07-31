<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\BillController;


Route::get('/', [ManageController::class, 'index']);

Route::post('/products/manage/store', [ManageController::class, 'store']);

Route::get('/table/manage/view', [ManageController::class, 'showManageTable'])->name('tableManage');

Route::get('/manage/edit/{id}', [ManageController::class, 'edit']);

Route::put('/manage/update/{id}', [ManageController::class, 'update']);

Route::get('/manage/delete/{id}', [ManageController::class, 'delete']);

Route::get('/table/manage/view/trash', [ManageController::class, 'showManageTrash'])->name('manageTrash');

Route::get('/restore/{id}', [ManageController::class, 'restore']);

Route::get('/forcedelete/{id}', [ManageController::class, 'deletingForcefully']);


///////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/track', [TrackController::class, 'getColumnCateogory']);

Route::post('/products/track/store', [TrackController::class, 'store']);

Route::get('/table/track/view', [TrackController::class, 'showTrackTable'])->name('tableTrack');

Route::get('/track/edit/{id}', [TrackController::class, 'edit']);

Route::put('/track/update/{id}', [TrackController::class, 'update']);

Route::get('/track/delete/{id}', [TrackController::class, 'delete']);

Route::get('/table/track/products/{id}/show', [TrackController::class, 'show'])->name('showData');

Route::get('/table/track/view/trash', [TrackController::class, 'showTrackTrash'])->name('trackTrash');

Route::get('track/restore/{id}', [TrackController::class, 'restore']);

Route::get('trash/forcedelete/{id}', [TrackController::class, 'deletingForcefully']);

// Route must have an ID for a particular tract product
Route::get('/table/track/products/{id}/show/bill', [TrackController::class, 'showBillForm'])->name('billForm');


/////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('/table/track/products/{id}/show', [TrackController::class, 'show'])->name('billTable');

Route::get('/edit/{id}', [BillController::class, 'editBill'])->name('billEdit');

Route::get('/delete/{id}', [BillController::class, 'deleteBill'])->name('billDelete');

Route::post('/table/track/products/show/billpost', [BillController::class, 'storeBill'])->name('billPost');

Route::put('/update/{id}', [BillController::class, 'updateBill'])->name('billUpdate');




