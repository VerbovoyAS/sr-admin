<?php

$header = trim(htmlspecialchars($_POST['header']));
$text = trim(htmlspecialchars($_POST['text']));
$user = trim(htmlspecialchars($_POST['user']));
$status = trim(htmlspecialchars($_POST['status']));
$telegram = trim(htmlspecialchars($_POST['telegram']));
$time_create = trim(htmlspecialchars($_POST['time_create']));
$time_alert_start = trim(htmlspecialchars($_POST['time_alert_start']));

// прибовляем 60 секунд
$date = $time_alert_start;
$currentDate = strtotime($date);
$futureDate = $currentDate+(60); 
$time_alert_end = date("Y-m-d\TH:i", $futureDate);

$_db = DB::getInstanse();

$sql = "INSERT INTO task (`user`, `header`, `text`, `status`, `telegram`, `time_create`, `time_alert_start`, `time_alert_end`) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

$query = $_db->prepare($sql);
$query->execute([$user, $header, $text, $status, $telegram, $time_create, $time_alert_start, $time_alert_end]);

// echo $user."<br>". $header."<br>". $text."<br>". $status."<br>". $telegram."<br>". $time_create."<br>". $time_alert_start."<br>". $time_alert_end;


echo "OK";
exit();
?>



