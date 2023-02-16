<?php
require_once("../inc/admin-top.php");

if(isset($_GET["cscid"]) && $_GET["cscid"]!="" && $_GET["cscid"]>=1){
   $cscid = getSaveValue($conn, $_GET["cscid"]);
   if(isset($_GET["ccdid"]) && $_GET["ccdid"]!="" && $_GET["ccdid"]>=1){
    $ccdid = getSaveValue($conn, $_GET["ccdid"]);
   }else{
    $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible fade show msg">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button> <strong>Warning!</strong> Not Found.</div>';
    header("Location:course-materials");
}
}else{
    $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible fade show msg">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button> <strong>Warning!</strong> Not Found.</div>';
    header("Location:course-materials");
}
$resChapter = mysqli_query($conn,"SELECT * FROM `chapters` WHERE `status`='1' AND `id`='$ccdid'");
$rowChapter = mysqli_fetch_assoc($resChapter);

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
<style>
.page-titles {
    background-color: #e2f7e2 !important;
}
.ekko-lightbox-nav-overlay a:last-child span, .ekko-lightbox-nav-overlay a:first-child span {
    color: black !important;
    font-size: 50px !important;
}
@media screen and (min-width:800px) {
    .image-size{
    width: 150px !important;
    height: 220px !important;
} 
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
                    <?php echo ucwords(str_replace("-"," ",$rowChapter["title"]))?>
                    </h3>
                </div>
            </div>
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <hr>
                        <div class="row">
                            
                       
                        <?php 
                        
                            
                                $res = mysqli_query($conn,"SELECT * FROM `chaptersdetails` WHERE `status`='1' AND `subcategory_id`='$cscid' AND `chapter_id`='$ccdid'");
                                if(mysqli_num_rows($res)>0){
                                    while($row = mysqli_fetch_array($res)){
                                        ?>
                                        <div class="col-md-2 mb-3 text-center">
                                        <a href="../images/dashboard/chapters-details/<?php echo $row["image"]?>" data-toggle="lightbox" data-gallery="gallery">
                                        <img src="../images/dashboard/chapters-details/<?php echo $row["image"]?>" class="img-fluid rounded image-size">
                                        <p><?php echo $row["title"]?></p>
                                        </a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>



    <script>
    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
    </script>