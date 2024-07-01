<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LetterController;

Route::get("/", function () {
    return "Hello World";
});


Route::apiResource("/letters", LetterController::class);
