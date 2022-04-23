        
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Project Management</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Search Projects</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Search New Project Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Search Project</h3>
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
                                    <input type="hidden" name="mod" value="projectsearch" class="form-control">
                                    <input type="text" placeholder="Title" name="title" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Author" name="author" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Date" name="date" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Supervisor" name="supervisor" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="text" placeholder="Department" name="department" class="form-control">
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
if (isset($_GET['title']) && isset($_GET['author']) && isset($_GET['date']) && isset($_GET['supervisor']) && isset($_GET['department']) && isset($_GET['description'])) {
    
    $stitle = $_GET['title'];
    if (!empty($stitle)) {
        $sstitle = "AND title LIKE '%$stitle%'";
    }else{
        $sstitle = "";
    }
    $sauthor = $_GET['author'];
     if (!empty($sauthor)) {
        $ssauthor = "AND author LIKE '%$sauthor%'";
    }else{
         $ssauthor = "";
    }
    $sdate = $_GET['date'];
     if (!empty($sdate)) {
        $ssdate = "AND date LIKE '%$sdate%'";
    }else{
        $ssdate = "";
    }
    $ssupervisor = $_GET['supervisor'];
     if (!empty($ssupervisor)) {
        $sssupervisor = "AND accessionno LIKE '%$ssupervisor%'";
    }else{
        $sssupervisor = "";
    }
    $sdepartment = $_GET['department'];
     if (!empty($sdepartment)) {
        $ssdepartment = "AND department LIKE '%$sdepartment%'";
    }else{
        $ssdepartment = "";
    }
    $sdescription = $_GET['description'];
     if (!empty($sdescription)) {
        $ssdescription = "AND description LIKE '%$sdescription%'";
    }else{
        $ssdescription = "";
    }


    $searchword = "SELECT * FROM project WHERE id > 0 $sstitle $ssauthor $ssdate $sssupervisor $ssdepartment $ssdescription";
    $pagelink = "?mod=projectsearch&title=$stitle&author=$sauthor&date=$sdate&supervisor=$ssupervisor&department=$sdepartment&description=$sdescription";

?>
<p>Search Key: <?php echo "(title=$stitle), (author=$sauthor), (date=$sdate), (supervisor=$ssupervisor), (department=$sdepartment), (description=$sdescription)"; ?> </p>
<div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Supervisor</th>
                            <th>Department</th>
                            <th>Description</th>
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
                                        $title = $key->title;
                                        $author = $key->author;
                                        $supervisor = $key->supervisor;
                                        $department = $key->department;
                                        $date = $key->date;
                                        $dateadded = $key->dateadded;
                                        $description = $key->description;
                                        
                                      
                                ?>
                                <tr>
                                    <td><?php echo "$sn"; ?></td>
                                    <td><?php echo "$title"; ?></td>
                                    <td><?php echo "$author"; ?></td>
                                    <td><?php echo "$date"; ?></td>
                                    <td><?php echo "$supervisor"; ?></td>
                                    <td><?php echo "$department"; ?></td>
                                    <td><?php echo "$description"; ?></td>

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
                                <?php // if($page_no > 1){ echo "<li><a href='?mod=book&link=Search&page_no=1'>First Page</a></li>"; } ?>
                                
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

                    <?php
}
?>
                </div>