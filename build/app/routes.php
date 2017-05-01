<?php

$_routes = [
    '/' => ['handler' => ['MainController', 'index']],
    '/404' => ['handler' => ['MainController', 'notFound404']],
    '/section/([a-z]*)/([0-9]+)' => ['handler' => ['ForumController', 'showTopic']],
    '/section/([a-z]*)' => ['handler' => ['ForumController', 'showSection']],
    '/topic/create/([a-z]*)' => ['handler' => ['ForumController', 'createTopic']],
    '/logout' => ['handler' => ['AuthController', 'logout']],
    '/login' => ['handler' => ['AuthController', 'defaultFunc']],
    '/login/auth' => ['handler' => ['AuthController', 'login']],
    '/login/vkAuth' => ['handler' => ['AuthController', 'vkAuth']],
    '/login/reg' => ['handler' => ['AuthController', 'registration']],
    '/search' => ['handler' => ['SearchController', 'searchText']],

    //ACCOUNT
    '/account' => [
        'handler' => ['AccountController', 'defaultFunc'],
        'policy' => ['is_user']
    ],
    '/account/profile' => [
        'handler' => ['AccountController', 'showUserProfile'],
        'policy' => ['is_user']
    ],
    '/account/topic' => ['handler' => ['AccountController', 'showTopicAccount']],
    '/account/post' => ['handler' => ['AccountController', 'showPostAccount']],

    //ADMIN
    '/admin' => [
        'handler' => ['AdminController', 'defaultFunc'],
        'policy' => ['is_admin']
    ],

    //ADMIN/USERS
    '/admin/users' => [
        'handler' => ['AdminUsersController', 'showUsers'],
        'policy' => ['is_admin']
    ],
    '/admin/users/create' => [
        'handler' => ['AdminUsersController', 'createUser'],
        'policy' => ['is_admin']
    ],
    '/admin/users/edit/([0-9]+)' => [
        'handler' => ['AdminUsersController', 'editUser'],
        'policy' => ['is_admin']
    ],
    '/admin/users/delete/([0-9]+)' => [
        'handler' => ['AdminUsersController', 'deleteUser'],
        'policy' => ['is_admin']
    ],

    //ADMIN/SECTIONS
    '/admin/sections' => [
        'handler' => ['AdminSectionsController', 'showSections'],
        'policy' => ['is_admin']
    ],
    '/admin/sections/create' => [
        'handler' => ['AdminSectionsController', 'createSection'],
        'policy' => ['is_admin']
    ],
    '/admin/sections/edit/([0-9]+)' => [
        'handler' => ['AdminSectionsController', 'editSection'],
        'policy' => ['is_admin']
    ],
    '/admin/sections/delete/([0-9]+)' => [
        'handler' => ['AdminSectionsController', 'deleteSection'],
        'policy' => ['is_admin']
    ],

    //ADMIN/TOPICS
    '/admin/topics' => [
        'handler' => ['AdminTopicsController', 'showTopics'],
        'policy' => ['is_admin']
    ],
    '/admin/topics/create' => [
        'handler' => ['AdminTopicsController', 'createTopic'],
        'policy' => ['is_admin']
    ],
    '/admin/topics/edit/([0-9]+)' => [
        'handler' => ['AdminTopicsController', 'editTopic'],
        'policy' => ['is_admin']
    ],
    '/admin/topics/delete/([0-9]+)' => [
        'handler' => ['AdminTopicsController', 'deleteTopic'],
        'policy' => ['is_admin']
    ],

    //ADMIN/POSTS
    '/admin/posts' => [
        'handler' => ['AdminPostsController','showPosts'],
        'policy' => ['is_admin']
    ],
    '/admin/posts/create' => [
        'handler' => ['AdminPostsController','createPost'],
        'policy' => ['is_admin']
    ],
    '/admin/posts/edit/([0-9]+)' => [
        'handler' => ['AdminPostsController','editPost'],
        'policy' => ['is_admin']
    ],
    '/admin/posts/delete/([0-9]+)' => [
        'handler' => ['AdminPostsController','deletePost'],
        'policy' => ['is_admin']
    ]

];