<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
	return redirect('index');
});

Route::get('/login', 'LoginController@login');
Route::post('/login', 'LoginController@checkLogin');
Route::get('/logout', 'LoginController@logout');

Route::get('/index', 'IndexController@index');
Route::get('/registrazione', 'RegistrazioneController@index');
Route::post('/registrazione', 'RegistrazioneController@create');
Route::get('/username/{q}', 'RegistrazioneController@checkUsername');
Route::get('/menu', 'MenuController@menu');

Route::get('/casa', 'ImmobiliController@casa');
Route::get('/appartamento', 'ImmobiliController@appartamento');
Route::get('/cottage', 'ImmobiliController@cottage');

Route::get('/preferiti', 'PreferitiAffittiController@preferiti');
Route::get('/affitti', 'PreferitiAffittiController@affitti');

Route::get('/carica/{q}', 'ImmobiliController@carica');
Route::get('/getPreferiti/{q}', 'ImmobiliController@getPreferiti');
Route::get('/viewMore/{q}', 'ImmobiliController@viewMore');
Route::get('/search/{a}/{b}', 'ImmobiliController@search');
Route::get('/removePreferiti/{q}', 'ImmobiliController@removePreferiti');
Route::get('/addPreferiti/{q}', 'ImmobiliController@addPreferiti');
Route::get('/checkCitta/{q}', 'ImmobiliController@checkCitta');
Route::get('/affitta/{a}/{b}/{c}', 'ImmobiliController@affitta');
Route::get('/token', 'ImmobiliController@token');
Route::get('/Amadeus/{a}/{b}', 'ImmobiliController@Amadeus');
Route::get('/pexels/{a}', 'ImmobiliController@pexels');

Route::get('/getAllPreferiti', 'PreferitiAffittiController@getAllPreferiti');

Route::get('/getAffitti', 'PreferitiAffittiController@getAffitti');
Route::get('/removeAffitto/{a}/{b}/{c}', 'PreferitiAffittiController@removeAffitto');
?>