<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Livewire\Home\Home;
use App\Http\Livewire\{
    Task\Main as TaskMain,
    Employee\Main as EmployeeMain,

    Project\Main as ProjectMain,
    Project\Show as ProjectShow,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('change-language/{locale}', [MainController::class, 'changeLanguage'])->name('change_locale');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


Route::middleware(['auth'])->group(function () {

    Route::get('/', Home::class)->name('home');

    Route::prefix('home')->group(function () {
        // Route::get('/', Home::class)->name('home');

    });

    Route::prefix('employees')->group(function () {
        Route::get('/', EmployeeMain::class)->name('employees');
    });

    Route::prefix('projects')->group(function () {
        Route::get('/', ProjectMain::class)->name('projects');
        Route::get('/{id}' , ProjectShow::class)->name('projects.show');
    });

    Route::prefix('task')->group(function () {
        Route::get('/', TaskMain::class)->name('task');
    });
});
