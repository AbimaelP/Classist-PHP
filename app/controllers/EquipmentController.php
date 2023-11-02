<?php
require_once "./app/models/Equipment.php";

class EquipmentController {
    public function index(){
        $equipment = new Equipment();
        $equipments = $equipment->all();
        $title = 'Lista de equipamentos';

        return require_once "./app/views/view_register_equipment.php";
    }

    public function create($response){
        echo json_encode($response);
    }

    public function update($response){
        
        return require_once "./app/views/view_register_equipment.php";
    }

    public function delete($response){
        
        return require_once "./app/views/view_register_equipment.php";
    }
}