<?php

use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/upload',[UploadController::class,'save']);
