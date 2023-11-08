<?php
require_once "./app/models/Equipment.php";
require_once "./app/models/Type.php";
require_once "./app/config/helpers.php";

class EquipmentController {

    public function viewEquipments(){
        $equipments = Equipment::all();
        $equipments = groupData($equipments, 'Type', 'type_id');

        return mountView("view_list_equipments", $equipments);
    }

    public function viewEquipmentRegister(){
        $types = Type::all();

        return mountView("view_register_equipment", $types);
    }

    public function create($response){

        $equipment = Equipment::create([
            'name' => $response['name'],
            'serial_number' => $response['serial_number'],
            'type_id' => $response['type_id'],
            'description' => $response['description'],
            'created_at' => date('Y-m-d H:i:s')
        ]);;
        
        if($equipment){
            redirect('/equipments');
        }
    }

    public function update($response){
        
        return require_once "./app/views/view_register_equipment.php";
    }

    public function delete($response){
        
        return require_once "./app/views/view_register_equipment.php";
    }
}