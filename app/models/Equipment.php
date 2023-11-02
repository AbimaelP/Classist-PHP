<?php
include_once "./app/config/model.php";

class Equipment extends Model {
    //protected $database = 'users';
    
    public function __construct()
    {
        parent::__construct('equipments');
    }
}