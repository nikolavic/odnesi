<?php

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [])
{
    extract($data);

    return require "app/views/{$name}.view.php";
}

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}

function auth(){
    $auth= new App\Classes\Auth();
    return $auth;
}

if (!function_exists('dd')) {
    function dd()
    {
        array_map(function($x) {
            dump($x);
        }, func_get_args());
        die;
    }
}

function check_cart(){
    if(auth()->check()){
        $user_cart=auth()->user()->has_many(\App\Models\Cart::class);
        if(count($user_cart)){
            return true;
        }
        return false;
    }
}

function back(){
    header("location:javascript://history.go(-1)");
}



