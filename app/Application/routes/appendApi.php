<?php

#user
Route::post('users/login' , 'UserApi@login');
Route::get('users/getById/{id}', 'UserApi@getById');
Route::get('users/delete/{id}', 'UserApi@delete');
Route::post('users/add', 'UserApi@add');
Route::post('users/update', 'UserApi@update');
Route::get('users/{limit?}/{offset?}', 'UserApi@index');
Route::get('users/getUserByToken' , 'UserApi@getUserByToken');

#page
Route::get('page/getById/{id}/{lang?}', 'PageApi@getById');
Route::get('page/delete/{id}', 'PageApi@delete');
Route::post('page/add', 'PageApi@add');
Route::post('page/update/{id}', 'PageApi@update');
Route::get('page/{limit?}/{offset?}/{lang?}', 'PageApi@index');


#categorie
Route::get('categorie/getById/{id}/{lang?}', 'CategorieApi@getById');
Route::get('categorie/delete/{id}', 'CategorieApi@delete');
Route::post('categorie/add', 'CategorieApi@add');
Route::post('categorie/update/{id}', 'CategorieApi@update');
Route::get('categorie/{limit?}/{offset?}/{lang?}', 'CategorieApi@index');


#section
Route::get('section/getById/{id}/{lang?}', 'SectionApi@getById');
Route::get('section/delete/{id}', 'SectionApi@delete');
Route::post('section/add', 'SectionApi@add');
Route::post('section/update/{id}', 'SectionApi@update');
Route::get('section/{limit?}/{offset?}/{lang?}', 'SectionApi@index');

#shoprental
Route::get('shoprental/getById/{id}/{lang?}', 'ShoprentalApi@getById');
Route::get('shoprental/delete/{id}', 'ShoprentalApi@delete');
Route::post('shoprental/add', 'ShoprentalApi@add');
Route::post('shoprental/update/{id}', 'ShoprentalApi@update');
Route::get('shoprental/{limit?}/{offset?}/{lang?}', 'ShoprentalApi@index');

#demandeshoprental
Route::get('demandeshoprental/getById/{id}/{lang?}', 'DemandeshoprentalApi@getById');
Route::get('demandeshoprental/delete/{id}', 'DemandeshoprentalApi@delete');
Route::post('demandeshoprental/add', 'DemandeshoprentalApi@add');
Route::post('demandeshoprental/update/{id}', 'DemandeshoprentalApi@update');
Route::get('demandeshoprental/{limit?}/{offset?}/{lang?}', 'DemandeshoprentalApi@index');

#artisans
Route::get('artisans/getById/{id}/{lang?}', 'ArtisansApi@getById');
Route::get('artisans/delete/{id}', 'ArtisansApi@delete');
Route::post('artisans/add', 'ArtisansApi@add');
Route::post('artisans/update/{id}', 'ArtisansApi@update');
Route::get('artisans/{limit?}/{offset?}/{lang?}', 'ArtisansApi@index');

#formations
Route::get('formations/getById/{id}/{lang?}', 'FormationsApi@getById');
Route::get('formations/delete/{id}', 'FormationsApi@delete');
Route::post('formations/add', 'FormationsApi@add');
Route::post('formations/update/{id}', 'FormationsApi@update');
Route::get('formations/{limit?}/{offset?}/{lang?}', 'FormationsApi@index');

#inscription
Route::get('inscription/getById/{id}/{lang?}', 'InscriptionApi@getById');
Route::get('inscription/delete/{id}', 'InscriptionApi@delete');
Route::post('inscription/add', 'InscriptionApi@add');
Route::post('inscription/update/{id}', 'InscriptionApi@update');
Route::get('inscription/{limit?}/{offset?}/{lang?}', 'InscriptionApi@index');

#contact
Route::get('contact/getById/{id}/{lang?}', 'ContactApi@getById');
Route::get('contact/delete/{id}', 'ContactApi@delete');
Route::post('contact/add', 'ContactApi@add');
Route::post('contact/update/{id}', 'ContactApi@update');
Route::get('contact/{limit?}/{offset?}/{lang?}', 'ContactApi@index');

#news
Route::get('news/getById/{id}/{lang?}', 'NewsApi@getById');
Route::get('news/delete/{id}', 'NewsApi@delete');
Route::post('news/add', 'NewsApi@add');
Route::post('news/update/{id}', 'NewsApi@update');
Route::get('news/{limit?}/{offset?}/{lang?}', 'NewsApi@index');