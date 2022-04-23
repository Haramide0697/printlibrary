               
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Dashboard</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add New User Area Start Here -->
                                <!-- Dashboard summery Start Here -->
                <div class="row gutters-20">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="flaticon-multiple-users-silhouette text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Users</div>
                                        <?php
                                         $fetch = $conn->query("SELECT * FROM users");
                                        $count = $fetch->rowCount();
                                        ?>
                                        <div class="item-number"><span class="counter" data-num="<?php echo"$count"; ?>"><?php echo"$count"; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue">
                                        <i class="flaticon-books text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Books</div>
                                        <?php
                                         $fetch = $conn->query("SELECT * FROM books");
                                        $count = $fetch->rowCount();
                                        ?>
                                        <div class="item-number"><span class="counter" data-num="<?php echo"$count"; ?>"><?php echo"$count"; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="flaticon-list text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Journals</div>
                                        <?php
                                         $fetch = $conn->query("SELECT * FROM journals");
                                        $count = $fetch->rowCount();
                                        ?>
                                        <div class="item-number"><span class="counter" data-num="<?php echo"$count"; ?>"><?php echo"$count"; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-red">
                                        <i class="flaticon-books text-red"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Project</div>
                                        <?php
                                         $fetch = $conn->query("SELECT * FROM project");
                                        $count = $fetch->rowCount();
                                        ?>
                                        <div class="item-number"><span class="counter" data-num="<?php echo"$count"; ?>"><?php echo"$count"; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue">
                                        <i class="flaticon-books text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Borrowed Books</div>
                                        <?php
                                        $fetch = $conn->query("SELECT * FROM books WHERE borrowed = 'yes'");
                                        $count = $fetch->rowCount();
                                        ?>
                                        <div class="item-number"><span class="counter" data-num="<?php echo"$count"; ?>"><?php echo"$count"; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="flaticon-list text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Borrowed Journals</div>
                                        <?php
                                         $fetch = $conn->query("SELECT * FROM journals WHERE borrowed = 'yes'");
                                        $count = $fetch->rowCount();
                                        ?>
                                        <div class="item-number"><span class="counter" data-num="<?php echo"$count"; ?>"><?php echo"$count"; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard summery End Here -->