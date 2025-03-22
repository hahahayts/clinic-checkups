<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return inertia('User/Dashboard', ['user' => Auth::user()]);
    })->name('dashboard');

    // User Appointment Routes
    Route::resource('appointments', AppointmentController::class);

    // Reschedule Appointment
    Route::get('/appointments/reschedule/{id}', function ($id) {
        return inertia('User/RescheduleAppointment', [
            'appointment' => \App\Models\Appointment::findOrFail($id)
        ]);
    })->name('appointments.reschedule');
});

// Admin Routes (Requires 'admin' Middleware)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return inertia('Admin/Dashboard', ['user' => Auth::user()]);
    })->name('admin.dashboard');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/appointments', [AdminController::class, 'appointments'])->name('admin.appointments');
    Route::delete('/admin/appointments/{id}', [AdminController::class, 'deleteAppointment'])->name('admin.appointments.delete');
});

// Home Route (Public)
Route::get('/', function () {
    return inertia('Welcome');
})->name('home');
