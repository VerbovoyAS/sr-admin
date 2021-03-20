<?php
$linkBack =  $_SERVER['HTTP_REFERER'];
//DELETE WIKI               
$_db = DB::getInstanse();
if(isset($_GET['action']) and $_GET['action'] == "delete"){
    $id = $_GET['id'];
    echo $id;
    $del_sql = "DELETE FROM `wikipass` WHERE id = '$id' ";
    $del_query = $_db->prepare($del_sql);
    $del_query->execute();
    echo '<meta http-equiv="refresh" content="0;'.$linkBack.'">'; 
    exit();
    
}
// Вывод страницы
require_once 'header.php'; 

echo  $data[0];
echo  $data[1];

require_once 'footer.php'; 
?>