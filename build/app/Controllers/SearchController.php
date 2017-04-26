<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\{Section, Topic, Post, User};
use App\Framework\View;
use App\Framework\Routing;
use App\Database\DB;

class SearchController extends Controller
{
    public function searchText(){
        $searchPhrase = $_GET['search'];
        $query = DB::select("SELECT t.title, t.id, s.slug, s.id, u.name FROM `posts` p
			LEFT JOIN 	topics t ON p.topic_id=t.id
			LEFT JOIN sections s ON t.section_id=s.id
			LEFT JOIN users u ON p.user_id=u.id
			WHERE p.`text` LIKE '%$searchPhrase%'
			GROUP BY t.id");

        View::show('search', ['query' => $query]);
    }
}