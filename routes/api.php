<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoadAvatarController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserOutputController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/load-avatar', [LoadAvatarController::class, 'store']);
    Route::post('/changeInfoUser', [UserOutputController::class, 'changeInfoUser']);
    Route::post('/dataOrder', [UserOutputController::class, 'dataOrder']);
    Route::post('/create_product', [MenuController::class, 'createProduct']);
    Route::post('/edit_product', [MenuController::class, 'edit']);
    Route::post('/cart/{id}', [CartController::class, 'add']);
    Route::post('/cart_delete/{id}', [CartController::class, 'delete']);
    Route::post('/create_order', [OrderController::class, 'createOrder']);
    Route::post('/order_status/{id}', [OrderController::class, 'editStatus']);
    Route::post('/add_promo', [PromoController::class, 'add']);
    Route::delete('/delete_promo/{id}', [PromoController::class, 'delete']);
    Route::delete('/delete_product{id}', [MenuController::class, 'delete']);
    Route::post('/ban/{id}', [UserOutputController::class, 'ban']);
    Route::post('/unban/{id}', [UserOutputController::class, 'unban']);
    Route::post('/setadmin/{id}', [UserOutputController::class, 'setadmin']);
    Route::post('/setmanager/{id}', [UserOutputController::class, 'setmanager']);
    Route::get('/all_users', [UserOutputController::class, 'all']);
    Route::get('/reviews', [ReviewController::class, 'all']);
    Route::post('/add/comment', [CommentController::class, 'addcomm']);
    Route::post('/delete/comment', [CommentController::class, 'delcomm']);
});

Route::post('/add_review', [ReviewController::class, 'add']);
Route::get('/menu_all', [MenuController::class, 'allMenu']);
Route::get('/type_all', [TypeController::class, 'all']);
Route::get('/product/{id}', [MenuController::class, 'find']);
Route::get('/cart/all', [CartController::class, 'all']);
Route::get('/orders', [OrderController::class, 'all']);
Route::get('/orders_end', [OrderController::class, 'allEndOrders']);
Route::get('/orders_admin', [OrderController::class, 'allAdmin']);
Route::get('/promo', [PromoController::class, 'all']);
Route::post('/comments', [CommentController::class, 'allcomm']);
Route::get('/all/comments', [CommentController::class, 'all']);