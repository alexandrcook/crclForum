<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\{
    Section, Topic, Post, User
};
use App\Database\DB;
use App\Framework\Auth\Auth;
use App\Framework\Auth\AuthInterface;
use App\Framework\View;

class AdminTopicsController extends Controller
{
    public function showTopics()
    {
        $topics = Topic::all();
        View::show("admin", ['topics' => $topics], 'topics');
    }

    public function createTopic()
    {
        if (!empty($_POST)) {
            $topic = new topic();
            $topic->setTitle($_POST['title']);
            $topic->setSection_id($_POST['section_id']);
            $topic->save();
            $_SESSION['flash_msg'] = "topic with name *<b>" . $_POST['title'] . "</b>* succesfully CREATED";
        } else {
            $_SESSION['flash_msg'] = "topic WASN*T created!!! DANGER!!! ERROR!!! ACHTUNG!!!";
        }
        header('location: /admin/topics');
    }

    public function editTopic()
    {
        $id = explode('/', $_SERVER['REQUEST_URI'])[4];
        $topic = Topic::getById($id);
        if (!empty($_POST)) {
            $topic[0]->setTitle($_POST['title']);
            $topic[0]->setSection_id($_POST['section_id']);
            $topic[0]->save();
            $_SESSION['flash_msg'] = "topic with name *<b>" . $_POST['title'] . "</b>* succesfully EDITED";
            header('location: /admin/topics');
        } else {
            View::show("admin", ['topic' => $topic[0]], 'topicEdit');
        }
    }

    public function deleteTopic()
    {
        $id = explode('/', $_SERVER['REQUEST_URI'])[4];
        DB::delete("DELETE  FROM `topics` 
        WHERE `id`=" . $id);
        DB::delete("DELETE  FROM `posts` 
        WHERE `topic_id`=" . $id);
        $_SESSION['flash_msg'] = "Topic with id *<b>" . $id . "</b>* succesfully DELETED with all messages !!!";
        header('location: /admin/topics');
    }
}