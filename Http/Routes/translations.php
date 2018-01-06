<?php

Route::group(['middleware' => ['api']], function ($router) {

    $router->get('translations', 'TranslationController@index');

    $router->get('translations/{translation}', 'TranslationController@show');

    $router->post('translations', 'TranslationController@store');

    $router->put('translations/{translation}', 'TranslationController@update');

    $router->delete('translations/{translation}', 'TranslationController@destroy');
});
