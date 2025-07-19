<?php

use App\Http\Controllers\ProfessionalProfileController;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth')->group(function () {
    Route::redirect('settings', '/settings/professional/profile');

    Route::get('settings/professional/profile', [ProfessionalProfileController::class, 'edit'])->name('professional.profile.edit');
    Route::patch('settings/professional/profile', [ProfessionalProfileController::class, 'update'])->name('professional.profile.update');
    Route::delete('settings/professional/profile', [ProfessionalProfileController::class, 'destroy'])->name('professional.profile.destroy');

    Route::get('settings/password', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('settings/password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('settings/appearance', function () {
        return Inertia::render('settings/Appearance');
    })->name('appearance');
});
