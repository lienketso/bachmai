<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('base.admin_route');
$moduleRoute = 'hospital';
$postHospitalRoute = 'hpost';

Route::group(['prefix'=>$adminRoute],function(Router $router) use($adminRoute,$moduleRoute, $postHospitalRoute){
    $router->group(['prefix'=>$moduleRoute],function(Router $router) use ($adminRoute,$moduleRoute){
        $router->get('index','HospitalController@getIndex')
            ->name('wadmin::hospital.index.get')->middleware('permission:hospital_index');
        $router->get('create','HospitalController@getCreate')
            ->name('wadmin::hospital.create.get')->middleware('permission:hospital_create');
        $router->post('create','HospitalController@postCreate')
            ->name('wadmin::hospital.create.post')->middleware('permission:hospital_create');
        $router->get('edit/{id}','HospitalController@getEdit')
            ->name('wadmin::hospital.edit.get')->middleware('permission:hospital_edit');
        $router->post('edit/{id}','HospitalController@postEdit')
            ->name('wadmin::hospital.edit.post')->middleware('permission:hospital_edit');
        $router->get('remove/{id}','HospitalController@remove')
            ->name('wadmin::hospital.remove.get')->middleware('permission:hospital_delete');
        $router->get('change/{id}','HospitalController@changeStatus')
            ->name('wadmin::hospital.change.get');
    });

    $router->group(['prefix'=>$postHospitalRoute],function(Router $router) use ($adminRoute,$postHospitalRoute){
        $router->get('index','HpostController@getIndex')
            ->name('wadmin::hpost.index.get')->middleware('permission:hpost_index');
        $router->get('create','HpostController@getCreate')
            ->name('wadmin::hpost.create.get')->middleware('permission:hpost_create');
        $router->post('create','HpostController@postCreate')
            ->name('wadmin::hpost.create.post')->middleware('permission:hpost_create');
        $router->get('edit/{id}','HpostController@getEdit')
            ->name('wadmin::hpost.edit.get')->middleware('permission:hpost_edit');
        $router->post('edit/{id}','HpostController@postEdit')
            ->name('wadmin::hpost.edit.post')->middleware('permission:hpost_edit');
        $router->get('remove/{id}','HpostController@remove')
            ->name('wadmin::hpost.remove.get')->middleware('permission:hpost_delete');
        $router->get('change/{id}','HpostController@changeStatus')
            ->name('wadmin::hpost.change.get');
    });

});
