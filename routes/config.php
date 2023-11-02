<?php

function route($url, $controller, $action = '') {
    if ($_SERVER['REQUEST_URI'] === $url) {
        // Inclua o controlador
        require_once "./app/models/User.php";

    }
}