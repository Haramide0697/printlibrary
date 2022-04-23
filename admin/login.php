<?php
require('../core/connection.php');



 if(isset($_POST['submit'])){
    $username = sanitize($_POST['username']);
    $password = $_POST['password'];
    $hash = sha1(md5($password));

    if(empty($username) || empty($password)){
        echo"<script>alert('All fields must be filled to login')</script>";
      $error = "All fields must be filled to login";
    }else{
      $verify = get_alias('admin','username',$username,'password',$hash);
      if($verify->rowCount() > 0){
        $fetch = $verify->fetchAll(PDO::FETCH_OBJ);
        foreach($fetch as $log){
          $id = $log->id;
          $user = $log->username;


          $encode_id = md5($id);
          session_start();
          $_SESSION['is_admin'] = $encode_id; 
          $_SESSION['username'] = $username; 
          $_SESSION['admin_id'] = $id; 

          redirect('index.php');
      }
      }else{
        echo"<script>alert('Invalid login credentials. Try again')</script>";
        $error = "Invalid login credentials. Try again";
      }
    }
  }

?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HOPRINT | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="../fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../css/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- Modernize js -->
    <script src="../js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Login Page Start Here -->
    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo">
                    <img src="../img/logo2.png" alt="logo">
                </div>
                <form class="login-form" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" placeholder="Enter usrename" name="username" class="form-control">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Enter password" name="password" class="form-control">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="login-btn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Login Page End Here -->
    <!-- jquery-->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="../js/plugins.js"></script>
    <!-- Popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="../js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="../js/main.js"></script>

</body>

</html>