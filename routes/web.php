<?php

use App\Http\Controllers\ExportController;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\ResetPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\Pages\ClientsManagement;
use App\Http\Livewire\Pages\CuotasCalc;
use App\Http\Livewire\Pages\Pagos;
use App\Http\Livewire\Pages\Prestamos;
use App\Http\Livewire\Pages\PrestamosDetalle;
use App\Http\Livewire\Pages\Reports;
use App\Http\Livewire\Pages\ReportsPagos;
use App\Http\Livewire\Pages\ShowClient;
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
    Route::get('clientes/{id}', ShowClient::class)->name('cliente');
    Route::get('cuotas', CuotasCalc::class)->name('cuotas');
    Route::get('prestamos', Prestamos::class)->name('prestamos');
    Route::get('prestamos/{id}', PrestamosDetalle::class)->name('prestamo');
    Route::get('pagos', Pagos::class)->name('pagos');
    Route::get('reportes', Reports::class)->name('reportes');
    Route::get('/reports/pdf/{client}/{from_date?}/{to_date?}', [ExportController::class, 'reportPdf'])
        ->name('reportPdf');
    Route::get('reportes/pagos', ReportsPagos::class)->name('reportespagos');
    Route::get('/reports/pagos/pdf/{tipo_pago}/{typeReportName}', [ExportController::class, 'reportPdfPagos'])
        ->name('reportPdf2');
});
