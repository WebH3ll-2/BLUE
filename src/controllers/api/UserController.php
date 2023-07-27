<?php

namespace Controllers\API;

use Models\UserModel;
use Models\SessionModel;

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
            http_response_code(201);
            echo 'users updated!';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            http_response_code(201);
            echo 'users deleted!';
        }
    }

    // api/users/register
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $error_data = $this->validate_user_info($_POST['id'], $_POST['password']);
            if (!empty($data['id']) || !empty($error_data['password'])) {
                echo $this->error_response($error_data);
                return;
            }
            if ($this->userModel->getUserByName($_POST['id'])) {
                $error_data['id'] = '이미 존재하는 아이디입니다.';
                echo $this->error_response($error_data);
                return;
            }

            // check if this array $_FILES['profile'] is uploaded
            if (empty($_FILES['profile'])) {
                $this->userModel->createUser($_POST['id'], $_POST['password'], 'default.png');
                return;
            }
            // var_dump($_FILES['profile']);

            // TODO: hash password
            $this->userModel->createUser($_POST['id'], $_POST['password'], 'path/to/image.png');

            http_response_code(201);
            echo json_encode(['status' => 'success']);
        }
    }

    // api/users/login
    public function login()
    {
        SessionModel::lazyInit();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $error_data = $this->validate_user_info($_POST['id'], $_POST['password']);
            if (!empty($error_data['id']) || !empty($error_data['password'])) {
                echo $this->error_response($error_data);
                return;
            }

            $user = $this->userModel->getUserByName($_POST['id']);
            if (!$user || empty($user) || $_POST['password'] !== $user->password) {
                $error_data['password'] = 'wrong password!';
                echo $this->error_response($error_data);
                return;
            }

            // create session
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['name'] = $user->name;
            $_SESSION['profile'] = $user->profile;

            unset($user->password);
            echo json_encode(['status' => 'success', 'user' => $user]);
        }
    }

    // api/users/logout
    public function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            SessionModel::logout();
            echo json_encode(['status' => 'success']);
        }
    }

    // api/users/me
    public function me()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // check user info from session
            $user = SessionModel::getLoggedInUser();
            if (!$user) {
                echo $this->error_response(['status' => 'fail', 'message' => 'not logged in'], 401);
                return;
            }

            echo json_encode(['status' => 'success', 'user' => $user]);
        }
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
        // check if user is logged in
        if (!SessionModel::isLoggedIn()) {
            echo $this->error_response(['status' => 'fail', 'message' => 'not logged in'], 401);
            return;
        }

        $user = $this->userModel->getUserById($params['id']);
        echo json_encode($user);
    }

    private function validate_user_info($name, $password)
    {
        $error_data = array();
        // validate if name, password is empty
        if (empty($_POST['id'])) {
            $error_data['id'] = 'name is required!';
        }
        if (empty($_POST['password'])) {
            $error_data['password'] = 'password is required!';
        }
        return $error_data;
    }

    private function error_response($error_data, $status_code = 400)
    {
        http_response_code($status_code);
        return json_encode(["status" => "fail", "errors" => $error_data]);
    }
}