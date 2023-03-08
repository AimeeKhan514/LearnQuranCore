
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
                               <a href="classes" class="btn btn-sm btn-outline-primary">View All</a>
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
                                                <th>Sub Category</th>
                                                <th>Chapter</th>
                                                <th>activate time</th>
                                                <th>leave time</th>
                                                <th>start time</th>
                                                <th>absent time</th>
                                                <th>end time</th>
                                                <th>taken time</th>
                                                <th>onleave time</th>
                                                <th>Re-Schedule time</th>
                                                <th>Re-Schedule Class Date</th>
                                                <th>Re-Schedule Class Time</th>
                                                <th>class status</th>
                                                <th>approvel</th>
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
                                                    $getName =  getName($conn,'admins',$row["added_by"]);
                                            ?>
                                            <tr>
                                            <td><?php echo $sr;?></td>
                                                <td><?php echo $row["id"];?></td>
                                                <td><?php getFullName($conn,'teachers',$row["teacher_id"]);?></td>
                                                <td><?php echo $row["teacher_time"];?></td>
                                                <td><?php getFullName($conn,'students',$row["student_id"]);?></td>
                                                <td><?php echo $row["student_time"];?></td>
                                                <td><?php echo date("l jS \of F Y",strtotime($row["date"]));?></td>
                                                
                                                <td><?php getFullName($conn,'subcategories',$row["subcategory_id"]);?></td>
                                                <td><?php getFullName($conn,'chapters',$row["chapter_id"]);?></td>
                                                
                                                <td><?php if($row["activate_time"]!=""){echo date("l jS \of F Y h:i:s A",strtotime($row["activate_time"]));}else{echo "---";};?></td>
                                                
                                                <td><?php if($row["leave_time"]!=""){echo date("l jS \of F Y h:i:s A",strtotime($row["leave_time"]));}else{echo "---";};?></td>

                                                <td><?php if($row["start_time"]!=""){echo date("l jS \of F Y h:i:s A",strtotime($row["start_time"]));}else{echo "---";};?></td>

                                                <td><?php if($row["absent_time"]!=""){echo date("l jS \of F Y h:i:s A",strtotime($row["absent_time"]));}else{echo "---";};?></td>

                                                <td><?php if($row["end_time"]!=""){echo date("l jS \of F Y h:i:s A",strtotime($row["end_time"]));}else{echo "---";};?></td>

                                                <td><?php if($row["taken_time"]!=""){echo date("l jS \of F Y h:i:s A",strtotime($row["taken_time"]));}else{echo "---";};?></td>

                                                <td><?php if($row["onleave_time"]!=""){echo date("l jS \of F Y h:i:s A",strtotime($row["onleave_time"]));}else{echo "---";};?></td>

                                                <td><?php if($row["reschedule_time"]!=""){echo date("l jS \of F Y h:i:s A",strtotime($row["reschedule_time"]));}else{echo "---";};?></td>
                                                <td><?php if($row["re_schedule_day"]!=""){echo date("l jS \of F Y h:i:s A",strtotime($row["re_schedule_day"]));}else{echo "---";};?></td>
                                                <td><?php if($row["re_schedule_time"]!="00:00"){echo $row["re_schedule_time"];}else{echo "---";};?></td>
                                                
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
                                                <td data-toggle="tooltip" data-placement="top" title="<?php if($getName["role"]==1){echo "Admin";}else{echo "Editor";}?>">
                                                <?php echo $getName["name"];
                                                ?>
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