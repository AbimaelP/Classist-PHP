<?php
require_once("config.php");

//alarmes views
route('GET','/alarms','AlarmController','viewAlarms');
route('GET','/register-alarm','AlarmController','viewAlarmRegister');
route('GET','/disparar-alarmes','AlarmController','viewsAlarmsTrigers');

//alarmes métodos
route('POST','/register-alarm-method','AlarmController','create');
route('GET','/check-alarm','AlarmController','check');
route('GET','/dispare-alarm','AlarmController','dispare');
route('POST','/activate-alarm','AlarmController','update');


//-------------------------------------------------------------------------------------------------------

//equipamentos views
route('GET','/equipments','EquipmentController','viewEquipments');
route('GET','/register-equipment','EquipmentController','viewEquipmentRegister');

//equipamentos métodos
route('POST','/register-equipment-method','EquipmentController','create');