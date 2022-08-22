<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FilterController;
use DeepCopy\Filter\Filter;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

/* 
    start User page
*/

// User page
Route::get('user/${id}', [UserController::class, 'index'])->name('user.page');
// User update
Route::post('user/update/${id}', [UserController::class, 'update'])->name('user.update');
// User create
Route::get('user/create', [UserController::class, 'create'])->name('user.create');
// User delete
Route::get('user/delete/${id}', [UserController::class, 'delete'])->name('user.delete');
/*
    end User page
*/


/* 
    start Admin page
*/

// Admin page
Route::get('admin/${id}', [AdminController::class, 'index'])->name('admin.page');
// Admin rate page
Route::get('admin/rates', [AdminController::class, 'view_rates'])->name('admin.rates');
// Admin user page
Route::get('admin/users', [AdminController::class, 'view_users'])->name('admin.users');


/*
    end Admin page
*/


/*
    start API functions
 */

 // Load API 
 Route::get('admin/api/load', [APIController::class, 'load'])->name('api.load');

 // Refresh API
 Route::get('admin/api/refresh', [APIController::class, 'refresh'])->name('api.refresh');

// Filter API
Route::post('admin/rates', [FilterController::class, 'filter'])->name('filter.post');

// Filter HOME
Route::post('home/filter', [FilterController::class, 'filter_home'])->name('filter.home');


// Export csv
Route::get('/home/export', [ExportController::class, 'export'])->name('csv.export');