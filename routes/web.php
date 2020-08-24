<?php

// Route inscription
Route::get('/', 'AuthentificationController@create');
Route::post('/save-user', 'AuthentificationController@store');
Route::post('/auth-user', 'AuthentificationController@Auth');




//Edit Photo
Route::post('/edit_photo/{$id_user}', 'HomeController@edit_photo');

Route::get('/home', 'HomeController@index');
Route::get('show-user/{id_user}', 'HomeController@detail_user');
// Route Deconnexion
Route::get('/deconnexion', 'HomeController@logout')->name('deconnexion');
Route::post('/edit-user/{id_user}', 'HomeController@edit');

//Publication
Route::post('/save-pub', 'HomeController@publication');

//Commentaire
Route::post('/save-commente/{id_pub}', 'HomeController@commentaire');

//Like
Route::get('/like-inactive/{id_pub}', 'HomeController@like_inactive');
Route::get('/like-active/{id_pub}', 'HomeController@like_active');