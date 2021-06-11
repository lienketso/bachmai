<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$moduleRoute = 'cat';
$productRoute = 'product';

Route::group(['prefix' => $moduleRoute], function(Router $router) use ($moduleRoute) {
    $router->get('update-cat-sort', 'ApiCatproductController@updatesort')->name('ajax.cat.order.get');
    $router->get('update-cat-parent', 'ApiCatproductController@updateparent')->name('ajax.cat.parent.get');
});

Route::group(['prefix' => $productRoute], function(Router $router) use ($productRoute) {
    $router->get('get-company', 'ApiProductController@getCompany')->name('ajax.product.company.get');
});

