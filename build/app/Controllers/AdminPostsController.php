<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\{Section, Topic, Post, User};
use App\Database\DB;
use App\Framework\Auth\Auth;
use App\Framework\Auth\AuthInterface;
use App\Framework\View;

class AdminPostsController extends Controller
{
    public function showPosts(){
        $posts = post::all();
        $sections = Section::all();
        View::show("admin", ['posts'=>$posts], 'posts');
    }

    public function createPost(){
        if(!empty($_POST)){
            $post = new post();
            $post->setText($_POST['text']);
            $post->setTopic_id($_POST['topic_id']);
            $post->setUser_id($_POST['user_id']);
            $post->setCreated_at(date("Y-m-d H:i:s"));
            $post->save();
            $_SESSION['flash_msg'] = "post with name *<b>".$_POST['title']."</b>* succesfully CREATED";
        }else{
            $_SESSION['flash_msg'] = "topic WASN*T created!!! DANGER!!! ERROR!!! ACHTUNG!!!";
        }
        header('location: /admin/posts');
    }

    public function editPost(){
        $id = explode('/', $_SERVER['REQUEST_URI'])[4];
        $post=post::getById($id);
        if(!empty($_POST)){
            $post[0]->setText($_POST['text']);
            $post[0]->setTopic_id($_POST['topic_id']);
            $post[0]->setUser_id($_POST['user_id']);
            $post[0]->save();
            $_SESSION['flash_msg'] = "post with name *<b>".$_POST['title']."</b>* succesfully EDITED";
            header('location: /admin/posts');
        }else{
            View::show("admin",['post' => $post[0]], 'postEdit');
        }
    }

    public function deletePost(){
        $id = explode('/', $_SERVER['REQUEST_URI'])[4];
        DB::delete("DELETE  FROM `posts` 
        WHERE `id`=".$id);
        $_SESSION['flash_msg'] = "post with id *<b>".$id."</b>* succesfully DELETED !!!";
        header('location: /admin/posts');
    }
}