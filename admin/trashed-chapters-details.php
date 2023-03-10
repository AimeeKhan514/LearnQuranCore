
<?php
require_once("../inc/admin-top.php");
require_once("../inc/getData.php");

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
require_once("../inc/admin-header.php")
?>


        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php
require_once("../inc/admin-sidebar.php")
?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

        <?php
require_once("../inc/breadcrumbs.php")

?>

<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               <div class="text-right">
                               <a href="manage-chapters-details" class="btn btn-sm btn-primary">Add New</a>
                               <a href="chapters-details" class="btn btn-sm btn-outline-primary">View All</a>
                               </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration text-capitalize">
                                        <thead>
                                            <tr>
                                            <th>#sr</th>
                                            <th>Id</th>
                                            <th>???Sub Categories</th>
                                            <th>Chapters</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Added On</th>
                                            <th>Trashed On</th>
                                            <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sr = 1; 
                                            $res = mysqli_query($conn,"SELECT * FROM `$table` WHERE `trashed_on`!=''");

                                            if(mysqli_num_rows($res)>0){
                                                while($row = mysqli_fetch_array($res)){
                                            ?>
                                            <tr>
                                             
                                            <td><?php echo $sr;?></td>
                                                <td><?php echo $row["id"];?></td>
                                               
                                            <td>
                                                    <?php 
                                                    $resSubCat = mysqli_query($conn,"SELECT * FROM `subcategories` WHERE `status`='1' AND `id`='".$row["subcategory_id"]."'");
                                                    if($row["subcategory_id"]==0){
                                                        echo "----";
                                                    }else{
                                                    $rowSubCat = mysqli_fetch_array($resSubCat);
                                                    echo $rowSubCat["title"];
                                                    }
                                                    ;?>
                                            </td>
                                            <td>
                                                    <?php 
                                                    $resCat = mysqli_query($conn,"SELECT * FROM `chapters` WHERE `status`='1' AND `id`='".$row["chapter_id"]."'");
                                                    if($row["chapter_id"]==0){
                                                        echo "----";
                                                    }else{
                                                    $rowCat = mysqli_fetch_array($resCat);
                                                    echo $rowCat["title"];
                                                    }
                                                    ;?>
                                            </td>
                                                <td><?php echo $row["title"];?></td>
                                                <td>
                                                <img src="../images/dashboard/chapters-details/<?php echo $row["image"];?>" class="rounded-circle mr-3 max-image-60px" alt="">
                                                </td>
                                                <td><?php 
                                                if($row["status"]==1){
                                                    echo '<a href="?action=deactive&id='.$row["id"].'" class="btn btn-sm btn-success bg-gradient">Active</a>';

                                                }else{
                                                    echo '<a href="?action=active&id='.$row["id"].'" class="btn btn-sm btn-danger bg-gradient">Deactive</a>';
                                                }
                                                ?></td>
                                                <td><?php echo date("D-d-M-y",strtotime($row["added_on"]));?></td>
                                                
                                                <td><?php echo date("D-d-M-y",strtotime($row["trashed_on"]));?></td>
                                               
                                                <td>
                                                <a href="?action=restore&id=<?php echo $row["id"]?>" class="btn btn-sm btn-success bg-gradient">Restore</a>
                                                <a href="?action=delete&id=<?php echo $row["id"]?>" class="btn btn-sm btn-danger bg-gradient">Del</a>

                                                </td>
                                            </tr>
                                            <?php
                                                 $sr++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                       
                                    </table>
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
require_once("../inc/admin-bottom.php")
?>