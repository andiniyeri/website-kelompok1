<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanelControl\DashboardController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;

// Language Switch
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
        App::setLocale($locale);
    }
    return redirect()->back();
});

// Auth Routes
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('signup');
Route::post('/login', [AuthController::class, 'login'])->name('signin');
Route::get('/logout', [AuthController::class, 'logout'])->name('signout');

// Admin Routes
Route::prefix('controlpanel')
    ->middleware(['checkLogin', 'checkAdmin'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        // CRUD Buku
        Route::resource('books', BookController::class);

        // CRUD Peminjaman
        Route::resource('loans', LoanController::class);

        Route::put(
            'loans/{id}/return',
            [LoanController::class, 'returnBook']
        )->name('loans.return');

        Route::get(
    'loans/create',
    [LoanController::class, 'create']
)->name('loans.create');
});

    Route::prefix('user')
        ->middleware(['checkLogin', 'checkUser'])
        ->group(function () {

            Route::get(
    '/dashboard',
    [LoanController::class, 'userDashboard']
)->name('user.dashboard');

           Route::get('/loans', [LoanController::class, 'userLoans'])
            ->name('user.loans');

});
