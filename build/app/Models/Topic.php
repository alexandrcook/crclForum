<?php

namespace App\Models;

use App\Models\Model;
use App\Models\{
    Section, Post, User
};
use App\Database\DB;

class Topic extends Model
{
    protected $table = 'topics';
    protected $id, $title, $section_id;

    public function section()
    {
        $section = Section::get($this->getSection_id());
        return $section[0];
    }

    public function postsInTopic($topic_id)
    {
        $posts = Post::getByTopic_id($topic_id);
        return count($posts);
    }

    public function firstMessageCreator($topic_id)
    {
        $posts = (DB::select("SELECT * FROM `posts` WHERE `topic_id`=? ORDER BY `created_at`", [$topic_id]));

        $user = User::get($posts[0]['user_id']);
        $return = [
            'created_at' => $posts[0]['created_at'],
            'user_name' => $user[0]->getName()
        ];
        return $return;
    }

    public function latestMessageCreator($topic_id)
    {
        $posts = (DB::select("SELECT * FROM `posts` WHERE `topic_id`=? ORDER BY `created_at`", [$topic_id]));

        $user = User::get($posts[count($posts)-1]['user_id']);
        $return = [
            'created_at' => $posts[count($posts)-1]['created_at'],
            'user_name' => $user[0]->getName()
        ];
        return $return;
    }
}