<?php

namespace App\MVC\Controllers;

use App\MVC\Models\TodoModel;
use Framework\Controller;

class TodosController extends Controller
{
    private TodoModel $model;
    private const SORT_DEFAULT_VALUE = "Status";
    private const ORDER_DEFAULT_VALUE = "DESC";

    public function __construct()
    {
        $this->model = new TodoModel();
    }

    public function index($request)
    {
        $currentPage = $_GET['page'] ?? 1;
        $sort = isset($_GET['sort'])
            ? $this->validateParameter($_GET['sort'], self::SORT_DEFAULT_VALUE)
            : self::SORT_DEFAULT_VALUE;
        $order = isset($_GET['order'])
            ? $this->validateParameter($_GET['order'], self::ORDER_DEFAULT_VALUE)
            : self::ORDER_DEFAULT_VALUE;

        if(isset($_GET['addTask'])){
            $addTask = $_GET['addTask'] == "success" ? "Task added successfully" : "";
        } else {
            $addTask = "";
        }
        $pages = ceil($this->model->rowCount() / 3);

        return $this->view('index.php',
            ['tasks'        => $this->model->getPage($currentPage, $sort, $order),
             'pages'        => $pages,
             'currentPage'  => $currentPage,
             'sort'         => $sort,
             'order'        => $order,
             'success'      => $addTask,
        ]);
    }

    public function addTask($request)
    {
        $data = array(
            "username" => $request->getPostParams()['username'],
            "email"    => $request->getPostParams()['email'],
            "text"     => $request->getPostParams()['text'],
        );

        if($this->model->create($data)) {
            header("Location: /?addTask=success");
        } else {
            header("Location: /?addTask=failed");
        }
    }

    public function complete($request, $task_id)
    {
        $this->model->updateById($task_id, ['complete' => !$this->model->getById($task_id)->complete]);
        header("Location: /");
    }

    private function validateParameter($parameter, $defaultValue)
    {
        if(ctype_alpha($parameter)){
            return $parameter;
        } else {
            return $defaultValue;
        }
    }
}
