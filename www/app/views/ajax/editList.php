<?php

$name = trim(htmlspecialchars($_POST['name']));
$vlan = trim(htmlspecialchars($_POST['vlan']));
$ip = trim(htmlspecialchars($_POST['ip']));
$comment = trim(htmlspecialchars($_POST['comment']));
$category = trim(htmlspecialchars($_POST['category']));
$id = trim(htmlspecialchars($_POST['id']));

$_db = DB::getInstanse();
$sql  = "UPDATE list SET 
				name = '{$name}',
                vlan = '{$vlan}',
                ip = '{$ip}',
                comment = '{$comment}',
                cat_id = '{$category}'
				WHERE `id`={$id}
                ";
$query = $_db->prepare($sql);
$query->execute();

echo "OK";
exit();
?>



