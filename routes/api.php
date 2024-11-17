<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckIfUserExists;
use App\Http\Middleware\ValidateUserData;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/users'], function () {
    Route::get('/', [UserController::class, 'getUsers']);
    Route::post('/', [UserController::class, 'createUser'])->middleware([ValidateUserData::class]);
    Route::put('/{id}', [UserController::class, 'updateUser'])->middleware([CheckIfUserExists::class, ValidateUserData::class]);
    Route::delete('/{id}', [UserController::class, 'deleteUser'])->middleware([CheckIfUserExists::class]);
});

