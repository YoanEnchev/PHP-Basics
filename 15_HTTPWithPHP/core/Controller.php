<?php

abstract class Controller
{
    protected $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function loadView($fileName, $data = null)
    {
        include 'view/header.php';
        include 'view/main.php';

        if(file_exists("view/".$fileName)) {
            include "view/".$fileName;
        }
        else {
            throw new Exception("View not found:" . "view/".$fileName);
        }
    }

    public function addToPage($fileName, $data = null)
    {
        if(file_exists("view/".$fileName)) {
            include "view/".$fileName;
        }
        else {
            throw new Exception("View not found:" . "view/".$fileName);
        }
    }

    abstract public function main();
}