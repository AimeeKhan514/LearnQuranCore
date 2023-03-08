<?php
require_once("../inc/admin-top.php");
require_once("../inc/getData.php");

$teacher_id = "";
$student_id = "";
$teacher_time = "";
$student_time = "";
$date = "";
$subcategory_id = "";
$chapter_id = "";
$re_schedule_day = "";
$re_schedule_time = "";
$added_by = "";

$required = "required";
$btnName = "Add Record";
if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0) {
    $btnName = "Update Record";
    $required = "";
    $id = $_GET["id"];
    $res = mysqli_query($conn, "SELECT * FROM `$table` WHERE `id`='$id'");
    $row = mysqli_fetch_array($res);

    $teacher_id = $row["teacher_id"];
    $student_id = $row["student_id"];
    $teacher_time = $row["teacher_time"];
    $student_time = $row["student_time"];
    $date = $row["date"];

    $subcategory_id = $row["subcategory_id"];
    $chapter_id = $row["chapter_id"];
    $re_schedule_day = $row["re_schedule_day"];
    $re_schedule_time = $row["re_schedule_time"];
    $added_by = $_SESSION["ADMIN_LOGIN"]["ID"];
}
if (isset($_POST["submit"])) {

    $teacher_id = getSaveValue($conn, $_POST["teacher_id"]);
    $student_id = getSaveValue($conn, $_POST["student_id"]);
    $teacher_time = getSaveValue($conn, $_POST["teacher_time"]);
    $student_time = getSaveValue($conn, $_POST["student_time"]);
    $date = getSaveValue($conn, $_POST["date"]);
    $subcategory_id = getSaveValue($conn, $_POST["subcategory_id"]);
    $chapter_id = getSaveValue($conn, $_POST["chapter_id"]);
    $re_schedule_day = getSaveValue($conn, $_POST["re_schedule_day"]);
    $re_schedule_time = getSaveValue($conn, $_POST["re_schedule_time"]);
    $added_by = $_SESSION["ADMIN_LOGIN"]["ID"];



    if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0) {
        $res = mysqli_query($conn, "UPDATE `$table` SET `teacher_id`='$teacher_id',`student_id`='$student_id',`teacher_time`='$teacher_time',`student_time`='$student_time',`date`='$date',`subcategory_id`='$subcategory_id',`chapter_id`='$chapter_id', `added_by`='$added_by',`re_schedule_day`='$re_schedule_day',`re_schedule_time`='$re_schedule_time' WHERE `id`='$id'");
        if ($res) {
            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Success!</strong> Updated Successfully.</div>';
            header("location:classes");
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Warning!</strong> Error in Updating.</div>';
        }
    } else {
        $res = mysqli_query($conn, "INSERT INTO `$table` (`teacher_id`, `student_id`, `teacher_time`, `student_time`, `date`,  `subcategory_id`, `chapter_id`, `added_by`,`re_schedule_day`,`re_schedule_time`) VALUES ('$teacher_id', '$student_id', '$teacher_time', '$student_time', '$date', '$subcategory_id', '$chapter_id', '$added_by','$re_schedule_day','$re_schedule_time')");
        if ($res) {
            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button> <strong>Success!</strong> Added Successfully.</div>';
            header("location:classes");
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button> <strong>Warning!</strong> Error in Adding.</div>';
        }
    }
}
echo $msg;
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
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="teacher_id">Teachers <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <select class="form-control" id="teacher_id" name="teacher_id">
                                                            <?php

                                                            $resTeacher = mysqli_query($conn, "SELECT * FROM `teachers` WHERE `trashed_on`='' AND `status`='1'");

                                                            if (mysqli_num_rows($resTeacher) > 0) {
                                                                while ($rowTeacher = mysqli_fetch_array($resTeacher)) {
                                                                    if ($rowTeacher["id"] == $teacher_id) {
                                                                        $selected = "selected";
                                                                    } else {
                                                                        $selected = "";
                                                                    }

                                                                    echo '<option value="' . $rowTeacher["id"] . '" ' . $selected . '>' . $rowTeacher["name"] . '</option>';
                                                                }
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="teacher_time">Teacher's Time
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">

                                                        <select class="form-control" id="teacher_time"
                                                            name="teacher_time">
                                                            <?php echo get_times($teacher_time); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="student_id">Students <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <select class="form-control" id="student_id" name="student_id">
                                                            <?php

                                                            $resStudent = mysqli_query($conn, "SELECT * FROM `students` WHERE `trashed_on`='' AND `status`='1'");

                                                            if (mysqli_num_rows($resStudent) > 0) {
                                                                while ($rowStudent = mysqli_fetch_array($resStudent)) {
                                                                    if ($rowStudent["id"] == $student_id) {
                                                                        $selected = "selected";
                                                                    } else {
                                                                        $selected = "";
                                                                    }

                                                                    echo '<option value="' . $rowStudent["id"] . '" ' . $selected . '>' . $rowStudent["name"] . '</option>';
                                                                }
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="student_time">Student's Time
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <select class="form-control" id="student_time"
                                                            name="student_time">
                                                            <?php echo get_times($student_time); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="date">Class Date <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="date" class="form-control" id="date" name="date"
                                                            value="<?php echo $date; ?>" <?php echo $required; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="subcategory_id">Course Sub
                                                        Categories
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <select class="form-control" id="subcategory_id"
                                                            name="subcategory_id">

                                                            <option value="" hidden selected>Select Sub Categories
                                                            </option>
                                                            <?php

                                                            $resCat = mysqli_query($conn, "SELECT * FROM `subcategories` WHERE `trashed_on`='' AND `status`='1'");

                                                            if (mysqli_num_rows($resCat) > 0) {
                                                                while ($rowCat = mysqli_fetch_array($resCat)) {
                                                                    if ($rowCat["id"] == $subcategory_id) {
                                                                        $selected = "selected";
                                                                    } else {
                                                                        $selected = "";
                                                                    }

                                                                    echo '<option value="' . $rowCat["id"] . '" ' . $selected . '>' . $rowCat["title"] . '</option>';
                                                                }
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="chapter_id">Course Chapters<span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <select class="form-control" id="chapter_id" name="chapter_id">
                                                            <!-- <option value="" hidden selected>Select Sub Categories</option> -->
                                                            <?php
                                                            if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0){
                                                                $resSubCat = mysqli_query($conn, "SELECT * FROM `chapters` WHERE `trashed_on`='' AND `status`='1' AND `id`='$chapter_id'");

                                                            if (mysqli_num_rows($resSubCat) > 0) {
                                                                while ($rowSubCat = mysqli_fetch_array($resSubCat)) {
                                                                  
                                                                    if ($rowSubCat["id"] == $chapter_id) {
                                                                        $selected = "selected";
                                                                    } else {
                                                                        $selected = "";
                                                                    }

                                                                    echo '<option value="' . $rowSubCat["id"] . '" ' . $selected . '>' . $rowSubCat["title"] . '</option>';
                                                                }
                                                            }

                                                            }
                                                            ?>




                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 my-3">
                                                <h3>Re Schedule</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="re_schedule_day">Re Schedule Date
                                                        <span class="small">(Optional)</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="date" class="form-control" id="re_schedule_day"
                                                            name="re_schedule_day"
                                                            value="<?php echo $re_schedule_day; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="col-form-label" for="re_schedule_time">Re Schedule Time
                                                    <span class="small">(Optional)</span>
                                                </label>
                                                <div class="">
                                                    <select class="form-control" id="re_schedule_time"
                                                        name="re_schedule_time">
                                                        <?php echo get_times($re_schedule_time); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                     
                                        <div class="form-group">
                                            <div class="col-12 p-0">
                                                <button type="submit" class="btn btn-primary"
                                                    name="submit"><?php echo $btnName; ?></button>
                                            </div>
                                        </div>
                                    </form>
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
    <script>
    $(document).ready(function() {
        $("#subcategory_id").change(function() {
            $subcategory_id = $("#subcategory_id").val();
            $.ajax({
                "url": "getChapters.php",
                "type": "post",
                "data": "subcategory_id=" + $subcategory_id,
                "success": function(result) {
                    $("#chapter_id").html(result);

                }
            });


        });
    });
    </script>