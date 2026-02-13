
<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/students', StudentController::class);
Route::resource('/majors', MajorController::class);
Route::resource('/categories', CategoryController::class); // Fixed: categorys → categories
