<?php
require_once("query.php");

class Model {
    protected $database;
    
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function search($search, $select = '*'){
        $key = array_keys($search)[0];
        $value = '"%' . implode('%', array_values($search)) .'%"';

        $qr = query("SELECT $select FROM ".$this->database." WHERE $key LIKE $value");

        $response = [];
        while($obj = mysqli_fetch_object($qr)){
            $response[] = $obj;
        }
        if($response)
            return $response;
        else
            return $GLOBALS['db']->error;
    }

    public function create($insert){
        $keys = implode(',',array_keys($insert));
        $values = '"' . implode('","', array_values($insert)) . '"';
        
        $response = query("INSERT INTO ".$this->database." ($keys) VALUES ($values)");

        if ($response === true) {
            return "Inserção bem-sucedida";
        } else {
            return "Falha na inserção: " . $GLOBALS['db']->error;
        }
    }

    public function delete($id){
        
        $response = query("DELETE FROM ".$this->database." WHERE id=$id");

        if ($response === true) {
            return "Exclusão bem-sucedida";
        } else {
            return "Falha na exclusão: " . $response;
        }
    }
}