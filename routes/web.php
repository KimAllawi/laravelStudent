<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\TreatmentsController;
use App\Models\Invoices;
use App\Models\Treatments;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/',[]);


Auth::routes();

Route::middleware(['auth'])->group(function (){


Route::resource('patients', PatientsController::class);

Route::resource('Appointments', AppointmentsController::class);

Route::resource('Treatments', TreatmentsController::class);

Route::resource('Invoices', InvoicesController::class);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Route::get('/signIn', [App\Http\Controllers\HomeController::class, 'signIn'])->name('signIn');

Route::get('/reportAppointment/{patient_id}', [PatientsController::class, 'reportAppointment'])->name('reportAppointment');

Route::get('/reportInvoices/{patient_id}',[PatientsController::class,'reportInvoices'])->name('reportInvoices');

Route::get('/search', [PatientsController::class, 'search'])->name('searchPatients');

Route::get('/searchTreatments', [TreatmentsController::class, 'search'])->name('searchTreatments');

Route::get('/searchAppointment', [AppointmentsController::class, 'search'])->name('searchAppointments');

Route::get('/searchInvoices', [InvoicesController::class, 'search'])->name('searchInvoices');


});
