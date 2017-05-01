<?php
namespace App\Models;

use App\Models\{Model, User, Topic, Section};

class Post extends Model
{
    protected $table = 'posts';
    protected $id, $text, $topic_id, $user_id, $created_at;

    public function getUserInfo()
    {
        $user = User::get($this->getUser_id());
        return $user[0];
    }

    public function postTopicInfo()
    {
        $topic = Topic::get($this->getTopic_id());
        return $topic[0];
    }

    public function postSectionInfo()
    {
        $topic = Topic::get($this->getTopic_id());
        $section = Section::get($topic[0]->getSection_id());
        return $section[0];
    }

    public function postUserInfo()
    {
        $user = User::get($this->getUser_id());
        return $user[0];
    }
}

