<?php

$_routes = [
    '/' => ['handler' => ['MainController','index']],
    '/404' => ['handler' => ['MainController','notFound404']],
    '/section/([a-z]*)/([0-9]+)' => ['handler' => ['ForumController','showTopic']],
    '/section/([a-z]*)' => ['handler' => ['ForumController','showSection']],
    '/logout' => ['handler' => ['AuthController', 'logout']],
    '/login' => ['handler' => ['AuthController','defaultFunc']],
    '/login/auth' => ['handler' => ['AuthController','login']],
    '/login/vkAuth' => ['handler' => ['AuthController','vkAuth']],
    '/login/reg' => ['handler' => ['AuthController','registration']],
    '/account' => [
            'handler' => ['AccountController','defaultFunc'],
            'policy' => ['is_user']
    ],
    '/account/profile/([0-9]+)' => [
            'handler' => ['AccountController','showUserProfile'],
            'policy' => ['is_user']
    ],
    '/admin' => [
        'handler' => ['AdminController','index'],
        'policy' => 'is_admin'
    ],


//    /admin/users/ => Admin\UserController@showUsers()
//    /admin/users/edit/[0-9]+ => Admin\UserController@editUser()
//    /admin/users/delete/[0-9]+ => Admin\UserController@deleteUser()

];