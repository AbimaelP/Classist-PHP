<?php

function route($method, $url, $controller_name, $action = '') {
    $parsed_url = parse_url($_SERVER['REQUEST_URI']);
    $path = $parsed_url['path'];

    if ($path === $url) {
        
        if($method !== $_SERVER['REQUEST_METHOD']){
            echo json_encode('Método de requisição inválido');
            exit;
        }
        require_once "./app/controllers/$controller_name.php";

        $controller = new $controller_name();

        if($method === 'POST'){
            $json_data = file_get_contents('php://input');
            $data = json_decode($json_data, true);
        }else {
            $data = $_GET;
        }

        $controller->$action($data);
    }
}