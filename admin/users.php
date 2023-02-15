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
                               <!-- <a href="manage-users" class="btn btn-sm btn-primary">Add New</a> -->
                               <?php
if($_SESSION["AUTH_LOGIN"]["ROLE"]==1){
?>
                               <a href="trashed-users" class="btn btn-sm btn-outline-primary">Trash</a>
                               <?php }?>
                               </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration text-capitalize">
                                        <thead>
                                            <tr>
                                                <th>#sr</th>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>email</th>
                                                <th>password</th>
                                                <th>image</th>
                                                <th>Status</th>
                                                <th>Added On</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sr = 1; 
                                            $res = mysqli_query($conn,"SELECT * FROM `$table` WHERE `trashed_on`=''");

                                            if(mysqli_num_rows($res)>0){
                                                while($row = mysqli_fetch_array($res)){
                                            ?>
                                            <tr>
                                                <td><?php echo $sr;?></td>
                                                <td><?php echo $row["id"];?></td>
                                                <td><?php echo $row["name"];?></td>
                                                <td><?php echo $row["email"];?></td>
                                                <td><?php echo $row["password"];?></td>
                                                <td>
                                                <img src="../images/users/<?php echo $row["image"];?>" class=" rounded-circle mr-3 max-image-60px" alt="">
                                                </td>
                                                <td><?php 
                                                if($row["status"]==1){
                                                    echo '<a href="?action=deactive&id='.$row["id"].'" class="btn btn-sm btn-success bg-gradient">Active</a>';

                                                }else{
                                                    echo '<a href="?action=active&id='.$row["id"].'" class="btn btn-sm btn-danger bg-gradient">Deactive</a>';
                                                }
                                                ?></td>
                                                <td><?php echo date("D-d-M-y",strtotime($row["added_on"]));?></td>
                                                <td>
                                                <!-- <a href="manage-users?id=<?php echo $row["id"]?>" class="btn btn-sm btn-primary bg-gradient">Edit</a> -->
                                                <?php
if($_SESSION["AUTH_LOGIN"]["ROLE"]==1){
?>
                                                <a href="?action=trashed&id=<?php echo $row["id"]?>" class="btn btn-sm btn-danger bg-gradient">Move To Trash</a>
<?php }?>
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