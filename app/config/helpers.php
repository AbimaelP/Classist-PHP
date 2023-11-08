<?php

function redirect($path = ''){
    $response = ['action' => 'redirect', 'route' => $path];
    echo json_encode($response);
    exit;
}

function mountView($view, $properties = [], $data = []){
    require_once './app/views/layout/navbar.php';    
    require_once "./app/views/$view.php";
    require_once './app/views/layout/footer.php';
}

function groupData($datas, $table_join, $column_id, $select = ['*']){
    foreach ($datas as &$data){
         $data->data_join = $table_join::find($data->$column_id, $select);
    }
    return $datas;
}