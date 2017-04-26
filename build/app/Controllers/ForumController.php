<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;
use App\Models\{Section, Topic};

use App\Framework\View;
use App\Framework\Routing;

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
            $topic->setSection_id($section[0]->getSec_id());
            $topic->save();
        }
        $topic = Topic::getBySection_id($section[0] ->getSec_id());
        View::show('sections', ['topic' => $topic, 'section' => $section]);
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
            $date=date('Y-m-d');
            $post->setCrated_at($date);
            $post->save();
        }
        $posts= Post::getByTopic_id($topicId);
        View::show('topics', ['topic' => $topic, 'section' => $section, 'post'=>$posts]);
    }

    public function createSection()
    {

    }

    public function createTopic()
    {

    }
}