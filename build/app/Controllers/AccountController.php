<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\{Section, Topic, Post, User};
use App\Database\DB;
use App\Framework\Auth\Auth;
use App\Framework\Auth\AuthInterface;
use App\Framework\View;

class AccountController extends Controller
{
    public function defaultFunc()
    {
        $posts=Post::getByUser_id($_SESSION['user_id']);
        //$topics=Topic::getByUser_id($_SESSION['user_id']);
        View::show('account', ['posts'=> $posts]);
    }

    public function showUserProfile()
    {
        View::show('account', null,'profile');
    }

    public function showUserTopics(){
        $topics=Topic::getByUser_id($_SESSION['user_id']);
        View::show("topicAccount", ['topic' => $topics]);
    }
    public function showUserPosts(){
        $posts=Post::getByUser_id($_SESSION['user_id']);
        View::show("postAccount", ['post' => $posts]);
    }
}
