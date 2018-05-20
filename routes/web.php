<?php

$router->group(['prefix' => 'api/v1'], function ($router) {
    // get all posts
    $router->get('posts', 'PostController@index');
    // get one post
    $router->get('posts/{id}', 'PostController@getPost');
    // create post
    $router->post('posts', 'PostController@create');
    // edit post
    $router->put('posts/{id}', 'PostController@editPost');
    // delete one post
    $router->delete('posts/{id}', 'PostController@remove');
    // delete all posts
    $router->delete('posts/admin/deleteAll', 'PostController@removeAll');
});