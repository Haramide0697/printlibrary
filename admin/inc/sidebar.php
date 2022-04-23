 <!-- Sidebar Area Start Here -->
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.php"><img src="img/logo1.png" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                        </li>
                         <li class="nav-item sidebar-nav-item <?php if(isset($_GET['mod']) && $_GET['mod'] == 'department'){echo"active";} ?>">
                            <a href="#" class="nav-link"><i class="fas fa-building"></i><span>Department Management</span></a>
                            <ul class="nav sub-group-menu <?php if(isset($_GET['mod']) && $_GET['mod'] == 'department'){echo"menu-open";} ?>" <?php if(isset($_GET['mod']) && $_GET['mod'] == 'department'){echo'style="display:block"';} ?>>
                                <li class="nav-item">
                                    <a href="?mod=department&link=add" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'add' && isset($_GET['mod']) && $_GET['mod'] == "department"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>Add Departments</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?mod=department&link=view" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'view' && isset($_GET['mod']) && $_GET['mod'] == "department"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>View Departments</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item <?php if(isset($_GET['mod']) && $_GET['mod'] == 'book'){echo"active";} ?>">
                            <a href="#" class="nav-link"><i class="fas fa-book"></i><span>Book Management</span></a>
                            <ul class="nav sub-group-menu <?php if(isset($_GET['mod']) && $_GET['mod'] == 'book'){echo"menu-open";} ?>" <?php if(isset($_GET['mod']) && $_GET['mod'] == 'book'){echo'style="display:block"';} ?>>
                                <li class="nav-item">
                                    <a href="?mod=book&link=add" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'add' && isset($_GET['mod']) && $_GET['mod'] == "book"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>Add Book</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?mod=book&link=view" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'view' && isset($_GET['mod']) && $_GET['mod'] == "book"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>View Book</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?mod=book&link=search" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'search' && isset($_GET['mod']) && $_GET['mod'] == "book"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>Search Book</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item sidebar-nav-item <?php if(isset($_GET['mod']) && $_GET['mod'] == 'journal'){echo"active";} ?>">
                            <a href="#" class="nav-link"><i class="fas fa-list"></i><span>Journal Management</span></a>
                            <ul class="nav sub-group-menu <?php if(isset($_GET['mod']) && $_GET['mod'] == 'journal'){echo"menu-open";} ?>" <?php if(isset($_GET['mod']) && $_GET['mod'] == 'journal'){echo'style="display:block"';} ?>>
                                <li class="nav-item">
                                    <a href="?mod=journal&link=add" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'add' && isset($_GET['mod']) && $_GET['mod'] == "journal"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>Add Journal</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?mod=journal&link=view" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'view' && isset($_GET['mod']) && $_GET['mod'] == "journal"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>View Journal</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?mod=journal&link=search" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'search' && isset($_GET['mod']) && $_GET['mod'] == "journal"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>Search Journal</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item sidebar-nav-item <?php if(isset($_GET['mod']) && $_GET['mod'] == 'project'){echo"active";} ?>">
                            <a href="#" class="nav-link"><i class="fas fa-file"></i><span>Project Management</span></a>
                            <ul class="nav sub-group-menu <?php if(isset($_GET['mod']) && $_GET['mod'] == 'project'){echo"menu-open";} ?>" <?php if(isset($_GET['mod']) && $_GET['mod'] == 'project'){echo'style="display:block"';} ?>>
                                <li class="nav-item">
                                    <a href="?mod=project&link=add" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'add' && isset($_GET['mod']) && $_GET['mod'] == "project"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>Add Project</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?mod=project&link=view" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'view' && isset($_GET['mod']) && $_GET['mod'] == "project"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>View Project</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?mod=project&link=search" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'search' && isset($_GET['mod']) && $_GET['mod'] == "project"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>Search Project</a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item sidebar-nav-item <?php if(isset($_GET['mod']) && $_GET['mod'] == 'user'){echo"active";} ?>">
                            <a href="#" class="nav-link"><i class="fas fa-users"></i><span>User Management</span></a>
                            <ul class="nav sub-group-menu <?php if(isset($_GET['mod']) && $_GET['mod'] == 'user'){echo"menu-open";} ?>" <?php if(isset($_GET['mod']) && $_GET['mod'] == 'user'){echo'style="display:block"';} ?>>
                                <li class="nav-item">
                                    <a href="?mod=user&link=add" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'add' && isset($_GET['mod']) && $_GET['mod'] == "user"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>Add user</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?mod=user&link=view" class="nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'view' && isset($_GET['mod']) && $_GET['mod'] == "user"){echo"menu-active";} ?>"><i class="fas fa-angle-right"></i>View user</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->