<?php
require('core/connection.php');
include('inc/header.php');
include('inc/sidebar.php');
?>
            <div class="dashboard-content-one">

<?php
if (isset($_GET['mod']) && $_GET['mod'] == 'booksearch') {
    include"pages/searchbooks.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'journalsearch') {
    include"pages/searchjournal.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'projectsearch') {
    include"pages/searchproject.php";
}else{
    include"pages/main.php";
}
?>

<?php 
include('inc/footer.php');
include('inc/loaders.php');
?>
