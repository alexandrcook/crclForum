<?php

$_config = [
    'db' => [
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'database' => 'forum'
    ],
    'smtp' => [
        'host' => 'smtp.gmail.com',
        'port' => 587,
        'user' => 'alexandr.cook.ua@gmail.com',
        'password' => '*************'
    ],
    'admin' => [
        'email' => 'alexandr.cook.ua@gmail.com'
    ],
    'vkApp' => [
        'client_id' => '**********', // ID приложения
        'client_secret' => '*************', // Защищённый ключ
        'redirect_uri' => 'http://localhost:8000/login/vkAuth', // Адрес сайта
        'url' => 'http://oauth.vk.com/authorize'
    ],
    'lotLimit'=>"3"
];