<?php


namespace App;


class Router
{
    private $routes = array();

    public function get($route, $callback) {
        $this->routes[] = $route;

        if ($route == $_GET['url']) {
            $callback();
        }
    }

    public function error($callback) {
        foreach ($this->routes as $route) {
            if ($route == $_GET['url']) {
                return;
            }
        }
        $callback();
    }
}
