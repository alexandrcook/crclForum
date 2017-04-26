<?php
namespace App\Models;

use App\Models\Model;


class User extends Model
{
	protected $table = 'users';
	protected $id, $name, $email, $pass, $is_admin, $vk_id;

	public function topics()
    {

    }

	public function posts()
    {

    }
	
}