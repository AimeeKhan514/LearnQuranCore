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
                               <a href="manage-classes" class="btn btn-sm btn-primary">Add New</a>
                               <?php
                                if($_SESSION["ADMIN_LOGIN"]["ROLE"]==1){
                                ?>
                               <a href="trashed-classes" class="btn btn-sm btn-outline-primary">Trash</a>
                               <?php }?>
                               </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration text-capitalize">
                                        <thead>
                                            <tr>
                                                <th>#sr</th>
                                                <th>Id</th>
                                                <th>Teacher</th>
                                                <th>Teacher Time</th>
                                                <th>Student</th>
                                                <th>Student Time</th>
                                                <th>date</th>
                                                <th>day</th>
                                                <th>time</th>
                                                <th>Sub Category</th>
                                                <th>Chapter</th>
                                                <th>activate time</th>
                                                <th>leave time</th>
                                                <th>start time</th>
                                                <th>absent time</th>
                                                <th>end time</th>
                                                <th>taken time</th>
                                                <th>onleave time</th>
                                                <th>Re-Schedule Day</th>
                                                <th>Re-Schedule Time</th>
                                                <th>class status</th>
                                                <th>approvel</th>
                                                <th>added by</th>
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
                                                <td><?php getFullName($conn,'teachers',$row["teacher_id"]);?></td>
                                                <td><?php echo $row["teacher_time"];?></td>
                                                <td><?php getFullName($conn,'students',$row["student_id"]);?></td>
                                                <td><?php echo $row["student_time"];?></td>
                                                <td><?php echo date("D-d-M-y",strtotime($row["date"]));?></td>
                                                <td><?php echo $row["day"];?></td>
                                                <td><?php echo $row["time"];?></td>
                                                <td><?php getFullName($conn,'subcategories',$row["subcategory_id"]);?></td>
                                                <td><?php getFullName($conn,'chapters',$row["chapter_id"]);?></td>
                                                
                                                <td><?php echo $row["activate_time"];?></td>
                                                <td><?php echo $row["leave_time"];?></td>
                                                <td><?php echo $row["start_time"];?></td>
                                                <td><?php echo $row["absent_time"];?></td>
                                                <td><?php echo $row["end_time"];?></td>
                                                <td><?php echo $row["taken_time"];?></td>
                                                <td><?php echo $row["onleave_time"];?></td>
                                                <td><?php echo $row["re_schedule_day"];?></td>
                                                <td><?php echo $row["re_schedule_time"];?></td>
                                                <td>
                                                <div class="basic-dropdown">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"><?php getFullName($conn,'class_status',$row["class_status"]);?></button>
                                        <div class="dropdown-menu">
                                            <?php 
                                            $resClassStatus = mysqli_query($conn,"SELECT * FROM `class_status` WHERE `status`='1'");
                                            if(mysqli_num_rows($resClassStatus)>0){
                                                while($rowClassStatus = mysqli_fetch_array($resClassStatus)){
                                               ?>
                                            <a class="dropdown-item w-auto <?php echo ($rowClassStatus["id"]== $row["class_status"])?"active": "";?>" href="?action=classStatus&cStatus=<?php echo $rowClassStatus["id"]?>&id=<?php echo $row["id"]?>"><?php echo $rowClassStatus["title"]?></a>
                                           <?php
                                                
                                            }
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                                </td>
                                                <td><?php 
                                                if($row["approvel"]==1){
                                                    echo '<a href="?action=disapprove&id='.$row["id"].'" class="btn btn-sm btn-success bg-gradient">Approved</a>';

                                                }else{
                                                    echo '<a href="?action=approve&id='.$row["id"].'" class="btn btn-sm btn-danger bg-gradient">Disapproved</a>';
                                                }
                                                ?></td>
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
                                                <td><?php echo date("D-d-M-y",strtotime($row["added_on"]));?></td>
                                                <td>
                                                <a href="manage-classes?id=<?php echo $row["id"]?>" class="btn btn-sm btn-primary bg-gradient">Edit</a>
                                                <?php
                                                if($_SESSION["ADMIN_LOGIN"]["ROLE"]==1){
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