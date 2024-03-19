<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PictureController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\ActivityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("activities", ActivityController::class);
Route::apiResource("coments", CommentController::class);
Route::apiResource("events", EventController::class);
Route::apiResource("pictures", PictureController::class);
Route::apiResource("roles", RoleController::class);
Route::apiResource("sections", SectionController::class);
