<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 07/09/18
 * Time: 20:42
 */




    Route::prefix('tipo-cardapio')->group(function (){

        Route::get('novo', 'TypeMenuController@getCreate')->name('enterprise.typemenu.create.get');
        Route::post('novo', 'TypeMenuController@postCreate')->name('enterprise.typemenu.create.post');
        Route::get('lista', 'TypeMenuController@getList')->name('enterprise.typemenu.list.get');
        Route::get('editar/{typeMenu}', 'TypeMenuController@getUpdate')->name('enterprise.typemenu.update.get');
        Route::post('editar/{typeMenu}', 'TypeMenuController@postUpdate')->name('enterprise.typemenu.update.post');

    });

    Route::prefix('cardapio')->group(function (){

        Route::get('novo', 'MenuController@getCreate')->name('enterprise.menu.create.get');
        Route::post('novo', 'MenuController@postCreate')->name('enterprise.menu.create.post');
        Route::get('lista', 'MenuController@getList')->name('enterprise.menu.list.get');
        Route::get('editar/{menu}', 'MenuController@getUpdate')->name('enterprise.menu.update.get');
        Route::post('editar/{menu}', 'MenuController@postUpdate')->name('enterprise.menu.update.post');

    });

    Route::prefix('insumo')->group(function (){

        Route::get('novo', 'FeedstockController@getCreate')->name('enterprise.feedstock.create.get');
        Route::post('novo', 'FeedstockController@postCreate')->name('enterprise.feedstock.create.post');
        Route::get('lista', 'FeedstockController@getList')->name('enterprise.feedstock.list.get');
        Route::get('editar/{feedstock}', 'FeedstockController@getUpdate')->name('enterprise.feedstock.update.get');
        Route::post('editar/{feedstock}', 'FeedstockController@postUpdate')->name('enterprise.feedstock.update.post');

    });

