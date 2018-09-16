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


    Route::prefix('cliente')->group(function (){

        Route::get('novo', 'CustomerController@getCreate')->name('enterprise.customer.create.get');
        Route::post('novo', 'CustomerController@postCreate')->name('enterprise.customer.create.post');
        Route::get('lista', 'CustomerController@getList')->name('enterprise.customer.list.get');
        Route::get('editar/{customer}', 'CustomerController@getUpdate')->name('enterprise.customer.update.get');
        Route::post('editar/{customer}', 'CustomerController@postUpdate')->name('enterprise.customer.update.post');
        Route::get('endereco/lista/{customer}', 'CustomerController@getAddress')->name('enterprise.customer.address.get');
        Route::post('endereco/{customer}', 'CustomerController@postAddress')->name('enterprise.customer.address.post');
        Route::get('endereco/editar/{id}', 'CustomerController@getAddressEdit')->name('enterprise.customer.address.edit.get');
        Route::post('endereco/editar/{id}', 'CustomerController@postAddressEdit')->name('enterprise.customer.address.edit.post');
        Route::get('endereco/novo/{customer}', 'CustomerController@getAddressNew')->name('enterprise.customer.address.new.get');
        Route::post('endereco/novo/{customer}', 'CustomerController@postAddressNew')->name('enterprise.customer.address.new.post');

    });

