<?php

namespace App\MVC\Controllers;

use App\MVC\Models\UserModel;
use App\MVC\Models\TodoModel;
use Framework\Controller;

class UserController extends Controller
{
    private UserModel $userModel;
    private TodoModel $todoModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->todoModel = new TodoModel();
        session_start();
    }

    public function index($request)
    {
        if(isset($_SESSION['isLogged'])){
            return $this->view('admin.php', ["tasks" => $this->todoModel->all()]);
        } else {
            header("Location: /user/login");
        }
    }

    public function complete($request, $task_id)
    {
        if(isset($_SESSION['isLogged'])) {
            $this->todoModel->updateById($task_id, ['status' => !$this->todoModel->getById($task_id)->complete]);
            header("Location: /user/adminpanel");
        } else {
            return json_encode([
                "403" => "You dont have permissions"
            ]);
        }
    }

    public function editText($request, $task_id)
    {
        if(isset($_SESSION['isLogged'])) {
            $this->todoModel->updateById($task_id,
                ['text'       => $request->getPostParams()['text'],
                 'wasChanged' => 1
                ]);
            header("Location: /user/adminpanel");
        } else {
            return json_encode([
                "403" => "You dont have permissions"
            ]);
        }
    }

    public function login($request)
    {
        if(!isset($_SESSION['isLogged'])){
            return $this->view('login.php');
        } else {
            header("Location: /user/adminpanel");
        }
    }

    public function authentication($request)
    {
        $data = array(
            "login"    => $request->getPostParams()['login'],
            "password" => $request->getPostParams()['password'],
        );

        if($this->userModel->passwordVerify($data)){
            $_SESSION['isLogged'] = "admin";
            header("Location: /user/adminpanel");
        } else {
            return $this->view('login.php', ['error' => 'Invalid data']);
        }
    }

    public function logout($request)
    {
        unset($_SESSION['isLogged']);
        header("Location: /");
    }
}