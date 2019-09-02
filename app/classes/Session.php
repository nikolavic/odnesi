<?php
namespace App\Classes;

class Session{
    public static function set_session($name,$msg)
    {
        $_SESSION[$name]=$msg;
    }

    public static function flash($name)
    {
        if(is_array($_SESSION[$name])) {
            foreach ($_SESSION[$name] as $error) {
                if (is_array($error)) {
                    foreach ($error as $er) {
                        echo "<div class='alert alert-danger'>";
                        echo $er;
                        echo "</div>";
                        echo "<br>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>";
                    echo $error;
                    echo "</div>";
                    echo "<br>";
                }
            }
        }else{
            echo $_SESSION[$name];
        }
        unset($_SESSION[$name]);
    }

    public static function has($name)
    {
        if(isset($_SESSION[$name])){
            return true;
        }
        return false;

    }
}


?>