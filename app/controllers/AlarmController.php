<?php
require_once "./app/models/Alarm.php";

class AlarmController {
    public function index(){
        $alarm = new Alarm();
        $alarms = $alarm->all();
        $title = 'Lista de alarmes';

        return require_once "./app/views/view_register_alarm.php";
    }

    public function create($response){
        $alarm = new Alarm();

        $alarms = $alarm->create([
            'description' => 'Alarme para motor',
            'classification' => 'Urgente',
            'equipment_id' => '1',
            'created_at' => '2023-11-02'
        ]);

        $this->index();
    }

    public function update($response){        
        $this->index();
    }

    public function delete($response){
        $this->index();
    }
}