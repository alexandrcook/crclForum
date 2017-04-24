<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Section;

use App\Framework\View;


class MainController extends Controller
{

    public function index() {

        $sections = Section::all();

        View::show("default", ['sections' => $sections], 'main');
    }

    public function notFound404()
    {
        View::show('404');
    }

}