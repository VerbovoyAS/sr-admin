<?php

// токен бота
define('TELEGRAM_TOKEN', '1421788769:AAH_VxWU1dspQGz-Lkh55bOcNw5VYThyp60');
// ваш внутренний ID
define('TELEGRAM_CHATID', '163045668');
$message = 'Сообщение';
$ch = curl_init('https://api.telegram.org/bot'.TELEGRAM_TOKEN.'/sendMessage?chat_id='.TELEGRAM_CHATID.'&text='.$message); // URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Не возвращать ответ
curl_exec($ch); // Делаем запрос
curl_close($ch); // Завершаем сеанс cURL

// // require_once 'app/lib/tel_connect.php';
// $tel_token = '1421788769:AAH_VxWU1dspQGz-Lkh55bOcNw5VYThyp60';
// $tel_chat_id = '163045668';
// // Токен вашего бота
// define('TELEGRAM_TOKEN', $tel_token);
// // Внутренний айдишник
// define('TELEGRAM_CHATID', $tel_chat_id);

// function message_to_telegram($text)
// {
//     $ch = curl_init();
//     curl_setopt_array(
//         $ch,
//         array(
//             CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
//             CURLOPT_POST => TRUE,
//             CURLOPT_RETURNTRANSFER => TRUE,
//             CURLOPT_TIMEOUT => 10,
//             CURLOPT_POSTFIELDS => array(
//                 'chat_id' => TELEGRAM_CHATID,
//                 'text' => $text,
//             ),
//         )
//     );
//     curl_exec($ch);
// }

// require_once 'app/lib/BD.php';
// $_db = DB::getInstanse();

// $result = $_db->query("SELECT * FROM `task` WHERE telegram = 1");
// $res = $result->fetchAll(PDO::FETCH_OBJ);
// var_dump($res);

// $time_local = date('Y-m-d\TH:i');
// $date = $time_local;
// $currentDate = strtotime($date);
// $futureDate = $currentDate+(60*60*10); 
// $time_local = date("Y-m-d\TH:i", $futureDate);
// echo 'Время локальное: '.$time_local.'<br>';

// foreach($res as $mes){
    
//     if( $mes->time_alert_start < $time_local &&  $time_local < $mes->time_alert_end){
//         message_to_telegram($mes->text);   
//     }
// }

// message_to_telegram($res[0]->text);
// message_to_telegram('rfrfrfrf');
?>
