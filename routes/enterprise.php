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

