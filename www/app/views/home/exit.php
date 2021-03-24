<?php 
	session_start();
	unset($_COOKIE['login']);
    setcookie('login', null, -1, '/'); 
	header("Location: /");