<?php
/**
 * Created by PhpStorm.
 * User: vukas
 * Date: 7/30/2019
 * Time: 9:58 PM
 */

namespace App\Core;


class Controller
{
    protected $controller_class_black_list=['PagesController'];
    public function __construct()
    {
        if(!in_array($this->get_class_name(),$this->controller_class_black_list)) {
            $class = "App\Models\\".substr($this->get_class_name(), 0, -11);
            $this->$class = new $class;
        }
    }
    public function get_class_name()
    {
        $path = explode('\\', get_called_class());
        return array_pop($path);
    }


}