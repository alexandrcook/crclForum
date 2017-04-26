<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\{Section, Topic, Post, User};
use App\Database\DB;
use App\Framework\Auth\Auth;
use App\Framework\Auth\AuthInterface;
use App\Framework\View;

class AdminSectionsController extends Controller
{
    public function showSections(){
        $sections= Section::all();
        View::show("admin", ['sections'=>$sections], 'sections');
    }

    public function createSection(){
        if(!empty($_POST)){
            $section = new Section();
            $section->setTitle($_POST['title']);
            $section->setSlug($_POST['slug']);
            $section->save();
            $_SESSION['flash_msg'] = "Section with name *<b>".$_POST['title']."</b>* succesfully CREATED";
        }else{
            $_SESSION['flash_msg'] = "Section WASN*T created!!! DANGER!!! ERROR!!! ACHTUNG!!!";
        }
        header('location: /admin/sections');
    }

    public function editSection(){
        $id = explode('/', $_SERVER['REQUEST_URI'])[4];
        $section=Section::getById($id);
        if(!empty($_POST)){
            $section[0]->setTitle($_POST['title']);
            $section[0]->setSlug($_POST['slug']);
            $section[0]->save();
            $_SESSION['flash_msg'] = "Section with name *<b>".$_POST['title']."</b>* succesfully EDITED";
            header('location: /admin/sections');
        }else{
            View::show("admin",['section' => $section[0]], 'sectionEdit');
        }
    }

    public function deleteSection(){
        $id = explode('/', $_SERVER['REQUEST_URI'])[4];
        DB::delete("DELETE  FROM `sections` 
        WHERE `id`=".$id);
        $_SESSION['flash_msg'] = "Section with id *<b>".$id."</b>* succesfully DELETED !!!";
        header('location: /admin/sections');
    }
}