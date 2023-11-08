<?php 
    $request = $_SERVER['REQUEST_URI'];

    $request = trim($request, '/');
    
    if (empty($request)) {
        require_once("./app/views/layout/navbar.php");
        require_once("public/home.php");
    } else {
        require_once("routes/router.php");
    }
?>