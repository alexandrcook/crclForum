<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Database\DB;
use App\Models\User;
use App\Framework\Auth\Auth;
use App\Framework\View;

class AuthController extends Controller
{
    public function defaultFunc()
    {
        View::show('login');
    }

    public function login()
    {
        $postForm = array(
            'email' => isset($_POST['email']) ? $_POST['email'] : null,
            'pass' => isset($_POST['pass']) ? $_POST['pass'] : null
        );
        if ($postForm) {
            $asr = Auth::login($postForm);
            if ($asr) {
                $_SESSION['flash_msg'] = 'User with email ' . $_POST['email'] . ' have been loganizated';
                header('location: /account');
                exit();
            } else {
                $_SESSION['flash_msg'] = 'We don*t know you  - go away';
            }
        }
        View::show('login');
    }

    public function registration()
    {
        if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['pass'])) {
            $user = new User();
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setPass(md5($_POST['pass']));
            Auth::register($user);
            $_SESSION['flash_msg'] = 'You just was registered - now you can do something...';
        }else{
            $_SESSION['flash_msg'] = 'You skip some input - try again';
        }
        View::show('login');
    }

    public function logout()
    {
        Auth::logout();
        $_SESSION['flash_msg'] = 'Dear user! You just was logout! Now you could be free!!!';
        header('location: /login');
    }

    public static function fbCallback()
    {
        View::show("header");
        $code = isset($_GET['code']) ? $_GET['code'] : null;
        $url = 'https://graph.facebook.com//oauth/access_token?client_id=377416752598790&redirect_uri=http://mysite.com/fb-callback&client_secret=4b5386c673b061e43ff18932023403f6&code=' . $code;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $ret = curl_exec($ch);
        curl_close($ch);
        parse_str($ret, $vars);

        $accessToken = $vars['access_token'];

        $queryUser = 'https://graph.facebook.com/me?fields=id,name,email&access_token=' . $accessToken;
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_URL, $queryUser);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        $ret2 = curl_exec($ch2);
        curl_close($ch2);
        $fbUser = json_decode($ret2);

        $newUserFb = new User();

        $argument = [$fbUser->email, $fbUser->name];
        $currentUser = DB::select("SELECT * FROM users WHERE `email` =? AND `name` =?", $argument);
        if (empty($currentUser)) {

            $newUserFb->setName($fbUser->name);
            $newUserFb->setEmail($fbUser->email);
            $newUserFb->setPassword(md5(uniqid()));
            Auth::register($newUserFb);
            $_SESSION['user_id'] = DB::getlastId();
        } else {
            $userId = $currentUser[0];
            $_SESSION['user_id'] = $userId['id'];
        }
        header('location: /account');
    }
}
