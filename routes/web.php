<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);

Route::get('/search', SearchController::class);
Route::get('/skibidi', function () {
    $cat = Category::all();

    foreach ($cat as $c) {
        $n = $c['name'];
        $i = $c['id'];
        echo "<li>
        <a href='http://localhost/search?category=$i'>$n</a>
        </li>";
    }
});

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/order/{id}', [OrderController::class, 'create'])->middleware('auth');
Route::post('/order/{id}', [OrderController::class, 'store'])->middleware('auth');
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
});
