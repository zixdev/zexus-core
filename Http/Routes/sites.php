<?php

Route::group(['middleware' => ['api']], function ($router) {
    $router->get('sites', [
        'uses' => 'SiteController@index',
        'before' => 'can:view_sites'
    ]);

    $router->get('sites/{site}', [
        'uses' => 'SiteController@show',
        'before' => 'can:view_sites'
    ]);

    $router->post('sites', [
        'uses' => 'SiteController@store',
        'before' => 'can:create_sites'
    ]);

    $router->put('sites/{site}', [
        'uses' => 'SiteController@update',
        'before' => 'can:update_sites'
    ]);

    $router->delete('sites/{site}', [
        'uses' => 'SiteController@destroy',
        'before' => 'can:delete_sites'
    ]);

    $router->get('sites/{site}/themes', [
        'uses' => 'SiteUiController@index',
        'before' => 'can:view_site_themes'
    ]);

    $router->post('sites/{site}/themes', [
        'uses' => 'SiteUiController@store',
        'before' => 'can:create_site_themes'
    ]);

    $router->get('sites/{site}/config', [
        'uses' => 'SiteConfigController@index',
        'before' => 'can:view_site_configs'
    ]);

    $router->post('sites/{site}/config', [
        'uses' => 'SiteConfigController@store',
        'before' => 'can:create_site_configs'
    ]);

});