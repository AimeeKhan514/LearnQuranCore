<?php
require_once("../inc/admin-top.php");
if(isset($_SESSION["msg"])){
    echo $_SESSION["msg"];
    unset($_SESSION["msg"]);
}
?>
<style>
.page-titles {
    background-color: #e2f7e2 !important;
}
</style>

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
            <div class="alert-success">
                <?php
require_once("../inc/breadcrumbs.php")
?>
            </div>
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">Course Materials</h4>
                        <!-- Nav tabs -->
                        <div class="default-tab">
                            <ul class="nav nav-tabs mb-3" role="tablist">

                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Home</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div class="p-t-15">
                                        <h4>This is home title</h4>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in
                                            Bookmarksgrove.</p>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in
                                            Bookmarksgrove.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <div class="p-t-15">
                                        <h4>This is profile title</h4>
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt
                                            tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                        </p>
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt
                                            tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                        </p>
                                    </div>
                                </div>
                                
                               
                            </div>
                        </div>
                    </div>
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