<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JeniskontakController;
use App\Models\Project;

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

Route::get('/', [LandingController::class, 'landing']);
Route::get('/about', [LandingController::class, 'about']);
Route::get('/projects', [LandingController::class, 'projects']);
Route::get('/project/{id}', [LandingController::class, 'project'])->name('projek.detail');
Route::get('/contact', [LandingController::class, 'contact']);


// Auth::routes();

Route::get('/register', [MasukController::class, 'register'])->middleware('guest')->name('register.page');
Route::post('/register', [MasukController::class, 'buat'])->name('buat.page');
Route::get('/login', [MasukController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [MasukController::class, 'proseslogin'])->name('proses.page');
Route::post('/', [MasukController::class, 'logout'])->name('logout');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
Route::resource('/dashboard/siswa', SiswaController::class);
Route::resource('/dashboard/project', ProjectController::class);
Route::resource('/dashboard/contact', ContactController::class);
Route::resource('/dashboard/jeniskontak', JeniskontakController::class);
Route::resource('/dashboard', DashboardController::class,);

Route::get('dashboard/project/{id}/lihat',[ProjectController::class,'lihat'])->name('project.lihat');
Route::get('dashboard/project/{id}/buat',[ProjectController::class,'buat'])->name('buat.page');
Route::post('dashboard/project/make',[ProjectController::class,'make'])->name('make.page');

Route::post('/dashboard/image/{id}', [DashboardController::class, 'imgdel'])->name('img.delete');
});
