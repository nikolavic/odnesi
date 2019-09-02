<?php

namespace App\Classes;

use App\Core\App;
use App\Models\User;

class Auth
{
    public function user()
    {
        $user=new User();
        $current=$user->find($_SESSION['user_id']);
        foreach ($current as $key => $cur){
            $user->$key=$cur;
        }

        return $user;
}

    public function check()
    {
        if(isset($_SESSION['user_id'])){
            return true;
        }
        return false;
  }

}