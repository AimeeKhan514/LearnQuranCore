<?php
require_once("../inc/admin-top.php");
if(isset($_SESSION["msg"])){
    echo $_SESSION["msg"];
    unset($_SESSION["msg"]);
}
$teacher_id = $_SESSION["TEACHER_LOGIN"]["ID"];
$date = date("Y-m-d");
if(isset($_GET["date"]) && $_GET["date"]!=""){
    $date = getSaveValue($conn, $_GET["date"]);
}

$res = mysqli_query($conn,"SELECT * FROM `classes` WHERE `trashed_on`='' AND `teacher_id`='$teacher_id' AND `date`='$date' AND `status`='1'");

if(isset($_GET["action"]) && $_GET["action"]!=""){
    if(isset($_GET["id"]) && $_GET["id"]!=""){
        $id = getSaveValue($conn, $_GET["id"]);
if($_GET["action"]=="classStatus"){
    $cStatus = getSaveValue($conn, $_GET["cStatus"]);
    $sqlStatus = "";
    if($cStatus==1){
        $sqlStatus = ",`activate_time`= now() ";
    }elseif($cStatus==2){
        $sqlStatus = ",`leave_time`= now() ";
    }elseif($cStatus==3){
        $sqlStatus = ",`start_time`= now() ";
    }elseif($cStatus==4){
        $sqlStatus = ",`absent_time`= now() ";
    }elseif($cStatus==5){
        $sqlStatus = ",`end_time`= now() ";
    }elseif($cStatus==6){
        $sqlStatus = ",`taken_time`= now() ";
    }elseif($cStatus==7){
        $pageName = "reschedule";
        $sqlStatus = ",`reschedule_time`= now() ";
    }elseif($cStatus==8){
        $sqlStatus = ",`onleave_time`= now() ";
    }
    mysqli_query($conn,"UPDATE `classes` SET `class_status`='$cStatus' $sqlStatus WHERE `id`='$id'");
    header("location:$pageName");
}
    }
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-4">
                                    <form action="" method="get">
                                    <h3>Search Class By Date</h3>
                                    <div class="input-group">
                                            <input type="date" name="date" class="form-control" value="<?php echo $date?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">Search</button>
                                                <a href="<?php echo $pageName?>" class="btn btn-outline-primary" style="padding-top: 10px;">Reset</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered zero-configuration text-capitalize text-center">
                                        <thead>
                                            <tr>
                                                <th>#sr</th>
                                                <th>Teacher Time</th>
                                                <th>Student Time</th>
                                                <th>Student</th>
                                                <th>Course</th>
                                                <th>History</th>
                                                <th>Student status</th>
                                                <th>Class Approvel</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sr = 1;
                                            if(mysqli_num_rows($res)>0){
                                                while($row = mysqli_fetch_array($res)){
                                                
                                            ?>
                                            <tr>
                                                <td><?php echo $sr;?></td>

                                                <td class="font-weight-bold"><?php echo $row["teacher_time"];?></td>
                                                
                                                <td class="font-weight-bold"><?php echo $row["student_time"];?></td>
                                                <td class="font-weight-bold"><?php getFullName($conn,'students',$row["student_id"]);?></td>
                                                <td>
                                                    <a href="course-materials-chapters?cscid=<?php echo $row["subcategory_id"];?>" target="_blank" class="btn btn-sm btn-primary">
                                                    <?php getFullName($conn,'subcategories',$row["subcategory_id"]);?></a>
                                                </td>
                                                <td>
                                                    <a href="" target="_blank" class="btn btn-sm btn-danger">History</a>
                                                </td>
                                                <td><?php 
                                                $studentFeeStatus = getStatus($conn, 'students','course_status',$row["student_id"]);
                                                if($studentFeeStatus==1){
                                                    echo '<button class="btn btn-sm btn-info bg-gradient">Regular</button>';

                                                }else{
                                                    echo '<button class="btn btn-sm btn-warning bg-gradient">Trial</button>';
                                                }
                                                ?></td>
                                                <td><?php 
                                                if($row["approvel"]==1){
                                                    echo '<button class="btn btn-sm btn-success bg-gradient">Approved</button>';

                                                }else{
                                                    echo '<button class="btn btn-sm btn-danger bg-gradient">Disapproved</button>';
                                                }
                                                ?></td>
                                               
                                             
                                               <td>
                                                <?php 
                                                 if($row["approvel"]==1){
                                                 if($row["class_status"]==9 || $row["class_status"]==7){
                                                    //pending 9
                                                    //Re-schedule 7
                                                     //Redirect To Re-schedule Page
                                                     //Add Re-schedule Day And Time
                                                     //Approvel Status Off 

                                                    echo '<a href="?action=classStatus&cStatus=1&id='.$row["id"].'" class="btn btn-sm btn-success bg-gradient">Activate</a>
                                                    <a href="?action=classStatus&cStatus=2&id='.$row["id"].'" class="btn btn-sm btn-outline-primary bg-gradient">Leave</a>';

                                                }elseif($row["class_status"]==1){
                                                    //Activation
                                                    echo '<a href="?action=classStatus&cStatus=3&id='.$row["id"].'" class="btn btn-sm btn-success bg-gradient">Start</a>
                                                    <a href="?action=classStatus&cStatus=4&id='.$row["id"].'" class="btn btn-sm btn-danger bg-gradient">Absent</a>';
                                                }elseif($row["class_status"]==2 || $row["class_status"]==8){
                                                    //Leave 2
                                                    //On Leave 8

                                                      //Re-schedule 7
                                                     //Redirect To Re-schedule Page
                                                     //Add Re-schedule Day And Time
                                                     //Approvel Status Off
                                                    echo '<button href="" class="btn btn-sm btn-primary disabled bg-gradient">On Leave</button>
                                                    <a href="?action=classStatus&cStatus=7&id='.$row["id"].'" class="btn btn-sm btn-primary bg-gradient">Re-Schedule</a>';
                                                }elseif($row["class_status"]==3){
                                                    //Start
                                                    echo '<a href="" class="btn btn-sm btn-primary bg-gradient">End</a>';
                                                }elseif($row["class_status"]==4){
                                                    //Absent
                                                    echo '<a href="" class="btn btn-sm btn-dark disabled bg-gradient">Student Absent</a>';
                                                }elseif($row["class_status"]==5){
                                                    //End
                                                    //Redirect To Remarks Page
                                                    //Status Will be Updated to Taken(6)
                                                    echo '<a href="" class="btn btn-sm btn-primary disabled bg-gradient">Taken</a>';
                                                }elseif($row["class_status"]==6){
                                                    //Taken
                                                    echo '<a href="" class="btn btn-sm btn-primary bg-gradient disabled">Taken</a>';
                                                }else{
                                                    echo '<a href="" class="btn btn-sm btn-primary disabled bg-gradient">Pending</a>';
                                                }

                                            }else{
                                                echo '<a href="" class="btn btn-sm btn-primary disabled bg-gradient">Pending</a>';
                                            }
                                                ?>
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
require_once("../inc/admin-bottomT.php")
?>