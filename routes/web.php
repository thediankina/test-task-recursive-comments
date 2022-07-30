<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::controller(Controller::class)->group(function () {
    Route::get('/', 'index');
    Route::post('comment/create', 'create');
    Route::post('comment/reply', 'reply');
});
