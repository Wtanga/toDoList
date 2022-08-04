<?php


namespace Framework\Routing;


class Request
{
    private $path;
    private $params;
    private $postParams;
    private $type;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        if(isset($_GET['path'])) {
            $this->path = $_GET['path'];
        } else {
            $this->path = "";
        }
        $this->params = $_GET;
        unset($this->params['path']);
        $this->postParams = $_POST;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') $this->type = Route::METHOD_POST;
        if ($_SERVER['REQUEST_METHOD'] === 'GET') $this->type = Route::METHOD_GET;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getPostParams()
    {
        return $this->postParams;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }
}
