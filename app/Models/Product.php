<?php
/**
 * Created by PhpStorm.
 * User: vukas
 * Date: 7/30/2019
 * Time: 10:13 PM
 */

namespace App\Models;


use App\Core\Model;

class Product extends Model
{

    public function images()
    {

        return $this->has_many(Product_image::class);
    }

    public function addition()
    {

        return $this->belongsToMany(Addition::class);
    }
}