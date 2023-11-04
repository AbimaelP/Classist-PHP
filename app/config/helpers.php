<?php

function redirect($path = ''){
    $response = ['action' => 'redirect', 'route' => '/alarms'];
    echo json_encode($response);
    exit;
}

function mountView($view, $properties = []){
    require_once './app/views/layout/navbar.php';    
    require_once "./app/views/$view.php";
}