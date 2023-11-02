<?php
require_once "./app/config/model.php";

class Alert extends Model {
    //protected $database = 'users';
    
    public function __construct()
    {
        parent::__construct('alerts');
    }
}