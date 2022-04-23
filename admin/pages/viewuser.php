<script>
  function pro(iden,action){
    var dataString = "id="+iden+"&action="+action;
    var confirms = confirm("Are you sure you want to continue?");
    if (confirms == true) {
    $.ajax({
        type: "POST",
        url: "control.php",
        cache : false,
        data : dataString,
        beforeSend : function(){
            $('#loaders').show();
        },
        success : function(response){
            $('#loaders').hide();
            alert(response);
            window.location.reload(1);
        }
    });
}
}
</script>
<?php
if (isset($_POST['update'])) {
    $ident = $_POST['ident'];
    $uname = sanitize($_POST['uname']);
    $uname = sanitize($_POST['uname']);
    $address = sanitize($_POST['address']);
    $pnum = sanitize($_POST['pnum']);
    $email = sanitize($_POST['email']);

               

        $in = array('name' => $uname,
                    'address' => $address, 
                    'phonenumber' => $pnum, 
                    'email' => $email, 
                      );
        update('users',$in,'id',$ident);
        echo "<script>alert('Updated');</script>";
                
}

?>            
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>User Management</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>View Users</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- View New User Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>View User</h3>
                            </div>
                           <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" 
                                data-toggle="dropdown" aria-expanded="false">...</a>
        
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div>
                        <form method="get">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="hidden" name="mod" value="user" class="form-control">
                                    <input type="hidden"   name="link" value="view" class="form-control">
                                    <input type="text" placeholder="Search Here" name="search" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <button class="btn btn-info" type="submit"><i class="fas fa-search"></i> Search</button>
                                </div>
                            </div>
                        </form>
