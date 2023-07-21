<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientRegister_controller;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\newslettreController;
use App\Http\Controllers\site_clientController;
use App\Http\Controllers\ticketClientController;
use App\Http\Controllers\ticketReplyController;
use App\Http\Controllers\commandeController;
use App\Http\Controllers\contactController;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

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



Route::get('/sanctum/csrf-cookie', CsrfCookieController::class . '@show');
Route::post('register', [ClientRegister_controller::class, 'StoreClient']);
Route::post('login', [ClientRegister_controller::class, 'loginClient']);
Route::post('RegisterReview', [ReviewController::class, 'store']);
Route::post('subscribe', [newslettreController::class, 'store']);
Route::post('submitTicket', [ticketClientController::class, 'storeTicket']);
Route::post('submitTicketReply', [ticketReplyController::class, 'store']);
Route::post('submitCommande', [commandeController::class, 'store']);
Route::post('submitContact', [contactController::class, 'store']);
Route::get('isAuthenticated', [ClientRegister_controller::class, 'isAuthenticated']);
Route::get('Logout', [ClientRegister_controller::class, 'logoutClient']);
Route::get('Sites', [ClientRegister_controller::class, 'sites']);
Route::get('Plans', [PlanController::class, 'index']);
Route::get('Reviews', [ClientRegister_controller::class, 'reviews']);
Route::get('ourWork', [site_clientController::class, 'showWebSites']);
Route::get('getTickets', [ticketClientController::class, 'ticketBelongToThisClient']);
Route::get('getTicketAndReplies', [ticketClientController::class, 'ticketAndReplies']);
Route::get('getCommandes', [ClientRegister_controller::class, 'commandes']);
