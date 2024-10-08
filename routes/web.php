<?php

use App\Http\Controllers\ChallanController;
use App\Http\Controllers\ChallanExportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ChallanController::class,'last10challan'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('challans', ChallanController::class);

    Route::get('challans/export/{format?}', [ChallanExportController::class, 'export'])->name('challans.export');
});