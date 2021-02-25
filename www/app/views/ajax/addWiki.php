<?php

$name = trim(htmlspecialchars($_POST['name']));
$host = trim(htmlspecialchars($_POST['host']));
$login = trim(htmlspecialchars($_POST['login']));
$pass = trim(htmlspecialchars($_POST['pass']));
$category = trim(htmlspecialchars($_POST['category']));

$_db = DB::getInstanse();

$sql = "INSERT INTO wikipass (`name`, `host`, `login`, `pass`, `id_categoty`) VALUES(?, ?, ?, ?, ?)";

$query = $_db->prepare($sql);
$query->execute([$name, $host, $login, $pass, $category]);

echo "OK";
exit();
?>



