<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Database\DB;
use App\Framework\Config;
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
            'name' => isset($_POST['name']) ? $_POST['name'] : null,
            'pass' => isset($_POST['pass']) ? $_POST['pass'] : null
        );
        if ($postForm) {
            $asr = Auth::login($postForm);
            if ($asr) {
                $_SESSION['flash_msg'] = 'User with name <b>* ' . $_POST['name'] . ' *</b> have been loganizated';
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
            if (isset($_POST['role']) and $_POST['role'] == 'admin') {
                $user->setIs_admin(1);
            }
            Auth::register($user);
            $_SESSION['flash_msg'] = 'You just was registered - now you can do something...';
        } else {
            $_SESSION['flash_msg'] = 'You skip some input - try again';
        }
        View::show('login');
    }

    public function logout()
    {
        Auth::logout();
        header('location: /');
    }

    public static function showVkAuth()
    {
        $config = Config::init();
        $client_id = $config->get('vkApp.client_id');
        $redirect_uri = $config->get('vkApp.redirect_uri');
        $url = $config->get('vkApp.url');
        $params = array(
            'client_id' => $client_id,
            'redirect_uri' => $redirect_uri,
            'response_type' => 'code'
        );
        echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a></p>';
    }

    public static function vkAuth()
    {
        $config = Config::init();
        $client_id = $config->get('vkApp.client_id');
        $client_secret = $config->get('vkApp.client_secret');
        $redirect_uri = $config->get('vkApp.redirect_uri');

        if (isset($_GET['code'])) {
            $result = false;
            $params = array(
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'code' => $_GET['code'],
                'redirect_uri' => $redirect_uri
            );

            $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

            if (isset($token['access_token'])) {
                $params = array(
                    'uids' => $token['user_id'],
                    'fields' => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
                    'access_token' => $token['access_token']
                );

                $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
                if (isset($userInfo['response'][0]['uid'])) {
                    $userInfo = $userInfo['response'][0];
                    $result = true;
                }
            }

            if ($result) {
                $newUserVk = new User();
                $argument = [$userInfo['first_name'], $userInfo['uid']];
                $currentUser = DB::select("SELECT * FROM users WHERE `name` =? AND `vk_id` =?", $argument);
                if (empty($currentUser)) {
                    $newUserVk->setName($userInfo['first_name']);
                    $newUserVk->setVk_id($userInfo['uid']);
                    Auth::register($newUserVk);
                    $_SESSION['user_id'] = DB::getlastId();
                    $_SESSION['user_name'] = $userInfo['first_name'];
                    $_SESSION['flash_msg'] = 'User with name <b>* ' . $userInfo['first_name'] . ' *</b> have been registered and loganizated';
                } else {
                    $userId = $currentUser[0];
                    $_SESSION['user_id'] = $userId['use_id'];
                    $_SESSION['user_name'] = $userId['name'];
                    $_SESSION['flash_msg'] = 'User with name <b>* ' . $userInfo['first_name'] . ' *</b> have been loganizated';
                }
                header('location: /account');
            }


        }
    }
}
