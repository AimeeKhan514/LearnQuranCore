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
    margin-bottom: 0px !important;
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
                                $categoriesTabLength = 1;
                                $resCat = mysqli_query($conn,"SELECT * FROM `categories` WHERE `status`='1'");
                                if(mysqli_num_rows($resCat)>0){
                                    while($rowCat = mysqli_fetch_array($resCat)){
                                        ?>
                                    <li class="nav-item"><a class="nav-link <?php if($categoriesTabLength == 1){echo "active";}else{echo "";}?>" data-toggle="tab" href="#category_<?php echo $rowCat["id"];?>"><?php echo ucwords($rowCat["title"]);?></a>
                                </li>
                                    <?php
                                    $categoriesTabLength++;
                                    }
                                }
                                ?>
                            </ul>
                            <div class="tab-content mt-5">
                            <?php 
                            $subCategoriesTabLength = 1;
                                $resCat = mysqli_query($conn,"SELECT * FROM `categories` WHERE `status`='1'");
                                if(mysqli_num_rows($resCat)>0){
                                    while($rowCat = mysqli_fetch_array($resCat)){
                                        ?>
                                <div class="tab-pane fade <?php if($subCategoriesTabLength == 1){echo "show active";}else{echo "";}?>" id="category_<?php echo $rowCat["id"];?>" role="tabpanel">
                                    <div class="row p-t-15">
                                        <?php
                                        $resSubCat = mysqli_query($conn,"SELECT * FROM `subcategories` WHERE `status`='1' AND `category_id`='".$rowCat["id"]."'");
                                        if(mysqli_num_rows($resSubCat)>0){
                                            while($rowSubCat = mysqli_fetch_array($resSubCat)){
                                                ?>
                                        
                                        <div class="col-md-6 mb-3">
                                        <div class="media">
                            <img src="../images/dashboard/sub-categories/<?php echo $rowSubCat["image"]?>" width="140px" class="mr-3" alt="...">
                            <div class="media-body">
                                <h5 class="mt-0">
                                    <a href="course-materials-chapters?cscid=<?php echo $rowSubCat["id"]?>"><?php echo $rowSubCat["title"]?></a>
                                </h5>
                                <?php echo str_repeat('<span class="fa fa-star text-warning mr-1"></span>',5)?>
                                <?php echo html_entity_decode($rowSubCat["description"])?>
                                
                            </div>
                            </div>
                            <p class="mt-2"> <i class="fa fa-graduation-cap text-primary"></i> Minimam Age: <?php echo $rowSubCat["age"]?></p>
                                        </div>
                                        <?php
                                        $subCategoriesTabLength++;
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