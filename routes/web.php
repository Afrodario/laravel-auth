<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Raggruppo tutte le rotte per la sezione di amministrazione, tramite il metodo MIDDLEWARE che controlla l'accesso solo a chi è loggato
//con namespace = cartella Admin, name = nome delle rotte che inizia per admin., prefix = prefisso di ogni URL
Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {
        Route::get('/', 'HomeController@index')
            ->name('home');
    });
    
//Dopodiché devo andare a modificare la rotta home in admin in App/Providers/RouteServiceProvider perché punti, dopo il login, ad admin
//In App/HTTP/Middleware/Authenticate.php posso reindirizzare l'utente, se non autenticato, alla pagina di login modificando la rotta
//in redirectTo
