<?php
/**
 * Created by PhpStorm.
 * User: vukas
 * Date: 8/10/2019
 * Time: 6:31 PM
 */

namespace App\Models;
use App\Core\Model;
use App\Models\User;

class Order extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}