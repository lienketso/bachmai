<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('base.admin_route');
$moduleRoute = 'diseases';
$postDiseasesRoute = 'health';

Route::group(['prefix'=>$adminRoute],function(Router $router) use($adminRoute,$moduleRoute, $postDiseasesRoute){
    $router->group(['prefix'=>$moduleRoute],function(Router $router) use ($adminRoute,$moduleRoute){
        $router->get('index','DiseasesController@getIndex')
            ->name('wadmin::diseases.index.get')->middleware('permission:diseases_index');
        $router->get('create','DiseasesController@getCreate')
            ->name('wadmin::diseases.create.get')->middleware('permission:diseases_create');
        $router->post('create','DiseasesController@postCreate')
            ->name('wadmin::diseases.create.post')->middleware('permission:diseases_create');
        $router->get('edit/{id}','DiseasesController@getEdit')
            ->name('wadmin::diseases.edit.get')->middleware('permission:diseases_edit');
        $router->post('edit/{id}','DiseasesController@postEdit')
            ->name('wadmin::diseases.edit.post')->middleware('permission:diseases_edit');
        $router->get('remove/{id}','DiseasesController@remove')
            ->name('wadmin::diseases.remove.get')->middleware('permission:diseases_delete');
        $router->get('change/{id}','DiseasesController@changeStatus')
            ->name('wadmin::diseases.change.get');
    });

    $router->group(['prefix'=>$postDiseasesRoute],function(Router $router) use ($adminRoute,$postDiseasesRoute){
        $router->get('index','HealthController@getIndex')
            ->name('wadmin::health.index.get')->middleware('permission:health_index');
        $router->get('create','HealthController@getCreate')
            ->name('wadmin::health.create.get')->middleware('permission:health_create');
        $router->post('create','HealthController@postCreate')
            ->name('wadmin::health.create.post')->middleware('permission:health_create');
        $router->get('edit/{id}','HealthController@getEdit')
            ->name('wadmin::health.edit.get')->middleware('permission:health_edit');
        $router->post('edit/{id}','HealthController@postEdit')
            ->name('wadmin::health.edit.post')->middleware('permission:health_edit');
        $router->get('remove/{id}','HealthController@remove')
            ->name('wadmin::health.remove.get')->middleware('permission:health_delete');
        $router->get('change/{id}','HealthController@changeStatus')
            ->name('wadmin::health.change.get');
    });

});
