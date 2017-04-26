<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\{Section, Topic, Post, User};
use App\Database\DB;
use App\Framework\Auth\Auth;
use App\Framework\Auth\AuthInterface;
use App\Framework\View;

class AdminController extends Controller
{

    public function defaultFunc()
    {
        View::show('admin');
    }

//    public function showAdminmenu(){
//        View::show("admin/mainAdmin");
//    }
}