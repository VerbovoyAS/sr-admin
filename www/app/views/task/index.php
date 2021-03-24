<?php
$linkBack =  $_SERVER['HTTP_REFERER'];
//DELETE TASK               
$_db = DB::getInstanse();
if(isset($_GET['action']) and $_GET['action'] == "delete"){
    $id = $_GET['id'];
    $del_sql = "DELETE FROM `task` WHERE id = '$id' ";
    $del_query = $_db->prepare($del_sql);
    $del_query->execute();
    echo '<meta http-equiv="refresh" content="0;'.$linkBack.'">'; 
    exit();
    
}


require_once 'header.php'; 
?>
<a href="/task/add" class="btn btn-warning">Add new task</a>
<?php
echo $data;


require_once 'footer.php'; 
?>
