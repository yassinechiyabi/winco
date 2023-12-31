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
use App\Http\Controllers\randomCommandeController;
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
Route::post('RegisterReview', [ReviewController::class, 'store'])->middleware('auth');
Route::post('subscribe', [newslettreController::class, 'store']);
Route::post('submitTicket', [ticketClientController::class, 'storeTicket'])->middleware('auth');
Route::post('submitTicketReply', [ticketReplyController::class, 'store'])->middleware('auth');
Route::post('submitCommande', [commandeController::class, 'store'])->middleware('auth');
Route::post('submitContact', [contactController::class, 'store']);
Route::post('submitRandomCommande', [randomCommandeController::class, 'store']);
Route::get('isAuthenticated', [ClientRegister_controller::class, 'isAuthenticated']);
Route::get('Logout', [ClientRegister_controller::class, 'logoutClient'])->middleware('auth');
Route::get('Sites', [ClientRegister_controller::class, 'sites'])->middleware('auth');
Route::get('Plans', [PlanController::class, 'index']);
Route::get('Reviews', [ClientRegister_controller::class, 'reviews']);
Route::get('ourWork', [site_clientController::class, 'showWebSites']);
Route::get('getTickets', [ticketClientController::class, 'ticketBelongToThisClient'])->middleware('auth');
Route::get('getTicketAndReplies', [ticketClientController::class, 'ticketAndReplies'])->middleware('auth');
Route::get('getCommandes', [ClientRegister_controller::class, 'commandes'])->middleware('auth');
