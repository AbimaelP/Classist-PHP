<?php
require_once "./app/models/Alarm.php";
require_once "./app/models/Equipment.php";
require_once "./app/config/helpers.php";

class AlarmController {
    public function viewAlarms(){
        $alarms = Alarm::all();
        $alarms = groupData($alarms, 'Equipment', 'equipment_id', ['serial_number','name']);
        
        return mountView("view_list_alarms", $alarms);
    }

    public function viewAlarmRegister(){
        $alarms = Alarm::all();
        $equipments = Equipment::all();

        return mountView("view_register_alarm");
    }

    public function create($response){
        $alarm = Alarm::create([
            'name' => $response['name'],
            'description' => $response['description'],
            'classification' => $response['classification'],
            'equipment_id' => $response['equipment_id'],
            'activated' => $response['activated'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        redirect('/alarms');
    }

    public function update($response){        
        //$this->index();
    }

    public function delete($response){
        //$this->index();
    }
}