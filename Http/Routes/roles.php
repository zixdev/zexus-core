<?php

Route::group(['middleware' => ['api']], function ($router) {

    $router->get('roles', 'RoleController@index');

    $router->get('roles/{role}', 'RoleController@show');

    $router->post('roles', 'RoleController@store');

    $router->put('roles/{role}', 'RoleController@update');
    $router->post('roles/{role}/permissions', 'RoleController@updatePermissions');

    $router->delete('roles/{role}', 'RoleController@destroy');


    $router->get('permissions', 'PermissionController@index');
});
