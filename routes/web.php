<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\AuthenticatedSessionController;
use App\Http\Controllers\User\Auth\ConfirmablePasswordController;
use App\Http\Controllers\User\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\User\Auth\EmailVerificationPromptController;
use App\Http\Controllers\User\Auth\NewPasswordController;
use App\Http\Controllers\User\Auth\PasswordResetLinkController;
use App\Http\Controllers\User\Auth\RegisteredUserController;
use App\Http\Controllers\User\Auth\VerifyEmailController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\ProductController;

// routing

//root
Route::get('/', function () {
    return view('welcome');
});

// dashboard
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

// user management
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->middleware('guest:users')
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store'])->middleware('guest:users')
    ;

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest:users')
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->middleware('guest:users')
    ;

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest:users')
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest:users')
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest:users')
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest:users')
                ->name('password.update');
});

Route::middleware('auth:users')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth:users')
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth:users', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth:users', 'throttle:6,1'])
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth:users')
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth:users');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:users')
                ->name('logout');
});

// user profile
Route::prefix('profiles')
     ->middleware('auth:users')->group(function (){
         Route::resource('users', ProfileController::class, ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
         Route::get('/users/{user}/products', [ProfileController::class, 'getProducts'])->name('users.products');
     });

// product routing
Route::resource('users.products', ProductController::class, ['except' => ['show']])->middleware('auth:users');

Route::resource('products', ProductController::class, ['only' => ['index', 'show']]);
