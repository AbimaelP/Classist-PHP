<?php
require_once "./app/config/model.php";

class Alarm extends Model {
    //protected $database = 'users';
    
    public function __construct()
    {
        parent::__construct('alarms');
    }
}