<?php
if (isset($_GET['search'])) {
    $ssearch = $_GET['search'];
    if (!empty($ssearch)) {
        $sssearch = "name LIKE '%$ssearch%' || address LIKE '%$ssearch%' || phonenumber LIKE '%$ssearch%'";
    }else{
        $sssearch = "";
    }

    $searchword = "SELECT * FROM users WHERE $sssearch";
    $pagelink = "?mod=user&link=view&search=$ssearch";

    echo "Search Key: $ssearch"; 
}else{
    $searchword = "SELECT * FROM users";
    $pagelink = "?mod=user&link=view";
}
?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Date Added</th>
                            <th>Image</th>
                            <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                                $page_no = $_GET['page_no'];
                                } else {
                                    $page_no = 1;
                                    }

                                $total_records_per_page = 100;
                                $offset = ($page_no-1) * $total_records_per_page;
                                $previous_page = $page_no - 1;
                                $next_page = $page_no + 1;
                                $adjacents = "2"; 



                                $fetch = $conn->query("$searchword");
                                $result = $fetch->fetchAll(PDO::FETCH_OBJ);
                                $count = $fetch->rowCount();
                                $total_no_of_pages = ceil($count / $total_records_per_page);
                                $second_last = $total_no_of_pages - 1;


                                $fetch = $conn->query("$searchword ORDER BY id DESC LIMIT $offset, $total_records_per_page");
                                $result = $fetch->fetchAll(PDO::FETCH_OBJ);
                                $count = $fetch->rowCount();
                                $sn = $offset+1;
                                if ($count > 0) {
                                    foreach ($result as $key) {
                                        $bid = $key->id;
                                        $name = $key->name;
                                        $address = $key->address;
                                        $phonenumber = $key->phonenumber;
                                        $email = $key->email;
                                        $dateadded = $key->dateadded;
                                        $image = $key->image;
                                        
                                      
                                ?>
                                <tr>
                                    <td><?php echo "$sn"; ?></td>
                                    <td><?php echo "$name"; ?></td>
                                    <td><?php echo "$address"; ?></td>
                                    <td><?php echo "$phonenumber"; ?></td>
                                    <td><?php echo "$email"; ?></td>
                                    <td><?php echo "$dateadded"; ?></td>
                                    <td><a href="#" data-toggle="modal" data-target="#view<?php echo"$bid" ?>"><img src="../passport/<?php echo "$image"; ?>" width="50px"></a></td>
                                    <td><button class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo"$bid" ?>"><i class="fas fa-edit"></i></button><button class="btn btn-danger" onclick="pro('<?php echo"$bid" ?>','deleteuser')"><i class="fas fa-trash"></i></button>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#viewborrow<?php echo"$bid" ?>"><i class="fas fa-eye"></i></button>
                                    </td>


                                    <div class="modal fade" id="viewborrow<?php echo"$bid" ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Report for <?php echo"$name" ?></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                            
                                            <p>Books Borrowed</p>
                                            <div class="row">
                                                <div class="col-4">
                                                    <p>S/N</p>
                                                </div>
                                                <div class="col-4">
                                                    <p>Title</p>
                                                </div>
                                                <div class="col-4">
                                                    <p>Action</p>
                                                </div>
                                            </div>
                                            <?php
                                            $fetch = $conn->query("SELECT * FROM books WHERE borrower = '$bid'");
                                            $result = $fetch->fetchAll(PDO::FETCH_OBJ);
                                            $count = $fetch->rowCount();
                                            $ssn = 1;
                                            if ($count > 0) {
                                            foreach ($result as $key) {
                                                $aid = $key->id;
                                                $title = $key->title;
                                            ?>
                                            <div class="row">
                                                <div class="col-4">
                                                    <p><?php echo "$ssn"; ?></p>
                                                </div>
                                                <div class="col-4">
                                                    <p><?php echo "$title"; ?></p>
                                                </div>
                                                <div class="col-4">
                                                    <p><i class="fas fa-arrow-left" title="return" onclick="pro('<?php echo "$aid"; ?>','returnbook');"></i></p>
                                                </div>
                                            </div>
                                            <?php
                                            $ssn++;
                                            }
                                            }else{
                                                echo "No Book borrowed";
                                            }
                                            ?>
                                            <hr>
                                             <p>Journal Borrowed</p>
                                            <div class="row">
                                                <div class="col-4">
                                                    <p>S/N</p>
                                                </div>
                                                <div class="col-4">
                                                    <p>Title</p>
                                                </div>
                                                <div class="col-4">
                                                    <p>Action</p>
                                                </div>
                                            </div>
                                            <?php
                                            $fetch = $conn->query("SELECT * FROM journals WHERE borrower = '$bid'");
                                            $result = $fetch->fetchAll(PDO::FETCH_OBJ);
                                            $count = $fetch->rowCount();
                                            $ssn = 1;
                                            if ($count > 0) {
                                            foreach ($result as $key) {
                                                $aid = $key->id;
                                                $tname = $key->name;
                                            ?>
                                            <div class="row">
                                                <div class="col-4">
                                                    <p><?php echo "$ssn"; ?></p>
                                                </div>
                                                <div class="col-4">
                                                    <p><?php echo "$tname"; ?></p>
                                                </div>
                                                <div class="col-4">
                                                    <p><i class="fas fa-arrow-left" title="return" onclick="pro('<?php echo "$aid"; ?>','returnjournal');"></i></p>
                                                </div>
                                            </div>
                                            <?php
                                            $ssn++;
                                            }
                                            }else{
                                                echo "No Journal borrowed";
                                            }
                                            ?>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                    <div class="modal fade" id="view<?php echo"$bid" ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Passport for <?php echo"$name" ?></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                            
                                            <img src="passport/<?php echo "$image"; ?>" width="100%">
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                    <div class="modal fade" id="edit<?php echo"$bid" ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editing <?php echo"$name" ?></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                            
                                        <form class="new-added-form" method="post" id="adding">
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                                    <label>Name *</label>
                                                    <input type="hidden" name="ident" value="<?php echo"$bid"; ?>">
                                                    <input type="text" placeholder="" required="" value="<?php echo"$name"; ?>" id="title" name="uname" class="form-control">
                                                </div>
                                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                                    <label>Address *</label>
                                                    <input type="text" placeholder="" required="" value="<?php echo"$address"; ?>" id="author" name="address" class="form-control">
                                                </div>
                                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                                    <label>Phone Number *</label>
                                                    <input type="text" placeholder="" required="" value="<?php echo"$phonenumber"; ?>" id="date" name="pnum" class="form-control">
                                                </div>
                                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                                    <label>Email *</label>
                                                    <input type="email" placeholder="" required="" value="<?php echo"$email"; ?>" id="supervisor" name="email" class="form-control">
                                                </div>
                                                <div class="col-md-3 d-none d-xl-block form-group">
                                                   
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="footer-btn bg-dark-low"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" name="update" class="footer-btn bg-linkedin">Save
                                                    Changes</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                </tr>
                                <?php
                                $sn++;
                                    }
                                }
                                ?>
                            </tbody>
                            </table>

                            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                            <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
                            </div>




                            <ul class="pagination">
                                <?php // if($page_no > 1){ echo "<li><a href='$pagelink&page_no=1'>First Page</a></li>"; } ?>
                                
                                <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                                <a <?php if($page_no > 1){ echo "href='$pagelink&page_no=$previous_page'"; } ?>>Previous</a>
                                </li>
                                   
                                <?php 
                                if ($total_no_of_pages <= 10){       
                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                        if ($counter == $page_no) {
                                       echo "<li class='active'><a>$counter</a></li>";  
                                            }else{
                                       echo "<li><a href='$pagelink&page_no=$counter'>$counter</a></li>";
                                            }
                                    }
                                }
                                elseif($total_no_of_pages > 10){
                                    
                                if($page_no <= 4) {         
                                 for ($counter = 1; $counter < 8; $counter++){       
                                        if ($counter == $page_no) {
                                       echo "<li class='active'><a>$counter</a></li>";  
                                            }else{
                                       echo "<li><a href='$pagelink&page_no=$counter'>$counter</a></li>";
                                            }
                                    }
                                    echo "<li><a>...</a></li>";
                                    echo "<li><a href='$pagelink&page_no=$second_last'>$second_last</a></li>";
                                    echo "<li><a href='$pagelink&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                    }

                                 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
                                    echo "<li><a href='$pagelink&page_no=1'>1</a></li>";
                                    echo "<li><a href='$pagelink&page_no=2'>2</a></li>";
                                    echo "<li><a>...</a></li>";
                                    for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
                                       if ($counter == $page_no) {
                                       echo "<li class='active'><a>$counter</a></li>";  
                                            }else{
                                       echo "<li><a href='$pagelink&page_no=$counter'>$counter</a></li>";
                                            }                  
                                   }
                                   echo "<li><a>...</a></li>";
                                   echo "<li><a href='$pagelink&page_no=$second_last'>$second_last</a></li>";
                                   echo "<li><a href='$pagelink&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                                        }
                                    
                                    else {
                                    echo "<li><a href='$pagelink&page_no=1'>1</a></li>";
                                    echo "<li><a href='$pagelink&page_no=2'>2</a></li>";
                                    echo "<li><a>...</a></li>";

                                    for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                      if ($counter == $page_no) {
                                       echo "<li class='active'><a>$counter</a></li>";  
                                            }else{
                                       echo "<li><a href='$pagelink&page_no=$counter'>$counter</a></li>";
                                            }                   
                                            }
                                        }
                                }
                            ?>
                                
                                <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                                <a <?php if($page_no < $total_no_of_pages) { echo "href='$pagelink&page_no=$next_page'"; } ?>>Next</a>
                                </li>
                                <?php if($page_no < $total_no_of_pages){
                                    echo "<li><a href='$pagelink&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                                    } ?>
                            </ul>

                        </div>
                    </div>
                </div>