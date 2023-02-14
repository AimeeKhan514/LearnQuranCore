
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
                               <a href="manage-teachers" class="btn btn-sm btn-primary">Add New</a>
                               <a href="teachers" class="btn btn-sm btn-outline-primary">View All</a>
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
                                                <th>father Name</th>
                                                <th>cnic</th>
                                                <th>nationality</th>
                                                <th>phone1</th>
                                                <th>phone2</th>
                                                <th>gender</th>
                                                <th>marital status</th>
                                                <th>qualification</th>
                                                <th>experience</th>
                                                <th>address</th>
                                                <th>bank account title</th>
                                                <th>bank name</th>
                                                <th>bank branch code</th>
                                                <th>bank account number</th>
                                                <th>zoom username</th>
                                                <th>zoom id</th>
                                                <th>zoom password</th>
                                                <th>added by</th>
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
                                                <td><?php echo $row["name"];?></td>
                                                <td><?php echo $row["email"];?></td>
                                                <td><?php echo $row["password"];?></td>
                                                
                                                <td>
                                                <img src="../images/dashboard/teachers/<?php if($row["image"]=="" || $row["image"]==null){echo "teacher.png";}else{echo $row["image"];}?>" class=" rounded-circle mr-3 max-image-60px" alt="">
                                                </td>
                                                <td><?php echo $row["father_name"];?></td>
                                                <td><?php echo $row["cnic"];?></td>
                                                <td><?php echo $row["nationality"];?></td>
                                                <td><?php echo $row["phone1"];?></td>
                                                <td><?php echo $row["phone2"];?></td>
                                                <td>
                                                <?php if($row["gender"]==1){echo "Male";}else{echo "Female";}?>
                                                </td>
                                                <td><?php echo $row["marital_status"];?></td>
                                                <td><?php echo $row["qualification"];?></td>
                                                <td><?php echo $row["experience"];?></td>
                                                <td><?php echo $row["address"];?></td>
                                                <td><?php echo $row["bank_account_title"];?></td>
                                                <td><?php echo $row["bank_name"];?></td>
                                                <td><?php echo $row["bank_branch_code"];?></td>
                                                <td><?php echo $row["bank_account_number"];?></td>
                                                <td><?php echo $row["zoom_username"];?></td>
                                                <td><?php echo $row["zoom_id"];?></td>
                                                <td><?php echo $row["zoom_password"];?></td>
                                                <td>
                                                <?php if($row["added_by"]==1){echo "Admin";}else{echo "Editor";}?>
                                                </td>
                                                <td><?php 
                                                if($row["status"]==1){
                                                    echo '<a href="?action=deactive&id='.$row["id"].'" class="btn btn-sm btn-success bg-gradient">Active</a>';

                                                }else{
                                                    echo '<a href="?action=active&id='.$row["id"].'" class="btn btn-sm btn-danger bg-gradient">Deactive</a>';
                                                }
                                                ?></td>
                                                <td><?php echo date("D-d-M-y",strtotime($row["trashed_on"]));?></td>
                                                <td><?php echo date("D-d-M-y",strtotime($row["added_on"]));?></td>
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