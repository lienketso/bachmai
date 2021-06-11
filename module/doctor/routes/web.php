<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('base.admin_route');
$moduleRoute = 'doctor';
$khoaRoute = 'khoa';

Route::group(['prefix'=>$adminRoute],function(Router $router) use($adminRoute,$moduleRoute, $khoaRoute){
    $router->group(['prefix'=>$moduleRoute],function(Router $router) use ($adminRoute,$moduleRoute){
        $router->get('index','DoctorController@getIndex')
            ->name('wadmin::doctor.index.get')->middleware('permission:doctor_index');
        $router->get('create','DoctorController@getCreate')
            ->name('wadmin::doctor.create.get')->middleware('permission:doctor_create');
        $router->post('create','DoctorController@postCreate')
            ->name('wadmin::doctor.create.post')->middleware('permission:doctor_create');
        $router->get('edit/{id}','DoctorController@getEdit')
            ->name('wadmin::doctor.edit.get')->middleware('permission:doctor_edit');
        $router->post('edit/{id}','DoctorController@postEdit')
            ->name('wadmin::doctor.edit.post')->middleware('permission:doctor_edit');
        $router->get('remove/{id}','DoctorController@remove')
            ->name('wadmin::doctor.remove.get')->middleware('permission:doctor_delete');
        $router->get('change/{id}','DoctorController@changeStatus')
            ->name('wadmin::doctor.change.get');
    });

    $router->group(['prefix'=>$khoaRoute],function(Router $router) use ($adminRoute,$khoaRoute){
        $router->get('index','KhoaController@getIndex')
            ->name('wadmin::khoa.index.get')->middleware('permission:khoa_index');
        $router->get('create','KhoaController@getCreate')
            ->name('wadmin::khoa.create.get')->middleware('permission:khoa_create');
        $router->post('create','KhoaController@postCreate')
            ->name('wadmin::khoa.create.post')->middleware('permission:khoa_create');
        $router->get('edit/{id}','KhoaController@getEdit')
            ->name('wadmin::khoa.edit.get')->middleware('permission:khoa_edit');
        $router->post('edit/{id}','KhoaController@postEdit')
            ->name('wadmin::khoa.edit.post')->middleware('permission:khoa_edit');
        $router->get('remove/{id}','KhoaController@remove')
            ->name('wadmin::khoa.remove.get')->middleware('permission:khoa_delete');
        $router->get('change/{id}','KhoaController@changeStatus')
            ->name('wadmin::khoa.change.get');
    });

});
