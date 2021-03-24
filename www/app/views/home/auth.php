<?php
$_db = DB::getInstanse();

  $result = "";

  if (isset($_POST['sent'])) {

    $login = trim(htmlspecialchars($_POST['login']));
    $srv_password = trim(htmlspecialchars($_POST['pass']));

    if($login == 'admin' && $srv_password == 'admin'){
      
      setcookie('login', $login, time() + 3600 * 24 * 30, '/');
      // echo "<script>self.location='/';</script>";
      header("Location: /");
    }else{
      $result = "<div class='alert alert-danger' role='alert'>Access is denied!!!</div>";
    }  

    }
 ?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/frontend/include/css/bootstrap.min.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body class="text-center">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-4">
          <form method="POST" class="form-signin">
            <img class="mb-4" src="https://starlight27.ru/wp-content/uploads/2018/10/герб-лицей-88.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

            <div class="form-group mb-2">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="login">
            </div> 

            <!-- Пароль -->
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" class="form-control" id="pass" placeholder="Your password">
            </div>

            <input type="submit" class="btn btn-primary" name="sent" value="Submit">
            <p class="mt-5 mb-3 text-muted">© 2017-2021</p>
          </form>
          <!-- Уведомления --> 
          <?=$result?>
        </div>
      </div>
      
    </div>
    


    
  

</body>
</html>