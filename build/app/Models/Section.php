<?php
namespace App\Models;

use App\Models\Model;


class Section extends Model
{
    protected $table = 'sections';
    protected $id, $title, $slug;

    public function topicsInSection($id)
    {
        $topics = Topic::getBySection_id($id);
        return $topics;
    }
}