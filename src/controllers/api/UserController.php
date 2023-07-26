<?php

namespace Controllers\User;

/**
 * http://localhost/cau-michelin/api/users/index
 */
class Users
{
    public function users()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'users created!';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            echo 'users updated!';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            echo 'users deleted!';
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'user registered!';
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'user login!';
        }
    }
}
