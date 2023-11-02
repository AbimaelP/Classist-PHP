<?php
require_once("config.php");

route('POST','/register-alarm','AlarmController','index');
route('POST','/register-equipment','EquipmentController','create');