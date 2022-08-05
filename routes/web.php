<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Livewire\{
    Home\Main as HomeMain,
    Task\Main as TaskMain,
    Task\Archived as TaskArchived,
    Employee\Main as EmployeeMain,
    Employee\Profile\Show as EmployeeProfile,
    Project\Main as ProjectMain,
    Project\Show as ProjectShow,
    Notification\Main as NotificationMain,
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


    Route::get('/', TaskMain::class)->name('tasks');

    Route::prefix('employees')->group(function () {
        Route::get('/', EmployeeMain::class)->name('employees');
        Route::get('/{id}', EmployeeProfile::class)->name('employees.profile');
    });

    Route::prefix('projects')->group(function () {
        Route::get('/', ProjectMain::class)->name('projects');
        Route::get('/{id}', ProjectShow::class)->name('projects.show');
    });

    Route::prefix('task')->group(function () {

        Route::get('/archived', TaskArchived::class)->name('tasks.archive');
    });

    Route::prefix('notifications')->group(function () {
        Route::get('/', NotificationMain::class)->name('notifications');
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard', HomeMain::class)->name('home');
    });
});
