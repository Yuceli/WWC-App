<?php

class Session {

    public static function write($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function read($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    public static function flush($key = false)
    {
        if($key){
            unset($_SESSION[$key]);
        }else{
            session_unset();
        }
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }
}