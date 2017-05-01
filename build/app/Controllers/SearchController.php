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
        $searchPhrase = $_POST['search'];
        $search = DB::select("SELECT p.id as post_id, t.title, t.id, s.slug, s.id as slug_id, u.name FROM `posts` p
			LEFT JOIN 	topics t ON p.topic_id=t.id
			LEFT JOIN sections s ON t.section_id=s.id
			LEFT JOIN users u ON p.user_id=u.id
			WHERE p.`text` LIKE '%$searchPhrase%'
			GROUP BY t.id");
        $posts = [];

        foreach ($search as $key => $searchItem){
            $posts[$key] = Post::get($search[$key]['post_id'])[0];
            $searchLight = $posts[$key]->getText();
            $search1 = implode('|', [$searchPhrase]); // $array_words - слова которые подсвечиваем, символ '*' обозначает любое количество букв/цифр
            $text = preg_replace('%(?<=[^\p{L}\p{N}])('.str_replace('*', '[\p{L}\p{N}]*', $search1).')(?=[^\p{L}\p{N}])(?=[^>]*<)%ui', '<span style="background-color: yellow">$1</span>', '>'.$searchLight.'<'); // класс shlight нужно задать в стиле
            $text = substr($text, 1, -1);
            $searchLight = $posts[$key]->setText($text);
        }

        //$search = implode('|', $array_words); // $array_words - слова которые подсвечиваем, символ '*' обозначает любое количество букв/цифр
        //$text = preg_replace('%(?<=[^\p{L}\p{N}])('.str_replace('*', '[\p{L}\p{N}]*', $search).')(?=[^\p{L}\p{N}])(?=[^>]*<)%ui', '<span class="shlight">$1</span>', '>'.$text.'<'); // класс shlight нужно задать в стиле
        //$text = substr($text, 1, -1);

        var_dump($posts);

        View::show('search', ['searchPhrase' => $searchPhrase, 'posts' => $posts]);
    }
}