<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('base.admin_route');
$moduleRoute = 'donate';

Route::group(['prefix'=>$adminRoute],function(Router $router) use($adminRoute,$moduleRoute){
    $router->group(['prefix'=>$moduleRoute],function(Router $router) use ($adminRoute,$moduleRoute){
        $router->get('index','DonateController@getIndex')
            ->name('wadmin::donate.index.get')->middleware('permission:donate_index');
        $router->get('remove/{id}','DonateController@remove')
            ->name('wadmin::donate.remove.get')->middleware('permission:donate_delete');
        $router->get('change/{id}','DonateController@changeStatus')
            ->name('wadmin::donate.change.get');
    });
});
