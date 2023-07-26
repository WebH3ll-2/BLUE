<?php

namespace Controllers\API;

use Models\UserModel;

error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * http://localhost/cau-michelin/api/users
 */
class Users
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // api/users
    // api/users/root
    public function root()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo 'get all users!';
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
            // validate if name, password, profile is empty
            if (empty($_POST['name']) || empty($_POST['password'])) {
                echo 'name, password is required!';
                return;
            }
            // check if this array $_FILES['profile'] is uploaded
            if (empty($_FILES['profile'])) {
                $this->userModel->createUser($_POST['name'], $_POST['password'], 'default.png');
                return;
            }
            // var_dump($_FILES['profile']);

            $this->userModel->createUser($_POST['name'], $_POST['password'], 'path/to/image.png');
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
        $user = $this->userModel->getUserById($params['id']);
        echo json_encode($user);
    }
}
