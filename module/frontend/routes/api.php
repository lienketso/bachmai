<?php

use Illuminate\Support\Facades\Route;

Route::get('create-newsletter','HomeController@createNewletter')->name('ajax.newsletter.get');
Route::get('create-partner','HomeController@createPartner')->name('ajax.create.partner.get');
Route::get('create-comment','HomeController@createComment')->name('ajax.create.comment.get');
