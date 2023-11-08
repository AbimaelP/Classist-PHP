<?php
require_once "./app/models/Alarm.php";
require_once "./app/models/Equipment.php";
require_once "./app/config/helpers.php";
include_once('./phpmailer/class.phpmailer.php');
class AlarmController {
    public function viewAlarms(){
        $alarms = Alarm::all();
        $alarms = groupData($alarms, 'Equipment', 'equipment_id', ['serial_number','name']);
        
        return mountView("view_list_alarms", $alarms);
    }

    public function viewAlarmRegister(){
        $equipments = Equipment::all();

        return mountView("view_register_alarm", $equipments);
    }

    public function viewsAlarmsTrigers(){
        $alarms = Alarm::all();
        $alarms = groupData($alarms, 'Equipment', 'equipment_id', ['serial_number','name']);
        
        return mountView("view_alarms_triggers", $alarms);
    }

    public function viewsActuatedAlarms(){
        $alarms = Alarm::all();
        $alarms = groupData($alarms, 'Equipment', 'equipment_id', ['serial_number','description']);
        
        return mountView("view_alarms_actuateds", $alarms);
    }

    public function viewsActuatedAlarmsWithFilters($response){
        $alarms = Alarm::search(['description' => $response['search']], $response['order_by'], ['*']);
        $alarms = groupData($alarms, 'Equipment', 'equipment_id', ['serial_number','description']);

        return mountView("view_alarms_actuateds", $alarms, ['search' => $response['search'], 'orderby' => $response['order_by']]);
    }

    public function check($response){
        $alarms = Alarm::find($response['id'],['activated']);

        if($alarms->activated)
        {
            echo json_encode('activeted');
        }else
        {
            echo json_encode('no-activeted');
        }
    }

    public function dispare($response){
        $alarm = Alarm::update(['acted' => ['acted + 1','INT'], 'release_date' => [date('Y-m-d H:i:s'), 'STRING']], $response['id']);
     
        if($alarm['status'] == 200 && $response['classification'] == 'Urgente')
            $this->sendMail();

        echo json_encode($alarm);
    }

    public function sendMail(){
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth   = true; 
        $mail->SMTPSecure = "ssl"; 
        $mail->Host       = "mail.smtp2go.com";
        $mail->Username   = "rede_news3";
        $mail->Password   = "zFSDAcxvzxakSADF243129128APOSPQQXX";

        $mail->From = 'abimael.stack@hotmail.com';
        $mail->FromName = 'abimael.stack@hotmail.com';
        $mail->Subject = ('nenhum assunto');
        $mail->MsgHTML(('<div>Alerta de classificação urgente disparado</div>'));
        $mail->AddAddress('abcd@abc.com.br','abcd@abc.com.br');

        $mail->Send();
    }

    public function create($response){
        $alarm = Alarm::create([
            'name' => $response['name'],
            'description' => $response['description'],
            'classification' => $response['classification'],
            'equipment_id' => $response['equipment_id'],
            'activated' => $response['activated'],
            'entry_date' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        redirect('/alarms');
    }

    public function activate($response){        
        $alarm = Alarm::update(['activated' => [$response['activate'], 'INT']], $response['id']);

        redirect('/disparar-alarmes');
    }

    public function delete($response){
        //$this->index();
    }
}