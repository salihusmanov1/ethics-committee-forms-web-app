<?php

use App\Http\Controllers\AppStatusController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavController;
use App\Http\Controllers\Form1Controller;
use App\Http\Controllers\Form2Controller;
use App\Http\Controllers\ChecklistFormController;
use App\Http\Controllers\UserController;
use App\Models\ChecklistForm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });

Route::controller(UserController::class)->group(
    function () {
        Route::get('/', ('login'));
        Route::get('/register', ('register'));
        Route::post('/add-user', ('store'));
        Route::post('/login-user', ('loginUser'))->name('login-user');
        Route::get('/logout', ('logout'));
    }
);


Route::middleware('isLoggedIn')->controller(NavController::class)->group(
    function () {
        Route::get('/dashboard', ('dashboard'))->name('dashboard');
        Route::get('/form1', ('form1'))->name('form1');
        Route::get('/form2', ('form2'))->name('form2');
        Route::get('/checklist_form', ('checklist_form'))->name('checklist');
        Route::get('/appstatus', ('appstatus'))->name('app-status');
    }
);

Route::get('/admin_dashboard', [NavController::class, 'admin_dashboard'])->middleware('isAdmin')->name('admin-dashboard');

Route::get('delete_appstatus/{id}', [AppStatusController::class, 'delete_appstatus']);
Route::get('edit/{id}', [AppStatusController::class, 'edit'])->middleware('isLoggedIn');
Route::get('show/{id}', [AppStatusController::class, 'show'])->middleware('isLoggedIn');

Route::post('/update', [AppStatusController::class, 'update_appstatus'])->name('update-status');
Route::post('/submit-form', [Form1Controller::class, 'submitForm'])->name('submit-form');
Route::post('/submit-form2', [Form2Controller::class, 'submitForm2'])->name('submit-form2');

Route::post('/submit-checklist', [ChecklistFormController::class, 'submitForm'])->name('submit-checklist');

Route::post('/edit-form1', [Form1Controller::class, 'update'])->name('edit-form1');
Route::post('/edit-form2', [Form2Controller::class, 'update'])->name('edit-form2');

Route::post('/edit-checklist', [ChecklistFormController::class, 'update'])->name('edit-checklist');


Route::get('generate-pdf/{id}', [NavController::class, 'generatePdf']);
