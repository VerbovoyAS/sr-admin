<?php
    if($_COOKIE['login'] == ""){
        if($_GET['url'] != 'home/auth'){
            echo "<script>self.location='/home/auth';</script>";
        }
    }
