<?php

$name = trim(htmlspecialchars($_POST['name']));
$host = trim(htmlspecialchars($_POST['host']));
$login = trim(htmlspecialchars($_POST['login']));
$pass = trim(htmlspecialchars($_POST['pass']));
$category = trim(htmlspecialchars($_POST['category']));
$id = trim(htmlspecialchars($_POST['id']));

$_db = DB::getInstanse();
$sql  = "UPDATE wikipass SET 
				name = '{$name}',
                host = '{$host}',
                login = '{$login}',
                pass = '{$pass}',
                id_categoty = '{$category}'
				WHERE `id`={$id}
                ";
$query = $_db->prepare($sql);
$query->execute();

echo "OK";
exit();
?>



