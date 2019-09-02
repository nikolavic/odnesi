<?php
/**
 * Created by PhpStorm.
 * User: vukas
 * Date: 7/30/2019
 * Time: 9:11 PM
 */
namespace App\Models;

use App\Core\Model;

class User extends Model
{



public function products(){
    return $this->has_many(Product::class);
}
}