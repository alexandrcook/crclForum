<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\{Section, Topic, Post, User};
use App\Database\DB;
use App\Framework\Auth\Auth;
use App\Framework\Auth\AuthInterface;
use App\Framework\View;

class AdminUsersController extends Controller
{
    public function showUsers(){
        $users= User::all();
        View::show("admin", ['user'=>$users], 'users');
    }

    public function createUser(){
        if(!empty($_POST)){
            $user = new User();
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setPass(md5($_POST['pass']));
            $user->setIs_id($_POST['is_admin']);
            $user->setVk_id($_POST['vk_id']);
            $user->save();
            $_SESSION['flash_msg'] = "User with name *<b>".$_POST['name']."</b>* succesfully CREATED";
        }else{
            $_SESSION['flash_msg'] = "User WASN*T created!!! DANGER!!! ERROR!!! ACHTUNG!!!";
        }
        header('location: /admin/users');
    }
    public function editUser(){
        $id = explode('/', $_SERVER['REQUEST_URI'])[4];
        $user=User::getById($id);

        if(!empty($_POST)){
            $user[0]->setName($_POST['name']);
            $user[0]->setEmail($_POST['email']);
            $user[0]->setPass(md5($_POST['pass']));
            $user[0]->setIs_admin($_POST['is_admin']);
            $user[0]->setVk_id($_POST['vk_id']);
            $user[0]->save();
            $_SESSION['flash_msg'] = "User with name *<b>".$_POST['name']."</b>* succesfully EDITED";
            header('location: /admin/users');
        }else{
            View::show("admin",['user' => $user[0]], 'userEdit');
        }
    }
    public function deleteUser(){
        $id = explode('/', $_SERVER['REQUEST_URI'])[4];
        DB::delete("DELETE  FROM `users` 
        WHERE `id`=".$id);
        $_SESSION['flash_msg'] = "User with id *<b>".$id."</b>* succesfully DELETED !!!";
        header('location: /admin/users');
    }
}