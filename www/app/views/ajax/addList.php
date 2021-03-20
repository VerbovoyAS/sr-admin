<?php

$name = trim(htmlspecialchars($_POST['name']));
$vlan = trim(htmlspecialchars($_POST['vlan']));
$ip = trim(htmlspecialchars($_POST['ip']));
$comment = trim(htmlspecialchars($_POST['comment']));
$category = trim(htmlspecialchars($_POST['category']));

$_db = DB::getInstanse();

$sql = "INSERT INTO list (`name`, `vlan`, `ip`, `comment`, `cat_id`) VALUES(?, ?, ?, ?, ?)";

$query = $_db->prepare($sql);
$query->execute([$name, $vlan, $ip, $comment, $category]);

echo "OK";
exit();
?>



