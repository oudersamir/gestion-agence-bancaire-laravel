<?php

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
    return view('auth/login');
});


Route::get('Comptes','CompteController@index');
Route::get('Supprimer_Compte','CompteController@suppression');

Route::get('Create_Compte','CompteController@create');
Route::post('/Comptes/Create_Compte/fetchOfCreate', 'CompteController@fetchOfCreate')->name('Comptes.Create_Compte.fetchOfCreate');

Route::post('/Comptes/Create_Compte/fetch', 'CompteController@fetch')->name('Comptes.Create_Compte.fetch');
Route::post('/Comptes/Create_Compte/fetch_epargne', 'CompteController@fetch_epargne')->name('Comptes.Create_Compte.fetch_epargne');
Route::post('Create_Compte_Epargne','CompteController@store');

Route::post('addCompteEpargne', 'CompteEpargneController@addCompteEpargne');

Route::get('Clients','ClientController@index');

Route::get('Create_Client','ClientController@create');


Route::delete('Clients/{id}','ClientController@destroy');

Route::delete('Comptes/{id}','CompteController@index');


Route::post('Store_Client', 'ClientController@store');

Route::put('Edit_Client/{id_client}', 'ClientController@update');

Route::get('Clients/{id_client}/Edit_Client', 'ClientController@edit');
// client search
Route::get('/client_search', 'ClientSearch@index');
Route::get('/client_search/action', 'ClientSearch@action')->name('client_search.action');
Route::get('/client_search/action2', 'ClientSearch@action2')->name('client_search.action2');
Route::get('/client_search/action3', 'ClientSearch@action3')->name('client_search.action3');
Route::get('/client_search/action4', 'ClientSearch@action4')->name('client_search.action4');

Route::get('/client_search/Releve_Compte_Courant', 'ClientSearch@Releve_Compte_Courant')->name('client_search.Releve_Compte_Courant');

Route::get('/client_search/Releve_Compte_Epargne', 'ClientSearch@Releve_Compte_Epargne')->name('client_search.Releve_Compte_Epargne');


////  compte courant 
Route::delete('Compte_courant/{id}','CompteCourantController@destroy');
Route::delete('Compte_epargnes/{id}','CompteEpargneController@destroy');
Route::post('Store_Compte_Courant','CompteCourantController@store');
// Opération
Route::get('Operations','OperationController@index');
Route::get('Effectuer_Viresement','OperationController@index_viresement');
Route::get('Effectuer_Viresement_Epargne','OperationController@index_retrait_viresement');

Route::get('Effectuer_Retrait','OperationController@index_retrait');
Route::get('Effectuer_Retrait_Epargne','OperationController@index_retrait_epargne');

Route::get('Effectuer_Virement','OperationController@index_virement');
Route::get('Effectuer_Virement_epargne','OperationController@index_virement_epargne');
Route::post('Virement_Compte_Epargne','CompteEpargneController@virement');


Route::post('Effectuer_Virement_epargne/fetch_epargne', 'OperationController@fetch_epargne')->name('OperationController.fetch_epargne');
Route::post('Effectuer_Virement/fetch', 'OperationController@fetch')->name('OperationController.fetch');
Route::post('Virement_Compte_Courant','CompteCourantController@virement');

Route::post('Viresement_Compte_Courant','CompteCourantController@viresement');
Route::post('Viresement_Compte_Epargne','CompteEpargneController@viresement');
Route::post('Retrait_Compte_Courant','CompteCourantController@retrait');
Route::post('Retrait_Compte_Epargne','CompteEpargneController@retrait');


//compte epargne 
Route::post('Store_Compte_Epargne','CompteEpargneController@store');


Auth::routes();

Route::get('/Accueil', 'HomeController@index')->name('Accueil');
Route::get('/Accueil2', 'HomeController@index2')->name('Accueil2');
