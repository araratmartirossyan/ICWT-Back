<?php

$router-> group(['prefix' => 'api/v1'], function($router) {
    $router -> get('posts', 'PostController@index');

    $router -> post('posts', 'PostController@create');

    $router -> delete('posts/{id}', 'PostController@remove');
    $router -> put('posts/{id}', 'PostController@editPost');
    
});