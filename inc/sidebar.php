 <!-- Sidebar Area Start Here -->
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.php"><img src="img/logo1.png" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item sidebar <?php if(isset($_GET['mod']) && $_GET['mod'] == 'booksearch'){echo"active";} ?>">
                            <a href="?mod=booksearch" class="nav-link"><i class="fas fa-book"></i><span>Search Book</span></a>
                        </li>

                        <li class="nav-item sidebar <?php if(isset($_GET['mod']) && $_GET['mod'] == 'journalsearch'){echo"active";} ?>">
                            <a href="?mod=journalsearch" class="nav-link"><i class="fas fa-list"></i><span>Search Journal</span></a>
                        </li>

                        <li class="nav-item sidebar <?php if(isset($_GET['mod']) && $_GET['mod'] == 'projectsearch'){echo"active";} ?>">
                            <a href="?mod=projectsearch" class="nav-link"><i class="fas fa-file"></i><span>Search Project</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->