<?php

namespace Controllers\API;

/**
 * http://localhost/cau-michelin/api/users
 */
class Users
{
    // api/users
    // api/users/root
    public function root()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo 'get all users!';
        }
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

    // api/users/register
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'user registered!';
        }
    }

    // api/users/login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'user login!';
        }
    }

    // api/users/logout
    public function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'user logout!';
        }
    }

    // api/users/me
    public function me()
    {
        echo 'user info!';
    }

    // api/users/me/bookmark
    // api/users/get-my-bookmark
    public function getMyBookmark()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo 'get all bookmark!';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'bookmark created!';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            echo 'bookmark deleted!';
        }
    }

    // api/users/me/review
    // api/users/get-my-reviews
    public function getMyReviews()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo 'get all review i created!';
        }
    }

    // api/users/:id
    public function getUserById($params)
    {
        echo 'get user ' . $params['id'];
    }
}
