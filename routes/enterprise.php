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

    Route::prefix('cardapio')->namespace('Menu')->group(function (){

        Route::get('novo', 'MenuController@getCreate')->name('enterprise.menu.create.get');
        Route::post('novo', 'MenuController@postCreate')->name('enterprise.menu.create.post');
        Route::get('lista', 'MenuController@getList')->name('enterprise.menu.list.get');
        Route::get('editar/{menu}', 'MenuController@getUpdate')->name('enterprise.menu.update.get');
        Route::post('editar/{menu}', 'MenuController@postUpdate')->name('enterprise.menu.update.post');

        Route::prefix('acompanhamento')->group(function (){

           Route::get('lista/{id}', 'MenuAccompanyingController@getList')->name('enterprise.menu.accompanying.list.get');
           Route::post('novo/{id}', 'MenuAccompanyingController@postCreate')->name('enterprise.menu.accompanying.list.create');
           Route::post('delete/{id}', 'MenuAccompanyingController@postDelete')->name('enterprise.menu.accompanying.list.delete');

        });

        Route::prefix('proteina')->group(function (){

           Route::get('lista/{id}', 'MenuProteinController@getList')->name('enterprise.menu.protein.list.get');
           Route::post('novo/{id}', 'MenuProteinController@postCreate')->name('enterprise.menu.protein.list.create');
           Route::post('delete/{id}', 'MenuProteinController@postDelete')->name('enterprise.menu.protein.list.delete');

        });

    });

    Route::prefix('insumo')->group(function (){

        Route::get('novo', 'FeedstockController@getCreate')->name('enterprise.feedstock.create.get');
        Route::post('novo', 'FeedstockController@postCreate')->name('enterprise.feedstock.create.post');
        Route::get('lista', 'FeedstockController@getList')->name('enterprise.feedstock.list.get');
        Route::get('editar/{feedstock}', 'FeedstockController@getUpdate')->name('enterprise.feedstock.update.get');
        Route::post('editar/{feedstock}', 'FeedstockController@postUpdate')->name('enterprise.feedstock.update.post');

    });

    Route::prefix('fornecedor')->group(function (){

        Route::get('novo', 'SupplierController@getCreate')->name('enterprise.supplier.create.get');
        Route::post('novo', 'SupplierController@postCreate')->name('enterprise.supplier.create.post');
        Route::get('lista', 'SupplierController@getList')->name('enterprise.supplier.list.get');
        Route::get('editar/{supplier}', 'SupplierController@getUpdate')->name('enterprise.supplier.update.get');
        Route::post('editar/{supplier}', 'SupplierController@postUpdate')->name('enterprise.supplier.update.post');

    });

    Route::prefix('marca')->group(function (){

        Route::get('novo', 'BrandController@getCreate')->name('enterprise.brand.create.get');
        Route::post('novo', 'BrandController@postCreate')->name('enterprise.brand.create.post');
        Route::get('lista', 'BrandController@getList')->name('enterprise.brand.list.get');
        Route::get('editar/{brand}', 'BrandController@getUpdate')->name('enterprise.brand.update.get');
        Route::post('editar/{brand}', 'BrandController@postUpdate')->name('enterprise.brand.update.post');

    });


    Route::prefix('cliente')->group(function (){

        Route::get('novo', 'CustomerController@getCreate')->name('enterprise.customer.create.get');
        Route::post('novo', 'CustomerController@postCreate')->name('enterprise.customer.create.post');
        Route::get('lista', 'CustomerController@getList')->name('enterprise.customer.list.get');
        Route::get('editar/{customer}', 'CustomerController@getUpdate')->name('enterprise.customer.update.get');
        Route::post('editar/{customer}', 'CustomerController@postUpdate')->name('enterprise.customer.update.post');
        Route::get('endereco/lista/{customer}', 'CustomerController@getAddress')->name('enterprise.customer.address.get');
//        Route::post('endereco/{customer}', 'CustomerController@postAddress')->name('enterprise.customer.address.post');
        Route::get('endereco/editar/{id}', 'CustomerController@getAddressEdit')->name('enterprise.customer.address.edit.get');
        Route::post('endereco/editar/{id}', 'CustomerController@postAddressEdit')->name('enterprise.customer.address.edit.post');
        Route::get('endereco/novo/{customer}', 'CustomerController@getAddressNew')->name('enterprise.customer.address.new.get');
        Route::post('endereco/novo/{customer}', 'CustomerController@postAddressNew')->name('enterprise.customer.address.new.post');

    });

    Route::prefix('acompanhamento')->group(function (){

        Route::get('lista', 'AccompanyingController@getList')->name('enterprise.accompanying.list.get');
        Route::get('novo', 'AccompanyingController@getCreate')->name('enterprise.accompanying.create.get');
        Route::post('valida/insumo', 'AccompanyingController@validateFeedstock');
        Route::post('novo', 'AccompanyingController@postCreate');
        Route::post('deletar/insumo/{id}', 'AccompanyingController@postDeleteFeedstock')->name('enterprise.accompanying.feedstock.delete.post');
        Route::post('adicionar/insumo/{id}', 'AccompanyingController@postAddFeedstock')->name('enterprise.accompanying.feedstock.adicionar.post');
        Route::get('insumo/lista/{id}', 'AccompanyingController@getUpdateFeedstock')->name('enterprise.accompanying.feedstock.update.get');
        Route::get('editar/{id}', 'AccompanyingController@getUpdateAccompanying')->name('enterprise.accompanying.update.get');
        Route::post('editar/{id}', 'AccompanyingController@postUpdateAccompanying')->name('enterprise.accompanying.update.post');
    });

    Route::prefix('proteina')->group(function (){

        Route::get('lista', 'ProteinController@getList')->name('enterprise.protein.list.get');
        Route::get('novo', 'ProteinController@getCreate')->name('enterprise.protein.create.get');
        Route::post('valida/insumo', 'ProteinController@validateFeedstock');
        Route::post('novo', 'ProteinController@postCreate');
        Route::post('deletar/insumo/{id}', 'ProteinController@postDeleteFeedstock')->name('enterprise.protein.feedstock.delete.post');
        Route::post('adicionar/insumo/{id}', 'ProteinController@postAddFeedstock')->name('enterprise.protein.feedstock.adicionar.post');
        Route::get('insumo/lista/{id}', 'ProteinController@getUpdateFeedstock')->name('enterprise.protein.feedstock.update.get');
        Route::get('editar/{id}', 'ProteinController@getUpdateProtein')->name('enterprise.protein.update.get');
        Route::post('editar/{id}', 'ProteinController@postUpdateProtein')->name('enterprise.protein.update.post');
    });

    Route::prefix('pedido')->namespace('Order')->group(function (){

        Route::get('novo', 'OrderController@getCreate')->name('enterprise.order.create.get');
        Route::post('novo', 'OrderController@postCreate')->name('enterprise.order.create.post');
        Route::get('lista', 'OrderController@getList')->name('enterprise.order.list.get');
    });


    Route::prefix('ajax')->group(function (){

        Route::get('insumos', 'AjaxController@getFeedstockListAjax');
        Route::get('clientes', 'AjaxController@getCustomerListAjax');
        Route::get('cardapios', 'AjaxController@getMenuListAjax');
        Route::get('acompanhamentos', 'AjaxController@getAccompanyingListAjax');
        Route::get('proteinas', 'AjaxController@getProteinListAjax');

    });

    Route::prefix('relatorios')->namespace('Reports')->group(function (){

     Route::get('compras/a-fazer', 'Sale\SaleController@getSaleTodo')->name('enterprise.reports.sale.todo.get');
     Route::get('compras/busca/a-fazer', 'Sale\SaleController@getFindSaleTodo')->name('enterprise.reports.sale.find.todo.get');
     Route::get('compras/download/pdf/{date_delivery}', 'Sale\SaleController@getSaleTodoPdf')->name('enterprise.reports.sale.todo.pdf.get');

    });


