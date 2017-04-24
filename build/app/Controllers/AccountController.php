<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Database\DB;
use App\Models\User;
use App\Framework\Auth\Auth;
use App\Framework\View;

class AccountController extends Controller
{
    public function defaultFunc()
    {
        View::show('account');
    }
}
