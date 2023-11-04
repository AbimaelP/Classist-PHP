<?php
require_once("config.php");

//rotas de alarmes
route('GET','/alarms','AlarmController','viewAlarms');
route('GET','/register-alarm','AlarmController','viewAlarmRegister');
route('POST','/register-alarm-method','AlarmController','create');
route('POST','/activate-alarm','AlarmController','update');

//rotas de equipamentos
route('GET','/equipments','EquipmentController','viewEquipments');
route('GET','/register-equipment','EquipmentController','viewEquipmentRegister');
route('POST','/register-equipment-method','EquipmentController','create');