<?php

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\ResetPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\Pages\ClientsManagement;
use App\Http\Livewire\Pages\UserManagement;

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

// Route::get('/', function(){
//     return redirect('sign-in');
// });

Route::get('/', function () {
    return view('home');
});


Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');



Route::get('ingresar', Login::class)->middleware('guest')->name('login');

Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');


Route::group(['middleware' => 'auth'], function () {
Route::get('usuarios', UserManagement::class)->name('usuarios');
Route::get('dashboard', Dashboard::class)->name('dashboard');
Route::get('clientes', ClientsManagement::class)->name('clientes');
});