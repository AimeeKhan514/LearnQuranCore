<?php
require_once("tables.php");

if(isset($_GET["action"]) && $_GET["action"]!=""){
    if(isset($_GET["id"]) && $_GET["id"]!=""){
        $id = getSaveValue($conn, $_GET["id"]);
        if($_GET["action"]=="active"){
            mysqli_query($conn,"UPDATE `$table` SET `status`='1' WHERE `id`='$id'");
            header("location:$pageName");
        }
        if($_GET["action"]=="deactive"){
            mysqli_query($conn,"UPDATE `$table` SET `status`='0' WHERE `id`='$id'");
            header("location:$pageName");
        }
        if($_GET["action"]=="delete"){
            mysqli_query($conn,"DELETE FROM `$table` WHERE `id`='$id'");
            header("location:$pageName");
        }
        if($_GET["action"]=="trashed"){
            mysqli_query($conn,"UPDATE `$table` SET `trashed_on`=current_timestamp() WHERE `id`='$id'");
            header("location:$pageName");
        }
        if($_GET["action"]=="restore"){
            mysqli_query($conn,"UPDATE `$table` SET `trashed_on`='' WHERE `id`='$id'");
            header("location:$pageName");
        }
        if($_GET["action"]=="regular"){
            mysqli_query($conn,"UPDATE `$table` SET `course_status`='1' WHERE `id`='$id'");
            header("location:$pageName");
        }
        if($_GET["action"]=="trial"){
            mysqli_query($conn,"UPDATE `$table` SET `course_status`='0' WHERE `id`='$id'");
            header("location:$pageName");
        }
        if($_GET["action"]=="disapprove"){
            mysqli_query($conn,"UPDATE `$table` SET `approvel`='0' WHERE `id`='$id'");
            header("location:$pageName");
        }
        if($_GET["action"]=="approve"){
            mysqli_query($conn,"UPDATE `$table` SET `approvel`='1' WHERE `id`='$id'");
            header("location:$pageName");
        }
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
                $sqlStatus = ",`reschedule_time`= now() ";
            }elseif($cStatus==8){
                $sqlStatus = ",`onleave_time`= now() ";
            }elseif($cStatus==9){
                $sqlStatus = " ,`activate_time`='---' ,`leave_time`='---',`start_time`='---',`absent_time`='---',`end_time`='---',`taken_time`='---',`onleave_time`='---',`reschedule_time`='---' ";
            }
            mysqli_query($conn,"UPDATE `$table` SET `class_status`='$cStatus' $sqlStatus WHERE `id`='$id'");
            header("location:$pageName");
        }
    }
}

?>