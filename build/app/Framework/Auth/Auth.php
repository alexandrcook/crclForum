<?php

namespace App\Framework\Auth;

use \Exception;
use App\Database\DB;
use App\Models\User;

class Auth implements AuthInterface
{

    public static $user;

    public static function login(Array $credentials)
    {
        $credentials['name'];
        $credentials['pass'];
        $arguments = [$credentials['name'], md5($credentials['pass'])];

        // DB select
        $res = DB::select("SELECT * FROM users WHERE `name` =? AND `pass` = ?", $arguments);
        if (!empty($res)) {
            $user = (new User())->hydrate($res);
            $_SESSION['user_id'] = $res[0]['use_id'];
            $_SESSION['user_name'] = $res[0]['name'];
            if (isset($res[0]['is_admin'])) {
                $_SESSION['is_admin'] = $res[0]['is_admin'];
            }
            self::$user = $user;
            return true;
        } else return false;
    }

    public static function logout()
    {
        if (isset($_SESSION['user_id'])) {
            $_SESSION['flash_msg'] = 'Dear user! You just was logout! Now you could be free!!!';
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['id']);
            unset($_SESSION['name']);
            if (isset($_SESSION['is_admin'])) {
                unset($_SESSION['is_admin']);
            }
        } else {
            $_SESSION['flash_msg'] = 'You wasn"t loginized! Go away undefined user!!!';
        }
    }

    public static function register(User $user)
    {
        $user->save();
    }

    public static function getLoggedUser($param)
    {
        if($param == 'is_admin'){
            if(isset($_SESSION['is_admin']) and $_SESSION['is_admin'] != null){
                return true;
            }else{
                return false;
            }
        }
        if($param == 'is_user') {
            if (isset($_SESSION['user_id'])) {
                return true;
            } else {
                return false;
            }
        }
        //return self::$user;
    }

    public static function CheckAuthSession()
    {

    }
}