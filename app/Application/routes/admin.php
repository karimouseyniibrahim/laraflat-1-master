<?php
    Route::get('icons' , 'HomeController@icons');
    Route::get('docs' , 'HomeController@apiDocs');
    #### user control
    Route::get('user' , 'UserController@index');
    Route::get('user/item/{id?}' , 'UserController@show');
    Route::post('user/item' , 'UserController@store');
    Route::post('user/item/{id}' , 'UserController@update');
    Route::get('user/{id}/delete' , 'UserController@destroy');
    Route::get('user/{id}/view' , 'UserController@getById');
    #### group control
    Route::get('group' , 'GroupController@index');
    Route::get('group/item/{id?}' , 'GroupController@show');
    Route::post('group/item' , 'GroupController@store');
    Route::post('group/item/{id}' , 'GroupController@update');
    Route::get('group/{id}/delete' , 'GroupController@destroy');
    Route::get('group/{id}/view' , 'GroupController@getById');
    #### role control
    Route::get('role' , 'RoleController@index');
    Route::get('role/item/{id?}' , 'RoleController@show');
    Route::post('role/item' , 'RoleController@store');
    Route::post('role/item/{id}' , 'RoleController@update');
    Route::get('role/{id}/delete' , 'RoleController@destroy');
    Route::get('role/{id}/view' , 'RoleController@getById');
    #### permission control
    Route::get('permission' , 'PermissionController@index');
    Route::get('permission/item/{id?}' , 'PermissionController@show');
    Route::post('permission/item' , 'PermissionController@store');
    Route::post('permission/item/{id}' , 'PermissionController@update');
    Route::get('permission/{id}/delete' , 'PermissionController@destroy');
    Route::get('permission/{id}/view' , 'PermissionController@getById');
    #### home control
    Route::get('home/{pages?}/{limit?}' , 'HomeController@index');
    #### setting control
    Route::get('setting' , 'SettingController@index');
    Route::get('setting/item/{id?}' , 'SettingController@show');
    Route::post('setting/item' , 'SettingController@store');
    Route::post('setting/item/{id}' , 'SettingController@update');
    Route::get('setting/{id}/delete' , 'SettingController@destroy');
    Route::get('setting/{id}/view' , 'SettingController@getById');
    #### menu control
    Route::get('menu' , 'MenuController@index');
    Route::get('menu/item/{id?}' , 'MenuController@show');
    Route::post('menu/item' , 'MenuController@store');
    Route::post('menu/item/{id}' , 'MenuController@update');
    Route::get('menu/{id}/delete' , 'MenuController@destroy');
    Route::get('menu/{id}/view' , 'MenuController@getById');
    Route::post('update/menuItem' , 'MenuController@menuItem');
    Route::post('addNewItemToMenu' , 'MenuController@addNewItemToMenu');
    Route::get('deleteMenuItem/{id}' , 'MenuController@deleteMenuItem');
    Route::get('getItemInfo/{id}' , 'MenuController@getItemInfo');
    Route::post('updateOneMenuItem' , 'MenuController@updateOneMenuItem');


    #### page control
    Route::get('page' , 'PageController@index');
    Route::get('page/item/{id?}' , 'PageController@show');
    Route::post('page/item' , 'PageController@store');
    Route::post('page/item/{id}' , 'PageController@update');
    Route::get('page/{id}/delete' , 'PageController@destroy');
    Route::get('page/{id}/view' , 'PageController@getById');
    #### log control
    Route::get('log' , 'LogController@index');
    Route::get('log/item/{id?}' , 'LogController@show');
    Route::post('log/item' , 'LogController@store');
    Route::post('log/item/{id}' , 'LogController@update');
    Route::get('log/{id}/delete' , 'LogController@destroy');
    Route::get('log/{id}/view' , 'LogController@getById');
    #### categorie control
    Route::get('categorie' , 'CategorieController@index');
    Route::get('categorie/item/{id?}' , 'CategorieController@show');
    Route::post('categorie/item' , 'CategorieController@store');
    Route::post('categorie/item/{id}' , 'CategorieController@update');
    Route::get('categorie/{id}/delete' , 'CategorieController@destroy');
    Route::get('categorie/{id}/view' , 'CategorieController@getById');


    #### section control
    Route::get('section' , 'SectionController@index');
    Route::get('section/item/{id?}' , 'SectionController@show');
    Route::post('section/item' , 'SectionController@store');
     Route::post('section/item/{id}' , 'SectionController@update');
    Route::get('section/{id}/delete' , 'SectionController@destroy');
    Route::get('section/{id}/view' , 'SectionController@getById');
    #### shoprental control
    Route::get('shoprental' , 'ShoprentalController@index');
    Route::get('shoprental/item/{id?}' , 'ShoprentalController@show');
    Route::post('shoprental/item' , 'ShoprentalController@store');
     Route::post('shoprental/item/{id}' , 'ShoprentalController@update');
    Route::get('shoprental/{id}/delete' , 'ShoprentalController@destroy');
    Route::get('shoprental/{id}/view' , 'ShoprentalController@getById');
    #### demandeshoprental control
    Route::get('demandeshoprental' , 'DemandeshoprentalController@index');
    Route::get('demandeshoprental/item/{id?}' , 'DemandeshoprentalController@show');
    Route::post('demandeshoprental/item' , 'DemandeshoprentalController@store');
     Route::post('demandeshoprental/item/{id}' , 'DemandeshoprentalController@update');
    Route::get('demandeshoprental/{id}/delete' , 'DemandeshoprentalController@destroy');
    Route::get('demandeshoprental/{id}/view' , 'DemandeshoprentalController@getById');

    Route::get('getshoprental/{id}' , 'DemandeshoprentalController@getshoprental');
    Route::get('getshoprentalinfos/{id}' , 'DemandeshoprentalController@getshoprentalinfos');



    #### artisans control
    Route::get('artisans' , 'ArtisansController@index');
    Route::get('artisans/item/{id?}' , 'ArtisansController@show');
    Route::post('artisans/item' , 'ArtisansController@store');
     Route::post('artisans/item/{id}' , 'ArtisansController@update');
    Route::get('artisans/{id}/delete' , 'ArtisansController@destroy');
    Route::get('artisans/{id}/view' , 'ArtisansController@getById');
    



    
    #### formations control
    Route::get('formations' , 'FormationsController@index');
    Route::get('formations/item/{id?}' , 'FormationsController@show');
    Route::post('formations/item' , 'FormationsController@store');
    Route::post('formations/item/{id}' , 'FormationsController@update');
    Route::get('formations/{id}/delete' , 'FormationsController@destroy');
    Route::get('formations/{id}/view' , 'FormationsController@getById');
    

    #### inscription control
    Route::get('inscription' , 'InscriptionController@index');
    Route::get('inscription/item/{id?}' , 'InscriptionController@show');
    Route::post('inscription/item' , 'InscriptionController@store');
     Route::post('inscription/item/{id}' , 'InscriptionController@update');
    Route::get('inscription/{id}/delete' , 'InscriptionController@destroy');
    Route::get('inscription/{id}/view' , 'InscriptionController@getById');
    Route::get('getformationinfos/{id}' , 'InscriptionController@getformationinfos');


    #### contact control
    Route::get('contact' , 'ContactController@index');
    Route::get('contact/item/{id?}' , 'ContactController@show');
    Route::post('contact/item' , 'ContactController@store');
     Route::post('contact/item/{id}' , 'ContactController@update');
    Route::get('contact/{id}/delete' , 'ContactController@destroy');
    Route::get('contact/{id}/view' , 'ContactController@getById');
    #### news control
    Route::get('news' , 'NewsController@index');
    Route::get('news/item/{id?}' , 'NewsController@show');
    Route::post('news/item' , 'NewsController@store');
     Route::post('news/item/{id}' , 'NewsController@update');
    Route::get('news/{id}/delete' , 'NewsController@destroy');
    Route::get('news/{id}/view' , 'NewsController@getById');