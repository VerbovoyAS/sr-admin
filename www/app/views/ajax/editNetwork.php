<?php

$block = trim(htmlspecialchars($_POST['block']));
$sw = trim(htmlspecialchars($_POST['sw']));
$port = trim(htmlspecialchars($_POST['port']));
$pp = trim(htmlspecialchars($_POST['pp']));
$location = trim(htmlspecialchars($_POST['location']));
$type = trim(htmlspecialchars($_POST['type']));
$name = trim(htmlspecialchars($_POST['name']));
$ip = trim(htmlspecialchars($_POST['ip']));
$commentary = trim(htmlspecialchars($_POST['commentary']));
$id = trim(htmlspecialchars($_POST['id']));



if(strlen($block) < 1)
    $error = 'ENTER: Block Name. The field must not be empty';
else if(strlen($sw) < 1)
    $error = 'ENTER: SW. The field must not be empty';
else if(strlen($port) < 1)
    $error = 'ENTER: Port. The field must not be empty';
else if(strlen($pp) < 1)
    $error = 'ENTER: PP. The field must not be empty';

if(isset($error) != '') {
    echo $error;
    exit();
}

$_db = DB::getInstanse();
$sql  = "UPDATE network SET 
				Block = '{$block}',
                SW = '{$sw}',
                Port = '{$port}',
				PP = '{$pp}',
				Location = '{$location}',
				id_type = '{$type}',
				Name = '{$name}',
				IP = '{$ip}',
                commentary = '{$commentary}'
				WHERE `id`={$id}
                ";
$query = $_db->prepare($sql);
$query->execute();

echo "OK";
exit();
?>



