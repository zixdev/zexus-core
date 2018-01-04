<?php

Route::group(['middleware' => ['api']], function ($router) {

    $router->get('language-lines', 'LanguageLineController@index');

    $router->get('language-lines/{languageLine}', 'LanguageLineController@show');

    $router->post('language-lines', 'LanguageLineController@store');

    $router->put('language-lines/{languageLine}', 'LanguageLineController@update');

    $router->delete('language-lines/{languageLine}', 'LanguageLineController@destroy');
});
