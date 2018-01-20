<?php

Route::group(['middleware' => ['api']], function ($router) {
    $router->get('sites', 'SiteController@index');

    $router->get('sites/{site}', 'SiteController@show');

    $router->post('sites', 'SiteController@store');

    $router->put('sites/{site}', 'SiteController@update');

    $router->delete('sites/{site}', 'SiteController@destroy');


    $router->get('sites/{site}/config', 'SiteConfigController@show');
    $router->post('sites/{site}/config', 'SiteConfigController@store');

});