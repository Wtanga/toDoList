<?php


namespace Framework;


abstract class Model
{
    protected function getIdField()
    {
        return "id";
    }

    public abstract function getById($id);

    public abstract function all();

    public abstract function getPage($page, $sort, $order);

    public abstract function updateById($id, $data);

    public abstract function create($data);
}
