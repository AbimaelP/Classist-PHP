<?php
require_once "./app/config/model.php";

class User extends Model {
    //protected $database = 'users';
    
    public function __construct()
    {
        parent::__construct('users');
    }
}