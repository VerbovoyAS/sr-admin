<?php
require_once 'app/lib/tel_connect.php';

// Токен вашего бота
define('TELEGRAM_TOKEN', $tel_token);
// Внутренний айдишник
define('TELEGRAM_CHATID', $tel_chat_id);

function message_to_telegram($text){
    $ch = curl_init('https://api.telegram.org/bot'.TELEGRAM_TOKEN.'/sendMessage?chat_id='.TELEGRAM_CHATID.'&parse_mode=HTML&text='.$text); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch); 
    curl_close($ch); 

}

require_once 'app/lib/BD.php';
$_db = DB::getInstanse();

$result = $_db->query("SELECT * FROM `task` WHERE telegram = 1");
$res = $result->fetchAll(PDO::FETCH_OBJ);

$time_local = date('Y-m-d\TH:i');
$date = $time_local;
$currentDate = strtotime($date);
$futureDate = $currentDate+(60*60*10); 
$time_local = date("Y-m-d\TH:i", $futureDate);


foreach($res as $mes){ 
    $dateStart = $mes->time_alert_start;
    $currentDateStart = strtotime($dateStart);
    $futureDateStart = $currentDateStart-(60); 
    $time_start = date("Y-m-d\TH:i", $futureDateStart); 
    if( $time_start < $time_local &&  $time_local < $mes->time_alert_end){
        $header = $mes->header;
        $text =  $mes->text;
        $mess = '<b>'.$header.'</b>%0A'.$text;
        message_to_telegram($mess);     
    }
}
