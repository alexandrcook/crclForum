<?php

$_routes = [
    '/' => ['handler' => ['MainController','index']],
    '/section/([a-z]*)/([0-9]+)' => ['handler' => ['ForumController','showTopic']],
    '/section/([a-z]*)' => ['handler' => ['ForumController','showSection']],
    '/logout' => ['handler' => ['AuthController', 'logout']],
    '/login' => ['handler' => ['AuthController','defaultFunc']],
    '/login/auth' => ['handler' => ['AuthController','login']],
    '/login/reg' => ['handler' => ['AuthController','registration']],
    '/account' => ['handler' => ['AccountController','defaultFunc']]
];