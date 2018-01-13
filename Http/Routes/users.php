<?php

Route::group(['middleware' => ['api']], function ($router) {

    $router->get('users', 'UserController@index');

    $router->get('users/{user}', 'UserController@show');

    $router->post('users', 'UserController@store');

    $router->put('users/{user}', 'UserController@update');

    $router->delete('users/{user}', 'UserController@destroy');
});
