<?php
namespace App\Models;

use App\Models\Model;
use App\Models\Section;

class Topic extends Model
{
    protected $table = 'topics';
    protected $id, $title, $section_id;

    public function section()
    {
        $section = Section::get($this->getSection_id());
        return $section[0];
    }
}