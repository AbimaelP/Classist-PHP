<?php
require_once("query.php");

class Model {
    protected static $database;

    public static function all($select = ['*'])
    {
        $select = implode(',', $select);

        $qr = query("SELECT $select FROM ".static::$database."");

        $response = [];
        while($obj = mysqli_fetch_object($qr)){
            $response[] = $obj;
        }

        if($response)
            return $response;
        else
            return $GLOBALS['db']->error;
    }

    public static function find($id, $select = ['*'])
    {
        $select = implode(',', $select);
        
        $response = mysqli_fetch_object(query("SELECT $select FROM ".static::$database." WHERE id=$id"));

        if($response)
            return $response;
        else
            return $GLOBALS['db']->error;
    }
    
    //
    public static function search($search, $select = ['*'])
    {
        $key = array_keys($search)[0];
        $value = '"%' . implode('%', array_values($search)) .'%"';
        $select = implode(',', $select);

        $qr = query("SELECT $select FROM ".static::$database." WHERE $key LIKE $value");

        $response = [];
        while($obj = mysqli_fetch_object($qr)){
            $response[] = $obj;
        }
        if($response)
            return $response;
        else
            return $GLOBALS['db']->error;
    }

    //
    public static function create($insert)
    {
        $keys = implode(',',array_keys($insert));
        $values = '"' . implode('","', array_values($insert)) . '"';
        
        $response = query("INSERT INTO ".static::$database." ($keys) VALUES ($values)");

        if ($response === true) {
            return "Inserção bem-sucedida";
        } else {
            return "Falha na inserção: " . $GLOBALS['db']->error;
        }
    }

    //
    public static function update($changes, $id, $type = '')
    {
        $update = [];

        foreach($changes as $key => $value){
            if($type === 'INT')
                $update[] = "$key = $value";
            else
                $update[] = "$key = '$value'";
        }

        $update = implode(',',$update);
        
        $response = query("UPDATE ".static::$database." SET $update WHERE id = $id");

        if ($response === true) {
            return ['message' =>"Atualização bem-sucedida", 'status' => 200];
        } else {
            return ['message' =>"Falha na Atualização: " . $GLOBALS['db']->error, 'status' => 401];
        }
    }

    //
    public static function delete($id)
    {
        
        $response = query("DELETE FROM ".static::$database." WHERE id = $id");

        if ($response === true) {
            return "Exclusão bem-sucedida";
        } else {
            return "Falha na exclusão: " . $response;
        }
    }
}