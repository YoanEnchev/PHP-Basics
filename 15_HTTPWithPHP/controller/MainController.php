<?php

class MainController extends Controller
{
    public function main()
    {
        $this->loadView('introduction.php');
    }

    public function route()
    {
        $route_error = false;

        if (!empty($_GET['controller'])) {
            if(preg_match('/^[A-Za-z]+$/', $_GET['controller'])) {
                $controller = $_GET['controller'];
            }
            else {
                $route_error = true;
            }
        } else {
            $controller = "MainController";
        }

        if (!empty($_GET['action'])) {
            if(preg_match('/^[A-Za-z]+$/', $_GET['action'])) {
                $action = $_GET['action'];
            }
            else {
                $route_error = true;
            }
        } else {
            $action = "main";
        }

        if(!$route_error) {
            $c = new $controller($this->db);
            $c->$action();
        }
    }
}