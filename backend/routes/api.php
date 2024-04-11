<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PictureController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

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

// Create link for clients : React, Vue, Angular, Node, Js Native 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("activities", ActivityController::class);
Route::post('/activities/{id}', [ActivityController::class, 'update']);
Route::apiResource("comments", CommentController::class);
Route::apiResource("events", EventController::class);
Route::apiResource("pictures", PictureController::class);
Route::apiResource("roles", RoleController::class);
Route::apiResource("sections", SectionController::class);

//Accessible to everyone
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Accessible only via JWT
Route::middleware('auth:api')->group(function () {
    Route::get('/currentuser', [UserController::class, 'currentUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
