<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

Route::get('/file-manager/home', function () {
    return view('services.file-manager.index');
});

Route::get('/file-manager/demo', function () {
    return view('services.file-manager.index');
});
