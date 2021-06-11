<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('base.admin_route');
$moduleRoute = 'document';
$catRoute = 'catdoc';

Route::group(['prefix'=>$adminRoute],function(Router $router) use($adminRoute,$moduleRoute, $catRoute){
    $router->group(['prefix'=>$moduleRoute],function(Router $router) use ($adminRoute,$moduleRoute,$catRoute){
        $router->get('index','DocumentController@getIndex')
            ->name('wadmin::document.index.get')->middleware('permission:document_index');
        $router->get('create','DocumentController@getCreate')
            ->name('wadmin::document.create.get')->middleware('permission:document_create');
        $router->post('create','DocumentController@postCreate')
            ->name('wadmin::document.create.post')->middleware('permission:document_create');
        $router->get('edit/{id}','DocumentController@getEdit')
            ->name('wadmin::document.edit.get')->middleware('permission:document_edit');
        $router->post('edit/{id}','DocumentController@postEdit')
            ->name('wadmin::document.edit.post')->middleware('permission:document_edit');
        $router->get('remove/{id}','DocumentController@remove')
            ->name('wadmin::document.remove.get')->middleware('permission:document_delete');
        $router->get('change/{id}','DocumentController@changeStatus')
            ->name('wadmin::document.change.get');
    });
    $router->group(['prefix'=>$catRoute],function(Router $router) use ($adminRoute,$catRoute){
        $router->get('index','CatdocController@getIndex')
            ->name('wadmin::catdoc.index.get')->middleware('permission:catdoc_index');
        $router->get('create','CatdocController@getCreate')
            ->name('wadmin::catdoc.create.get')->middleware('permission:catdoc_create');
        $router->post('create','CatdocController@postCreate')
            ->name('wadmin::catdoc.create.post')->middleware('permission:catdoc_create');
        $router->get('edit/{id}','CatdocController@getEdit')
            ->name('wadmin::catdoc.edit.get')->middleware('permission:catdoc_edit');
        $router->post('edit/{id}','CatdocController@postEdit')
            ->name('wadmin::catdoc.edit.post')->middleware('permission:catdoc_edit');
        $router->get('remove/{id}','CatdocController@remove')
            ->name('wadmin::catdoc.remove.get')->middleware('permission:catdoc_delete');
        $router->get('change/{id}','CatdocController@changeStatus')
            ->name('wadmin::catdoc.change.get');
    });

});
