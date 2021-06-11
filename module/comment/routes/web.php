<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('base.admin_route');
$moduleRoute = 'comment';

Route::group(['prefix'=>$adminRoute],function(Router $router) use($adminRoute,$moduleRoute){
    $router->group(['prefix'=>$moduleRoute],function(Router $router) use ($adminRoute,$moduleRoute){
        $router->get('index','CommentController@getIndex')
            ->name('wadmin::comment.index.get')->middleware('permission:comment_index');
        $router->get('create','CommentController@getCreate')
            ->name('wadmin::comment.create.get')->middleware('permission:comment_create');
        $router->post('create','CommentController@postCreate')
            ->name('wadmin::comment.create.post')->middleware('permission:comment_create');
        $router->get('edit/{id}','CommentController@getEdit')
            ->name('wadmin::comment.edit.get')->middleware('permission:comment_edit');
        $router->post('edit/{id}','CommentController@postEdit')
            ->name('wadmin::comment.edit.post')->middleware('permission:comment_edit');
        $router->get('remove/{id}','CommentController@remove')
            ->name('wadmin::comment.remove.get')->middleware('permission:comment_delete');
        $router->get('change/{id}','CommentController@changeStatus')
            ->name('wadmin::comment.change.get');
    });
});
