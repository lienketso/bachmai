<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('base.admin_route');
$moduleRoute = 'video';
$adverRoute = 'adver';

Route::group(['prefix'=>$adminRoute],function(Router $router) use($adminRoute,$moduleRoute, $adverRoute){
    $router->group(['prefix'=>$moduleRoute],function(Router $router) use ($adminRoute,$moduleRoute){
        $router->get('index','VideoController@getIndex')
            ->name('wadmin::video.index.get')->middleware('permission:video_index');
        $router->get('create','VideoController@getCreate')
            ->name('wadmin::video.create.get')->middleware('permission:video_create');
        $router->post('create','VideoController@postCreate')
            ->name('wadmin::video.create.post')->middleware('permission:video_create');
        $router->get('edit/{id}','VideoController@getEdit')
            ->name('wadmin::video.edit.get')->middleware('permission:video_edit');
        $router->post('edit/{id}','VideoController@postEdit')
            ->name('wadmin::video.edit.post')->middleware('permission:video_edit');
        $router->get('remove/{id}','VideoController@remove')
            ->name('wadmin::video.remove.get')->middleware('permission:video_delete');
        $router->get('change/{id}','VideoController@changeStatus')
            ->name('wadmin::video.change.get');
    });

    $router->group(['prefix'=>$adverRoute],function(Router $router) use ($adminRoute,$adverRoute){
        $router->get('index','AdverController@getIndex')
            ->name('wadmin::adver.index.get')->middleware('permission:adver_index');
        $router->get('create','AdverController@getCreate')
            ->name('wadmin::adver.create.get')->middleware('permission:adver_create');
        $router->post('create','AdverController@postCreate')
            ->name('wadmin::adver.create.post')->middleware('permission:adver_create');
        $router->get('edit/{id}','AdverController@getEdit')
            ->name('wadmin::adver.edit.get')->middleware('permission:adver_edit');
        $router->post('edit/{id}','AdverController@postEdit')
            ->name('wadmin::adver.edit.post')->middleware('permission:adver_edit');
        $router->get('remove/{id}','AdverController@remove')
            ->name('wadmin::adver.remove.get')->middleware('permission:adver_delete');
        $router->get('change/{id}','AdverController@changeStatus')
            ->name('wadmin::adver.change.get');
    });

});
