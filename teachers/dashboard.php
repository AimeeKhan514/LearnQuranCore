<?php
require_once("../inc/admin-top.php");
if(isset($_SESSION["msg"])){
    echo $_SESSION["msg"];
    unset($_SESSION["msg"]);
}
?>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <?php
require_once("../inc/admin-headerT.php")
?>

 
        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php
// require_once("../inc/admin-sidebarT.php")
?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Classes</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">
                                        <?php
                                    //    echo getTotalRecords($conn, 'categories');
                                        ?>
                                    </h2>
                                    <!-- <p class="text-white mb-0">Jan - March 2019</p> -->
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-bars"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Teachers</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">
                                        <?php
                                    //    echo getTotalRecords($conn, 'subcategories');
                                        ?>
                                    </h2>
                                    <!-- <p class="text-white mb-0">Jan - March 2019</p> -->
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-list"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Students</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">
                                        <?php
                                    //    echo getTotalRecords($conn, 'posts');
                                        ?>
                                    </h2>
                                    <!-- <p class="text-white mb-0">Jan - March 2019</p> -->
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-copy"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Users</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">
                                        <?php
                                    //    echo getTotalRecords($conn, 'users');
                                        ?>
                                    </h2>
                                    <!-- <p class="text-white mb-0">Jan - March 2019</p> -->
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <a href="manage-categories" class="col-lg-3">
                        <div class="card card-widget">
                            <div class="card-body gradient-9">
                                <div class="media">
                                    <span class="card-widget__icon"><i class="icon-menu"></i></span>
                                    <div class="media-body">
                                        <h2 class="card-widget__title">
                                            <?php 
                                            // echo getTotalRecords($conn, 'categories','1');?>A
                                            <?php
                                            //  echo getTotalRecords($conn, 'categories','0');?>D
                                        </h2>
                                        <h5 class="card-widget__subtitle">Add Teachers</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="manage-sub-categories" class="col-lg-3">
                        <div class="card card-widget">
                            <div class="card-body gradient-3">
                                <div class="media">
                                    <span class="card-widget__icon"><i class="icon-list"></i></span>
                                    <div class="media-body">
                                        <h2 class="card-widget__title">
                                        <?php 
                                        // echo getTotalRecords($conn, 'subcategories','1');?>A
                                            <?php
                                            //  echo getTotalRecords($conn, 'subcategories','0');?>D
                                        </h2>
                                        <h5 class="card-widget__subtitle">Add Students</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="manage-posts" class="col-lg-3">
                        <div class="card card-widget">
                            <div class="card-body gradient-4">
                                <div class="media">
                                    <span class="card-widget__icon"><i class="icon-doc"></i></span>
                                    <div class="media-body">
                                        <h2 class="card-widget__title">
                                        <?php 
                                        // echo getTotalRecords($conn, 'posts','1');?>A
                                            <?php
                                            //  echo getTotalRecords($conn, 'posts','0');?>D
                                        </h2>
                                        <h5 class="card-widget__subtitle">Add Classes</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>


                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php
require_once("../inc/admin-footer.php")
?>

        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <?php
require_once("../inc/admin-bottomT.php")
?>