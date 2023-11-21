<?php
require_once("query.php");

class Model {
    protected static $database;

    public static function all($select = ['*'], $additional_query = '', $isrank = true)
    {
        $select = implode(',', $select);

        if(static::$database == 'alarms' && $isrank){
            $qr = query("SELECT 
            a.*,
            CASE WHEN d.ranking <= 3 THEN 'rank' ELSE '' END AS referencia FROM alarms a
            JOIN (SELECT id, DENSE_RANK() OVER (ORDER BY acted DESC) AS ranking FROM alarms ) AS d ON a.id = d.id
            WHERE 0=0 AND a.acted > 0
            ORDER BY a.name");
        }else {
            $qr = query("SELECT $select FROM ".static::$database." WHERE 0=0 $additional_query");
        }

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
    public static function search($search, $orderBy = '', $select = ['*'])
    {
        $key = array_keys($search)[0];
        $value = "'%" . implode('%', array_values($search)) ."%'";
        $select = implode(',', $select);

        if($orderBy)
            $orderBy = "ORDER BY $orderBy";

        if(static::$database == 'alarms'){
            $qr = query("SELECT 
            a.*,
            CASE WHEN d.ranking <= 3 THEN 'rank' ELSE '' END AS referencia FROM alarms a
            JOIN (SELECT id, DENSE_RANK() OVER (ORDER BY acted DESC) AS ranking FROM alarms ) AS d ON a.id = d.id
            WHERE $key LIKE $value AND a.acted > 0 $orderBy");
        }else{
            $qr = query("SELECT $select FROM ".static::$database." WHERE $key LIKE $value $orderBy");
        }

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
    public static function update($changes, $id)
    {
        $update = [];
        

        foreach($changes as $key => $value){
            if($value[1] === 'INT')
                $update[] = "$key = ".$value[0]."";
            else
                $update[] = "$key = '".$value[0]."'";
        }

        $update = implode(', ',$update);

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