<?php 
    $request = $_SERVER['REQUEST_URI'];

    $request = trim($request, '/');
    
    if (empty($request)) {
        include_once("public/home.php");
    } else {
        include_once("routes/router.php");
    }
?>