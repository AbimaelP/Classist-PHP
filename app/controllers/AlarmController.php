<?php
require_once "./app/models/User.php";

class AlarmController {
    public function index(){
        $user = new User;
        $users = $user->search(['name' => 'Abimael']);
        $title = 'Cadastre um novo Alarme';
        
        return require_once "./app/views/view_register_alarm.php";
    }
}