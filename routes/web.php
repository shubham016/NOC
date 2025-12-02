<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationFormController;
use App\Http\Controllers\RecordController;

// Home/Welcome Route
Route::get('/', function () {
    return redirect()->route('registration-forms.index');
});

    // Registration Forms Resource Routes
    Route::resource('registration-forms', RegistrationFormController::class);

    // Additional Registration Form Routes (if needed for specific blade files)
    Route::prefix('registration-forms')->name('registration-forms.')->group(function () {
    
    // Create form
    Route::get('/create', [RegistrationFormController::class, 'create'])->name('create');
    
    // Edit form
    Route::get('/{id}/edit', [RegistrationFormController::class, 'edit'])->name('edit');
    
    // Show individual registration form
    Route::get('/{id}', [RegistrationFormController::class, 'show'])->name('show');
    
    // Welcome/Landing page for registration forms
    Route::get('/welcome', function () {
        return view('registration_forms.welcome');
    })->name('welcome');
});

/* Route::resource('registration-forms', RegistrationFormController::class);

Route::prefix('registration-forms')->name('registration-forms.')->group(function () {
    Route::get('/create', [RegistrationFormController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [RegistrationFormController::class, 'edit'])->name('edit');
    Route::get('/{id}', [RegistrationFormController::class, 'show'])->name('show');
    Route::get('/welcome', function () {
        return view('registration_forms.welcome');
    })->name('welcome');
}); */