<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;
use App\Models\{Section, Topic, Post};
use App\Framework\View;
use App\Framework\Routing;
use App\Database\DB;

class ForumController extends Controller
{
    public function showSection() {
        $routeData = Routing::getRouteArgs();
        $sectionSlug = $routeData[2];
        $section=Section::getBySlug($sectionSlug);
        $postForm = isset($_POST['form']['theme']) ? $_POST['form']['theme'] : null;
        if ($postForm){
            $topic= new Topic;
            $topic->setTitle($postForm);
            $topic->setSection_id($section[0]->getId());
            $topic->save();
        }
        $topic = Topic::getBySection_id($section[0] ->getId());
        View::show('sections', ['topics' => $topic, 'section' => $section]);
    }

    public function showTopic(){
        $routeData = Routing::getRouteArgs();
        $sectionSlug = $routeData[2];
        $topicId=$routeData[3];
        $section=Section::getBySlug($sectionSlug);
        $topic = Topic::get($topicId)[0];
        $postForm = isset($_POST['form']['post']) ? $_POST['form']['post'] : null;
        if ($postForm){
            $post= new Post;
            $post->setText($postForm);
            $post->setTopic_id($topicId);
            $post->setUser_id($_SESSION['user_id']);
            $post->setCreated_at(date('Y-m-d'));
            $post->save();
        }
        $posts= Post::getByTopic_id($topicId);
        View::show('topics', ['topic' => $topic, 'section' => $section, 'post'=>$posts]);
    }

    public function createTopic() {
        $routeData = Routing::getRouteArgs();
        $sectionSlug = $routeData[3];
        $section = Section::getBySlug($sectionSlug);

        $topic= new Topic;
        $topic->setTitle($_POST['name']);
        $topic->setSection_id($section[0]->getId());
        $topic->save();

        $post= new Post;
        $post->setText($_POST['post']);

        $lastId = DB::getLastId();

        $post->setTopic_id($lastId);
        $post->setUser_id($_SESSION['user_id']);
        $post->setCreated_at(date('Y-m-d'));
        $post->save();

        $topic = Topic::get($lastId)[0];
        $posts= Post::getByTopic_id($lastId);
        View::show('topics', ['topic' => $topic, 'section' => $section, 'post'=>$posts]);
    }
}