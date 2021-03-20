<?php
require_once 'header.php'; 
?>
<style>
    .grid-sw {
        display: grid;
        grid-auto-flow: column;
        grid-gap: 3px;
        grid-template-rows: 50px auto 50px 50px;
        grid-template-columns: repeat(24, 1fr);
        
    }  
</style>
<?php
if(is_array($data) == true){
    echo $data[2];
    echo $data[0];
    echo $data[1];
}

if(is_array($data) == false){
    echo $data;
}

require_once 'footer.php'; 
?>
