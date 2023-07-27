<?php

namespace Models;

class SessionModel
{
    public static function lazyInit()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function isLoggedIn()
    {
        self::lazyInit();
        return isset($_SESSION['user_id']);
    }

    public static function logout()
    {
        self::lazyInit();
        session_unset();
        session_destroy();
    }

    public static function getLoggedInUser()
    {
        self::lazyInit();
        if (isset($_SESSION['user_id'])) {
            return [
                'user_id' => $_SESSION['user_id'],
                'name' => $_SESSION['name'],
                'profile' => $_SESSION['profile'],
            ];
        }
        return null;
    }

    public static function setLoggedInUser($user)
    {
        self::lazyInit();
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['name'] = $user->name;
        $_SESSION['profile'] = $user->profile;
    }

    public static function unsetLoggedInUser()
    {
        self::lazyInit();
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['profile']);
    }

    public static function setFlashMessage($name, $message)
    {
        self::lazyInit();
        $_SESSION[$name] = $message;
    }

    public static function getFlashMessage($name)
    {
        self::lazyInit();
        if (isset($_SESSION[$name])) {
            $message = $_SESSION[$name];
            unset($_SESSION[$name]);
            return $message;
        }
        return null;
    }
}
