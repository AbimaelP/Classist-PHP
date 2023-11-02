<?php

function route($url, $controller_name, $action = '') {
    if ($_SERVER['REQUEST_URI'] === $url) {
        // Inclua o controlador
        require_once "./app/controllers/$controller_name.php";

        $controller = new $controller_name();

        $controller->$action();
    }
}