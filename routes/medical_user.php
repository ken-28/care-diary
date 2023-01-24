<?php

use App\Http\Controllers\MedicalUser\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MedicalUser\Auth\ConfirmablePasswordController;
use App\Http\Controllers\MedicalUser\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\MedicalUser\Auth\EmailVerificationPromptController;
use App\Http\Controllers\MedicalUser\Auth\NewPasswordController;
use App\Http\Controllers\MedicalUser\Auth\PasswordResetLinkController;
use App\Http\Controllers\MedicalUser\Auth\RegisteredUserController;
use App\Http\Controllers\MedicalUser\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest:medical_user')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest:medical_user');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest:medical_user')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest:medical_user');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest:medical_user')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest:medical_user')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest:medical_user')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest:medical_user')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth:medical_user')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth:medical_user')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth:medical_user');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:medical_user')
                ->name('logout');