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
            mysqli_query($conn,"UPDATE `$table` SET `class_status`='$cStatus' WHERE `id`='$id'");
            header("location:$pageName");
        }
    }
}

?>