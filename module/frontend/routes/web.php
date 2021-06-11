<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$FrontRoute = 'frontend';
$moduleRoute = 'home';

Route::get('/', 'HomeController@getIndex')->name('frontend::home');
Route::get('lang/{lang}', 'HomeController@changeLang')->name('frontend::lang');

Route::group(['prefix'=>'member'],function(Router $router){
        $router->get('register','MemberController@register')
            ->name('frontend::member.register.get');
});

Route::group(['prefix'=>'company'],function(Router $router){
    $router->get('/','CompanyController@index')
        ->name('frontend::company.index.get');
    $router->get('{slug}','CompanyController@detail')
        ->name('frontend::company.detail.get');
});

Route::group(['prefix'=>'category'],function(Router $router){
    $router->get('/','CategoryController@index')
        ->name('frontend::category.index.get');
    $router->get('{slug}','ProductController@index')
        ->name('frontend::product.index.get');
});

Route::group(['prefix'=>'product'],function(Router $router){
   $router->get('{slug}','ProductController@detail')
       ->name('frontend::product.detail.get');
});


Route::group(['prefix'=>'blog'],function(Router $router){
    $router->get('{slug}','BlogController@index')
        ->name('frontend::blog.index.get');
});

Route::group(['prefix'=>'post'],function(Router $router){
    $router->get('{slug}','BlogController@detail')
        ->name('frontend::post.detail.get');
});

Route::group(['prefix'=>'page'],function(Router $router){
    $router->get('{slug}','PageController@index')
        ->name('frontend::page.detail.get');
});


Route::group(['prefix'=>'search'],function(Router $router){
    $router->get('/','ProductController@search')
        ->name('frontend::product.search.get');
});
//lien hệ
Route::group(['prefix'=>'contact'],function(Router $router){
    $router->get('/','HomeController@contact')
        ->name('frontend::home.contact.get');
    $router->post('/','HomeController@postContact')
        ->name('frontend::home.contact.post');
});

//find a doctor
Route::group(['prefix'=>'doctor'],function(Router $router){
    $router->get('/','DoctorController@search')
        ->name('frontend::doctor.search.get');
    $router->get('search-result','DoctorController@result')
        ->name('frontend::doctor.result.get');
    $router->get('{slug}', 'DoctorController@detail')
        ->name('frontend::doctor.detail.get');
});

//document - quản lý tài liệu
Route::group(['prefix'=>'document'],function(Router $router){
    $router->get('/','DocumentController@index')
        ->name('frontend::document.index.get');
    $router->get('{slug}','DocumentController@list')
        ->name('frontend::document.list.get');
});

//ủng hộ module
Route::group(['prefix'=>'donate'],function(Router $router){
    $router->get('/','DonateController@index')
        ->name('frontend::donate.index.get');
    $router->post('/','DonateController@create')
        ->name('frontend::donate.index.post');
    $router->get('donate-success','DonateController@success')
        ->name('frontend::donate.success.get');
});

//Sức khỏe, tình trạng bệnh lý
Route::group(['prefix'=>'diseases'],function(Router $router){
    $router->get('/','DiseasesController@index')
        ->name('frontend::diseases.index.get');
    $router->get('topic','DiseasesController@topic')
        ->name('frontend::diseases.topic.get');
    $router->get('{slug}','DiseasesController@detail')
        ->name('frontend::diseases.detail.get');
});
//video
Route::group(['prefix'=>'video'],function(Router $router){
    $router->get('/','VideoController@index')
        ->name('frontend::video.index.get');
    $router->get('{slug}','VideoController@detail')
        ->name('frontend::video.detail.get');
});
