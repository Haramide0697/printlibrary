       
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
                                    <input type="hidden" name="mod" value="journalsearch" class="form-control">
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
    $pagelink = "?mod=journalsearch&name=$sname&volume=$svolume&number=$snumber&classmark=$sclassmark&an=$san&department=$sdepartment&publisher=$spublisher&pop=$spop&yop=$syop&subject=$ssubject&description=$sdescription";

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
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Borrowed</th>
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
                                    <td><?php echo "$subject"; ?></td>
                                    <td><?php echo "$description"; ?></td>
                                    <td><?php echo "$borrowed"; ?></td>
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