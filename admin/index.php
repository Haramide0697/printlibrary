<?php
session_start();
require('../core/connection.php');
if(!logged_in()){
redirect('login.php');
}
include('inc/header.php');
include('inc/sidebar.php');
?>
<div class="dashboard-content-one">

<?php
if (isset($_GET['mod']) && $_GET['mod'] == 'department' && isset($_GET['link']) && $_GET['link'] == 'add') {
    include"pages/adddepartment.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'department' && isset($_GET['link']) && $_GET['link'] == 'view') {
    include"pages/viewdepartment.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'book' && isset($_GET['link']) && $_GET['link'] == 'add') {
    include"pages/addbook.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'book' && isset($_GET['link']) && $_GET['link'] == 'view') {
    include"pages/viewbook.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'book' && isset($_GET['link']) && $_GET['link'] == 'search') {
    include"pages/searchbooks.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'journal' && isset($_GET['link']) && $_GET['link'] == 'add') {
    include"pages/addjournal.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'journal' && isset($_GET['link']) && $_GET['link'] == 'view') {
    include"pages/viewjournal.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'journal' && isset($_GET['link']) && $_GET['link'] == 'search') {
    include"pages/searchjournal.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'project' && isset($_GET['link']) && $_GET['link'] == 'add') {
    include"pages/addproject.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'project' && isset($_GET['link']) && $_GET['link'] == 'view') {
    include"pages/viewproject.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'project' && isset($_GET['link']) && $_GET['link'] == 'search') {
    include"pages/searchproject.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'user' && isset($_GET['link']) && $_GET['link'] == 'add') {
    include"pages/adduser.php";
}elseif (isset($_GET['mod']) && $_GET['mod'] == 'user' && isset($_GET['link']) && $_GET['link'] == 'view') {
    include"pages/viewuser.php";
}else{
    include"pages/main.php";
}
?>
<div class="ui-modal-box">
    <div class="modal-box">
        <div class="modal notification-modal fade" id="modal-success" tabindex="-1"role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="item-title">Success</h5>
                <p id="inputHeres" style="color:green"></p>
                <div class="close-btn">
                    <button type="button" class="close-btn" data-dismiss="modal"
                        aria-label="Close">
                        Dismiss
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal notification-modal fade" id="modal-error" tabindex="-1"role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="item-title">Error</h5>
                <p id="inputHered" style="color:red"></p>
                <div class="close-btn">
                    <button type="button" class="close-btn" data-dismiss="modal"
                        aria-label="Close">
                        Dismiss
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    
</div>

<?php 
include('inc/footer.php');
include('inc/loaders.php');
?>
