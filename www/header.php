<?php
$title = '';

if($_GET['url'] == ''){
    $title = 'Starlight';
}else{
    $get_url = $_GET['url'];
    $url = explode('/',$get_url);
    foreach($url as $l){
      $title .= $l.' ';
    }
}
?>

<!DOCTYPE html>
<html lang="RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
        require_once 'head.php'; 
    ?>
    <title><?=$title?> </title>
   <!-- JS Скрипт для таблиц -->
   <script type="text/javascript" class="init">
            $(document).ready(function() {
            $('#example').DataTable( {
                scrollY:        '60vh',
                scrollCollapse: true,
                paging:         false
            } );
        } );
	</script>   
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/">StarLight</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="/">Sign out</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            
            <nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="text-center">
                    <img src="http://localhost/frontend/include/images/icon/person.png" alt="..." class="rounded-circle w-25 m-3">         
                    <h3>Привет Юзер</h3> 
                </div>
                <div class="sidebar-sticky pt-2">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                            <img src="http://localhost/frontend/include/images/icon/dashboard.svg" width="24" height="24">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Wiki/">
                            <img src="http://localhost/frontend/include/images/icon/lock.svg" width="24" height="24">
                            Wiki
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="http://localhost/Network/" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="http://localhost/frontend/include/images/icon/globe.svg" width="24" height="24">
                            Network
                        </a>
                        <ul class="nav-item">
                            <li class="nav">
                                <a class="nav-link" href="http://localhost/Network/block/A/">Block A</a>
                            </li>
                            <li class="nav">
                                <a class="nav-link" href="http://localhost/Network/block/B/">Block B</a>
                            </li>
                            <li class="nav">
                                <a class="nav-link" href="http://localhost/Network/block/V/">Block V</a>
                            </li>
                            <li class="nav">
                                <a class="nav-link" href="http://localhost/Network/block/G/">Block G</a>
                            </li>
                            <li class="nav">
                                <a class="nav-link" href="http://localhost/Network/block/D/">Block D</a>
                            </li>
                            <hr>
                            <li class="nav">
                                <a class="nav-link" href="http://localhost/Network/">All network</a>
                            </li>
                        </ul>
                       
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/ListSrv/">
                            <img src="http://localhost/frontend/include/images/icon/align-justify.svg" width="24" height="24">
                            List
                        </a>
                    </li>
                    <li >
                        <a class="nav-link" href="http://localhost/map">
                            <img src="http://localhost/frontend/include/images/icon/map.svg" width="24" height="24">
                            Map Network
                        </a>
                        
                        <ul class="nav-item">
                            <li class="nav">
                                <a class="nav-link" href="#">Map Network</a>
                            </li>
                        </ul>
                       
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/task">
                            <img src="http://localhost/frontend/include/images/icon/check-square.svg" width="24" height="24"> 
                            Task's
                        </a>
                    </li>
                    
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><?=$title?></h1>
                    <!-- Добавляем кнопку ADD если находимся на странице Wiki -->
                    <?php if(strripos($_GET['url'], 'wiki') !== false):?>
                        <a href="/Wiki/add" class="btn btn-success">Add</a>
                    <?php elseif(strripos($_GET['url'], 'listsrv') !== false):?>
                        <a href="/ListSRV/add" class="btn btn-success">Add</a>    
                    <?php endif;?>
                    
                </div>