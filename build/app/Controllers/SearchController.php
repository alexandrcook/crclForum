<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\{Section, Topic, Post};
use App\Framework\View;
use App\Framework\Routing;
use App\Database\DB;
class SearchController extends Controller
{
    public function searchText(){
        $searchPhrase = $_GET['search'];
        $query=DB::select("SELECT t.title, t.id, s.slug FROM `posts` p
            LEFT JOIN `topics` t ON p.topic_id = t.id
   LEFT JOIN `sections` s ON t.section_id = s.id
            WHERE p.`text` LIKE "%$searchPhrase%"
            GROUP BY t.id");
        var_dump($query);
        exit();
    }
}
