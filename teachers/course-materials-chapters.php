<?php
require_once("../inc/admin-top.php");

if(isset($_GET["cscid"]) && $_GET["cscid"]!="" && $_GET["cscid"]>=1){
   $cscid = getSaveValue($conn, $_GET["cscid"]);
}else{
    $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible fade show msg">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button> <strong>Warning!</strong> Not Found.</div>';
    header("Location:course-materials");
}
?>
<style>
.page-titles {
    background-color: #e2f7e2 !important;
}
.nav-tabs .nav-link{
    font-size: 16px;
    font-weight: bold;
}
.nav-tabs .nav-link.active{
    color: #3a713a;
    background-color: #e2f7e2;
    border-color: #d7f4d7;

    
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
        <div class="bg-primary pt-1"></div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
        <div class="col-12 bg-white py-4">
                <div class="container">
                    <h3 class="mb-0 text-primary text-uppercase">
                    <?php echo ucwords(str_replace("-"," ",$pageName))?>
                    </h3>
                </div>
            </div>
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        
                        <!-- Nav tabs -->
                        <div class="default-tab">
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <?php 
                                $subCategoriesTabLength = 1;
                                $resChapters = mysqli_query($conn,"SELECT * FROM `subcategories` WHERE `status`='1' AND `id`='$cscid'");
                                if(mysqli_num_rows($resChapters)>0){
                                    while($rowChapters = mysqli_fetch_array($resChapters)){
                                        ?>
                                    <li class="nav-item"><a class="nav-link <?php if($subCategoriesTabLength == 1){echo "active";}else{echo "";}?>" data-toggle="tab" href="#category_<?php echo $rowChapters["id"];?>"><?php echo ucwords($rowChapters["title"]);?></a>
                                </li>
                                    <?php
                                    $subCategoriesTabLength++;
                                    }
                                }
                                ?>
                            </ul>
                            <div class="tab-content mt-5">
                            <?php 
                            $chaptersTabLength = 1;
                                $resChapters = mysqli_query($conn,"SELECT * FROM `subcategories` WHERE `status`='1' AND `id`='$cscid'");
                                if(mysqli_num_rows($resChapters)>0){
                                    while($rowChapters = mysqli_fetch_array($resChapters)){
                                        ?>
                                <div class="tab-pane fade <?php if($chaptersTabLength == 1){echo "show active";}else{echo "";}?>" id="category_<?php echo $rowChapters["id"];?>" role="tabpanel">
                                    <div class="row p-t-15">
                                        <?php
                                        $resChapters = mysqli_query($conn,"SELECT * FROM `chapters` WHERE `status`='1' AND `subcategory_id`='$cscid'");
                                        if(mysqli_num_rows($resChapters)>0){
                                            while($rowChapters = mysqli_fetch_array($resChapters)){
                                                ?>
                                        
                                        <div class="col-md-6 mb-3">
                                        <div class="media">
                            <img src="../images/dashboard/chapters/<?php echo $rowChapters["image"]?>" width="140px" class="mr-3" alt="...">
                            <div class="media-body">
                                <h5 class="mt-0">
                                    <a href="course-materials-chapter-details?cscid=<?php echo $rowChapters["subcategory_id"]?>&ccdid=<?php echo $rowChapters["id"]?>"><?php echo $rowChapters["title"]?></a>
                                </h5>
                                <?php echo str_repeat('<span class="fa fa-star text-warning mr-1"></span>',5)?>
                                <?php echo html_entity_decode($rowChapters["description"])?>
                                
                            </div>
                            </div>
                        
                                        </div>
                                        <?php
                                        $chaptersTabLength++;
                                    }

                                }
                                ?>
                                        
                                       
                                </div>
                            </div>
                            <?php
                                    }
                                }
                                ?>
                                
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
<script>
 
     </script>