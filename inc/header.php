<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HOPRINT</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
     <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
   $(document).ready(function(){
   window.history.replaceState('','',window.location.href)
   });
</script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
       <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light">
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="index.php">
                        <img src="img/logo.png" alt="logo">
                    </a>
                </div>
                 <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="d-md-none mobile-nav-bar">
               <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                <ul class="navbar-nav">
                    <form method="post">
                        <li class="navbar-item">
                        <div class="form-group">
                        
                       <input type="text" name="cuser" placeholder="Input Id Here" class="form-control">

                        
                        </div>
                    </li>
                    <li class="navbar-item">
                       <button class="btn btn-info" type="submit" name="thisuser"><i class="fas fa-search"></i> Check Up</button>

                    </li>
                    </form>
                    <li class="navbar-item">
                       <b>HOPRINT Library System</b>

                    </li>

                     
                </ul>
            </div>
        </div>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
<?php
if (isset($_POST['thisuser'])) {
   $cuser = $_POST['cuser'];

   $fetch = $conn->query("SELECT * FROM users WHERE id = '$cuser' LIMIT 1");
    $result = $fetch->fetchAll(PDO::FETCH_OBJ);
    $count = $fetch->rowCount();
    if ($count > 0) {
         foreach ($result as $key) {
        $tname = $key->name;
        $address = $key->address;
        $phonenumber = $key->phonenumber;
        $email = $key->email;
        $dateadded = $key->dateadded;
        $image = $key->image;


$fetch2 = $conn->query("SELECT * FROM books WHERE borrower = '$cuser'");
$count2 = $fetch2->rowCount();

$fetch3 = $conn->query("SELECT * FROM journals WHERE borrower = '$cuser'");
$count3 = $fetch3->rowCount();
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#themodal").modal('show');
    });
</script>

    <div class="modal fade" id="themodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Viewing <?php echo"$tname" ?></h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                       <img src="passport/<?php echo"$image" ?>" width="50%">
                       <hr>
                       <p>Name: <?php echo"$tname" ?></p>
                        <p>Address: <?php echo"$address" ?></p>
                        <p>Phone Number: <?php echo"$phonenumber" ?></p>
                        <p>Email: <?php echo"$email" ?></p>
                        <p>Borrowed Books: <?php echo"$count2" ?></p>
                        <p>Borrowed Journals: <?php echo"$count3" ?></p>
                        
                       

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="footer-btn bg-dark-low"
                            data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
}
?>
           