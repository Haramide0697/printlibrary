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
$thisday = date('d-m-Y');
if (isset($_POST['update'])) {
   $ident = $_POST['ident'];
   $aname = $_POST['aname'];
    $volume = $_POST['volume'];
    $number = $_POST['number'];
    $cm = $_POST['cm'];
    $an = $_POST['an'];
    $department = $_POST['department'];
    $publisher = $_POST['publisher'];
    $pop = $_POST['pop'];
    $yop = $_POST['yop'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $article = $_POST['article'];

            $in = array('name' => $aname, 
                        'volume' => $volume, 
                        'number' => $number, 
                        'classmark' => $cm, 
                        'accessionno' => $an, 
                        'department' => $department, 
                        'publisher' => $publisher, 
                        'pop' => $pop, 
                        'yop' => $yop, 
                        'article' => $article, 
                        'subject' => $subject, 
                        'description' => $description, 
                        'borrowed' => 'no', 
        ); 
       update('journals',$in,'id',$ident);
        echo "<script>alert('Updated');</script>";             
}


if (isset($_POST['return'])) {
    $ident = $_POST['identi'];
   
    
        
            $in = array('borrowed' => 'no',
                        'borrower' => '', 
                        'dateborrowed' => '', 
        );
            update('journals',$in,'id',$ident);
            echo "<script>alert('Returned');</script>";
                
}

if (isset($_POST['borrow'])) {
    $user = $_POST['user'];
    $ident = $_POST['theid'];
   
    
        
            $in = array('borrowed' => 'yes',
                        'borrower' => $user, 
                        'dateborrowed' => $thisday, 
        );
            update('journals',$in,'id',$ident);
            echo "<script>alert('Borrowed');</script>";
                
}

?>            
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Journal Management</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Search Journals</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Search New Journal Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Search Journals</h3>
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
                        <h4>Search Here</h4>
                        <form method="get">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="hidden" name="mod" value="journal" class="form-control">
                                    <input type="hidden"   name="link" value="search" class="form-control">
                                    <input type="text" placeholder="Name" name="name" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Volume" name="volume" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Number" name="number" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="classmark" name="classmark" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Accession Number" name="an" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Department" name="department" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Publisher" name="publisher" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Place of Publication" name="pop" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Year of Publication" name="yop" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Subject" name="subject" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Description" name="description" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <button class="btn btn-info" type="submit"><i class="fas fa-search"></i> Search</button>
                                </div>
                            </div>
                        </form>

<?php
if (isset($_GET['name']) && isset($_GET['volume']) && isset($_GET['number']) && isset($_GET['classmark']) && isset($_GET['an']) && isset($_GET['department']) && isset($_GET['publisher']) && isset($_GET['pop']) && isset($_GET['yop']) && isset($_GET['subject']) && isset($_GET['description'])) {
    
    $sname = $_GET['name'];
    if (!empty($sname)) {
        $ssname = "AND name LIKE '%$sname%'";
    }else{
        $ssname = "";
    }
    $svolume = $_GET['volume'];
    if (!empty($svolume)) {
        $ssvolume = "AND volume LIKE '%$svolume%'";
    }else{
        $ssvolume = "";
    }
    $snumber = $_GET['number'];
     if (!empty($snumber)) {
        $ssnumber = "AND number LIKE '%$snumber%'";
    }else{
         $ssnumber = "";
    }
    $sclassmark = $_GET['classmark'];
     if (!empty($sclassmark)) {
        $ssclassmark = "AND classmark LIKE '%$sclassmark%'";
    }else{
        $ssclassmark = "";
    }
    $san = $_GET['an'];
     if (!empty($san)) {
        $ssan = "AND accessionno LIKE '%$san%'";
    }else{
        $ssan = "";
    }
    $sdepartment = $_GET['department'];
     if (!empty($sdepartment)) {
        $ssdepartment = "AND department LIKE '%$sdepartment%'";
    }else{
        $ssdepartment = "";
    }
    $spublisher = $_GET['publisher'];
     if (!empty($spublisher)) {
        $sspublisher = "AND publisher LIKE '%$spublisher%'";
    }else{
        $sspublisher = "";
    }
    $spop = $_GET['pop'];
     if (!empty($spop)) {
        $sspop = "AND pop LIKE '%$spop%'";
    }else{
        $sspop = "";
    }
    $syop = $_GET['yop'];
     if (!empty($syop)) {
        $ssyop = "AND yop LIKE '%$syop%'";
    }else{
        $ssyop = "";
    }
    $ssubject = $_GET['subject'];
     if (!empty($ssubject)) {
        $sssubject = "AND subject LIKE '%$ssubject%'";
    }else{
        $sssubject = "";
    }
    $sdescription = $_GET['description'];
     if (!empty($sdescription)) {
        $ssdescription = "AND description LIKE '%$sdescription%'";
    }else{
        $ssdescription = "";
    }


    $searchword = "SELECT * FROM journals WHERE id > 0 $ssname $ssvolume $ssnumber $ssclassmark $ssan $ssdepartment $sspublisher $sspop $ssyop $sssubject $ssdescription";
    $pagelink = "?mod=journal&link=search&name=$sname&volume=$svolume&number=$snumber&classmark=$sclassmark&an=$san&department=$sdepartment&publisher=$spublisher&pop=$spop&yop=$syop&subject=$ssubject&description=$sdescription";

?>
<p>Search Key: <?php echo "(name=$sname), (volume=$svolume), (number=$snumber), (classmark=$sclassmark), (an=$san), (department=$sdepartment), (publisher=$spublisher), (pop=$spop), (yop=$syop), (subject=$ssubject), (description=$sdescription)"; ?> </p>
<div class="table-responsive">
                            <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Volume</th>
                            <th>Number</th>
                            <th>Classmark</th>
                            <th>Accession Number</th>
                            <th>Department</th>
                            <th>Publisher</th>
                            <th>Place of Publication</th>
                            <th>Year of Publication</th>
                            <th>Date Entered</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Borrowed</th>
                            <th>Date Borrowed</th>
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
                                        $iden = $key->iden;
                                        $name = $key->name;
                                        $volume = $key->volume;
                                        $number = $key->number;
                                        $classmark = $key->classmark;
                                        $accessionno = $key->accessionno;
                                        $department = $key->department;
                                        $publisher = $key->publisher;
                                        $pop = $key->pop;
                                        $yop = $key->yop;
                                        $dateentered = $key->dateentered;
                                        $article = $key->article;
                                        $subject = $key->subject;
                                        $description = $key->description;
                                        $borrowed = $key->borrowed;
                                        $dateborrowed = $key->dateborrowed;
                                        $borrower = $key->borrower;
                                        $thisday = date('d-m-Y');
                                      
                                ?>
                                <tr>
                                    <td><?php echo "$sn"; ?></td>
                                    <td><?php echo "$name"; ?></td>
                                    <td><?php echo "$volume"; ?></td>
                                    <td><?php echo "$number"; ?></td>
                                    <td><?php echo "$classmark"; ?></td>
                                    <td><?php echo "$accessionno"; ?></td>
                                    <td><?php echo "$department"; ?></td>
                                    <td><?php echo "$publisher"; ?></td>
                                    <td><?php echo "$pop"; ?></td>
                                    <td><?php echo "$yop"; ?></td>
                                    <td><?php echo "$dateentered"; ?></td>
                                    <td><?php echo "$subject"; ?></td>
                                    <td><?php echo "$description"; ?></td>
                                    <td><?php echo "$borrowed"; ?></td>
                                    <td><?php echo "$dateborrowed"; ?></td>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo"$bid" ?>"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger" onclick="pro('<?php echo"$iden"; ?>','deletejournal')"><i class="fas fa-trash"></i></button>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#view<?php echo"$bid" ?>"><i class="fas fa-eye"></i></button>
                                    </td>


                            <div class="modal fade" id="view<?php echo"$bid" ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Viewing <?php echo"$name" ?></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                               if ($borrowed == 'yes') {
                                                $fetch = $conn->query("SELECT * FROM users WHERE id = '$borrower' LIMIT 1");
                                                $result = $fetch->fetchAll(PDO::FETCH_OBJ);
                                                $count = $fetch->rowCount();
                                                $sn = $offset+1;
                                                if ($count > 0) {
                                                    foreach ($result as $key) {
                                                        $tname = $key->name;
                                                        $address = $key->address;
                                                        $phonenumber = $key->phonenumber;
                                                        $email = $key->email;
                                                        $dateadded = $key->dateadded;
                                                        $image = $key->image;
                                                $dthisday = new DateTime($thisday);
                                                $ddateborrowed = new DateTime($dateborrowed);
                                                $diffdate = date_diff($dthisday,$ddateborrowed);
                                                $days = $diffdate->days;
                                                if ($days > 30) {
                                                $overdue = 'yes';
                                                $overduedays = $days-30;
                                                }else{
                                                 $overdue = 'no';
                                                $overduedays = 0;   
                                                }
                                                ?>
                                            <form class="new-added-form" method="post" id="adding">
                                            <div class="modal-body">
                                               <input type="hidden" name="identi" value="<?php echo"$bid" ?>">
                                                <p>Status: Borrowed</p>
                                                <p>Borrowed By: <?php echo"$tname" ?></p>
                                                <p>Address: <?php echo"$address" ?></p>
                                                <p>Phone Number: <?php echo"$phonenumber" ?></p>
                                                <p>Borrowed By: Borrowed</p>
                                                <p>Date Borrowed: <?php echo"$dateborrowed" ?></p>
                                                <p>Number of days: <?php echo $diffdate->days; ?></p>
                                                <p>Overdue: <?php echo"$overdue" ?></p>
                                                <p>Number of days Overdue: <?php echo $overduedays; ?></p>

                                               
                        
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="footer-btn bg-dark-low"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" name="return" class="footer-btn bg-linkedin">Return</button>
                                            </div>
                                        </form>
                                         <?php
                                            }
                                        }
                                       }elseif ($borrowed == 'no') {
                                        ?>
                                        <form class="new-added-form" method="post" id="adding">
                                            <div class="modal-body">
                                               <input type="hidden" name="identi" value="<?php echo"$bid" ?>">
                                                <p>Status: Available</p>
                                                <div class="col-12 form-group">
                                                    <input type="hidden" name="theid" value="<?php echo"$bid" ?>">
                                                        <label>Borrow User *</label>
                                                        <select class="form-control" name="user" id="user" required="">
                                                            <option value="">Please Select User *</option>
                                                            <?php
                                                        $fetch = $conn->query("SELECT * FROM users order by name ASC");
                                                        $result = $fetch->fetchAll(PDO::FETCH_OBJ);
                                                        $count = $fetch->rowCount();
                                                        if ($count > 0) {
                                                        foreach ($result as $key) {
                                                            $identi = $key->id;
                                                            $name = $key->name;
                                                        ?>
                                                        <option value="<?php echo $identi; ?>"><?php echo $name ?></option>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>

                                               
                        
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="footer-btn bg-dark-low"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" name="borrow" class="footer-btn bg-linkedin">Borrow</button>
                                            </div>
                                        </form>
                                        <?php
                                       }
                                               ?>
                                        </div>
                                    </div>
                                </div>


                                    <div class="modal fade" id="edit<?php echo"$bid"; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editing <?php echo"$name"; ?></h5>
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
                                    <input type="text" placeholder="" required="" value="<?php echo"$name"; ?>" id="aname" name="aname" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Volume *</label>
                                    <input type="text" placeholder="" required="" value="<?php echo"$volume"; ?>" id="volume" name="volume" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Number *</label>
                                    <input type="text" placeholder="" required="" value="<?php echo"$number"; ?>" id="number" name="number" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class Mark *</label>
                                    <input type="text" placeholder="" required="" value="<?php echo"$classmark"; ?>" id="cm" name="cm" class="form-control">
                                </div>
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Accession Number *</label>
                                    <input type="text" placeholder="" required="" value="<?php echo"$accessionno"; ?>" id="an" name="an" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Department *</label>
                                    <select class="form-control" name="department" id="department">
                                        <option value="">Please Select Department *</option>
                                        <?php
                                    $fetch = $conn->query("SELECT * FROM department order by name ASC");
                                    $result = $fetch->fetchAll(PDO::FETCH_OBJ);
                                    $count = $fetch->rowCount();
                                    if ($count > 0) {
                                    foreach ($result as $key) {
                                        $ident = $key->id;
                                        $name = $key->name;
                                    ?>
                                    <option value="<?php echo $name ?>" <?php if($department == $name){echo "selected";} ?>><?php echo $name ?></option>
                                    <?php
                                    }
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Publisher</label>
                                    <input type="text" placeholder="" required="" value="<?php echo"$publisher"; ?>" id="publisher" name="publisher" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Place of Publication *</label>
                                    <input type="text" placeholder="" required="" value="<?php echo"$pop"; ?>" id="pop" name="pop" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Year of Publication*</label>
                                    <input type="text" placeholder="" required="" value="<?php echo"$yop"; ?>" id="yop" name="yop" class="form-control">
                                </div>
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Subject*</label>
                                    <textarea class="form-control" name="subject" id="subject"><?php echo "$subject"; ?></textarea>
                                </div>
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Description*</label>
                                    <textarea class="form-control" name="description" id="description"><?php echo "$description"; ?></textarea>
                                </div>
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Number of Article*</label>
                                    <input type="number" name="article" id="article" class="form-control" required="" value="<?php echo"$article"; ?>" min="0">
                                </div>
                                <div id="allArticle" class="col-12">
                                    <div class="row">
                                        <div class="col-1">
                                            <p>S/N</p>
                                        </div>
                                        <div class="col-3">
                                            <p>Author</p>
                                        </div>
                                        <div class="col-3">
                                            <p>Page</p>
                                        </div>
                                        <div class="col-3">
                                            <p>Title</p>
                                        </div>
                                        <div class="col-2">
                                            <p>Action</p>
                                        </div>
                                    </div>
                                    <?php
                                    $fetch = $conn->query("SELECT * FROM article WHERE iden = '$iden'");
                                    $result = $fetch->fetchAll(PDO::FETCH_OBJ);
                                    $count = $fetch->rowCount();
                                    $ssn = 1;
                                    if ($count > 0) {
                                    foreach ($result as $key) {
                                        $aid = $key->id;
                                        $author = $key->author;
                                        $title = $key->title;
                                        $page = $key->page;
                                    ?>
                                    <div class="row">
                                        <div class="col-1">
                                            <p><?php echo "$ssn"; ?></p>
                                        </div>
                                        <div class="col-3">
                                            <p><?php echo "$author"; ?></p>
                                        </div>
                                        <div class="col-3">
                                            <p><?php echo "$page"; ?></p>
                                        </div>
                                        <div class="col-3">
                                            <p><?php echo "$title"; ?></p>
                                        </div>
                                        <div class="col-2">
                                            <p><i class="fas fa-trash" title="delete" onclick="pro('<?php echo "$aid"; ?>','deletearticle');"></i></p>
                                        </div>
                                    </div>
                                    <?php
                                    $ssn++;
                                    }
                                    }
                                    ?>
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
                                <?php // if($page_no > 1){ echo "<li><a href='$pagelinkch&page_no=1'>First Page</a></li>"; } ?>
                                
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


<?php
}
?>
                        



                    </div>
                </div>