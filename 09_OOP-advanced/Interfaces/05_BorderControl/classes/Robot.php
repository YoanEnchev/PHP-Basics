<?php

class Robot implements IDefined
{
    private $id;
    private $model;

    public function __construct(string $id, string $model)
    {
        $this->id = $id;
        $this->model = $model;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getModel()
    {
        return $this->model;
    }
}