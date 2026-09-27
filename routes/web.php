<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\SubscriptionPackageController;
use App\Models\SubscriptionPackage;

// kelompok yang bisa di akses oleh user yang sudah login
Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Berhasil logout');
    })->name('logout');
    // kelompok yang bisa di akses oleh user yang sudah login dan memiliki role admin
    // prefix adalah untuk menambahkan prefix pada url, misal /admin/dashboard
    Route::prefix('admin')->name('admin.')->middleware(['IsAdmin'])->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        // resource adalah untuk membuat route resource, yang otomatis membuat route untuk index, create, store, show, edit, update, destroy
        Route::resource('book-categories', BookCategoryController::class);
        Route::resource('subscription-packages', SubscriptionPackageController::class);

        Route::get('/categories', function () {
            // return view('admin.categories');
        })->name('categories');
    });
});

Route::get('/', function () {
    $subscriptionPackages = SubscriptionPackage::all();
    return view('home', compact('subscriptionPackages'));
})->name('home');

Route::get('/subscription-packages', [SubscriptionPackageController::class, 'userIndex'])->name('subscription-packages.index');

Route::middleware(['isGuest'])->group(function () {

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/register', [UserController::class, 'register'])->name('register.store')->middleware('throttle:5,1');
    // membatasi jumlah request yang bisa dilakukan oleh user dalam 1 menit, jika lebih dari 5 maka akan di blokir selama 1 menit
    Route::post('/login', [UserController::class, 'login'])->name('login.store')->middleware('throttle:5,1');
    Route::get('/login', function () {
        return view('login');
    })->name('login');
});
