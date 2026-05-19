<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('splash');
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'sw'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

// Auth Routes
Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.post');

Route::middleware(['auth', \App\Http\Middleware\SetLocale::class])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProfileController::class, 'index'])->name('index');
        Route::get('/settings', [\App\Http\Controllers\ProfileController::class, 'settings'])->name('settings');
        Route::put('/update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('update');
    });

    Route::prefix('integrations')->name('integrations.')->group(function () {
        Route::get('/payments', [\App\Http\Controllers\IntegrationController::class, 'payments'])->name('payments');
        Route::get('/sms', [\App\Http\Controllers\IntegrationController::class, 'sms'])->name('sms');
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/system', [\App\Http\Controllers\SystemController::class, 'system'])->name('system');
        Route::post('/update', [\App\Http\Controllers\SystemController::class, 'updateSettings'])->name('update');
    });

    Route::prefix('books')->name('books.')->group(function () {
        Route::get('/', [\App\Http\Controllers\BookController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\BookController::class, 'store'])->name('store');
        Route::put('/{book}', [\App\Http\Controllers\BookController::class, 'update'])->name('update');
        Route::delete('/{book}', [\App\Http\Controllers\BookController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [\App\Http\Controllers\OrderController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\OrderController::class, 'store'])->name('store');
        Route::get('/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('show');
    });

    Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/', function () { return view('pages.payments.index'); })->name('index');
    });

    Route::prefix('delivery')->name('delivery.')->group(function () {
        Route::get('/', function () { return view('pages.delivery.index'); })->name('index');
    });

    Route::prefix('transport')->name('transport.')->group(function () {
        Route::get('/', function () { return view('pages.transport.index'); })->name('index');
    });

    Route::prefix('agents')->name('agents.')->group(function () {
        Route::get('/', function () { return view('pages.agents.index'); })->name('index');
    });

    Route::prefix('buyers')->name('buyers.')->group(function () {
        Route::get('/', function () { return view('pages.buyers.index'); })->name('index');
    });

    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', function () { return view('pages.reports.index'); })->name('index');
    });

    Route::prefix('inventory')->name('inventory.')->group(function () {
        Route::get('/', function () { return view('pages.inventory.index'); })->name('index');
    });
});
