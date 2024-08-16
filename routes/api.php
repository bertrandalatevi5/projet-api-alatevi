<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrdersIntentsController;
use App\Http\Controllers\TicketTypesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/events', [EventsController::class, 'index']);  //consulter la liste des événements en cours avec pagination
Route::get('/events/search/{event_city}', [EventsController::class, 'search']);  //rechercher les événements par ville

Route::get('/events/{event_id}/ticket-types', [TicketTypesController::class, 'index']);  //consulter la liste des types de tickets disponibles pour un événement donné

Route::post('/orders-intents', [OrdersIntentsController::class, 'store']);  //créer une intention de commande

Route::get('/orders/{used_id}', [OrdersController::class, 'index']);  //liste des commandes effectuées par le client 
Route::post('/orders', [OrdersController::class, 'store']);  //valider une intention de commande