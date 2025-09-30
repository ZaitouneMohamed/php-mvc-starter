<?php 

namespace Facades;

class Auth 
{
    public function Attempt($user, $duration, $key)
    {
        if ($user) {
            $_SESSION[$key] = $user;
            if ($duration > 0) {
                setcookie($key, session_id(), time() + $duration, "/");
            }
            return true;
        }
        return false;
    }

    public static function check($key)
    {
        return isset($_SESSION[$key]);
    }
  
}