<?php

$header = trim(htmlspecialchars($_POST['header']));
$text = trim(htmlspecialchars($_POST['text']));
$user = trim(htmlspecialchars($_POST['user']));
$status = trim(htmlspecialchars($_POST['status']));
$telegram = trim(htmlspecialchars($_POST['telegram']));
$time_create = trim(htmlspecialchars($_POST['time_create']));
$time_alert_start = trim(htmlspecialchars($_POST['time_alert_start']));
$id = trim(htmlspecialchars($_POST['id']));


// прибовляем 60 секунд
$date = $time_alert_start;
$currentDate = strtotime($date);
$futureDate = $currentDate+(60); 
$time_alert_end = date("Y-m-d\TH:i", $futureDate);

$_db = DB::getInstanse();
$sql  = "UPDATE task SET 
				user = '{$user}',
                header = '{$header}',
                text = '{$text}',
                status = '{$status}',
                telegram = '{$telegram}',
                time_create = '{$time_create}',
                time_alert_start = '{$time_alert_start}',
                time_alert_end = '{$time_alert_end}'
				WHERE `id`={$id}
                ";
$query = $_db->prepare($sql);
$query->execute();

echo "OK";
exit();
?>
