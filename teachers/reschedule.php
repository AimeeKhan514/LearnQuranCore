<?php
require_once("../inc/admin-top.php");
if(isset($_GET["token"]) && $_GET["token"]!=""){
    $token = getSaveValue($conn, $_GET["token"]);

    if(isset($_GET["id"]) && $_GET["id"]!=""){

        $id = getSaveValue($conn, $_GET["id"]);

        if($token == md5($id)){

            if(isset($_POST["submit"])){

                $re_schedule_day = getSaveValue($conn, $_POST["re_schedule_day"]);
                $re_schedule_time = getSaveValue($conn, $_POST["re_schedule_time"]);

                $res = mysqli_query($conn,"UPDATE `classes` SET `re_schedule_day`='$re_schedule_day', `re_schedule_time`='$re_schedule_time',`approvel`='0',`class_status`='0' WHERE `id`='$id'");
                if($res){
                    $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show "> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button> <strong>Success! </strong> Schedule Status is Pending It will be Active after Admin Approvel.</div>';
                    header("location:dashboard");
                }
            }
        
        }else{
        $_SESSION["msg"] = '<div class="alert alert-warning alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Warning! </strong> Not Exist.</div>';
        header("location:dashboard");
    }
    }else{
        $_SESSION["msg"] = '<div class="alert alert-warning alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Warning! </strong> Not Exist.</div>';
        header("location:dashboard");
    }
}else{
    $_SESSION["msg"] = '<div class="alert alert-warning alert-dismissible fade show msg">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button> <strong>Warning! </strong> Not Exist.</div>';
    header("location:dashboard");
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
                        <?php echo ucwords(str_replace("-"," ",$pageName))?>
                    </h3>
                </div>
            </div>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-lg-4 text-capitalize">
                        <div class="card mb-4 border border-primary">
                            <div class="card-body text-center">
                                <img src="../images/dashboard/teachers/<?php if ($_SESSION["TEACHER_LOGIN"]["IMAGE"] == "" || $_SESSION["TEACHER_LOGIN"]["IMAGE"] == null) {
                                echo "teacher.png";
                            } else {
                                echo $_SESSION["TEACHER_LOGIN"]["IMAGE"];
                            } ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height:150px;">
                                <h5 class="my-3"><?php echo $_SESSION["TEACHER_LOGIN"]["NAME"];;?></h5>
                                <p class="text-muted mb-1"><?php echo $_SESSION["TEACHER_LOGIN"]["EMAIL"];;?></p>

                                <div class="d-flex justify-content-center mb-2">
                                    <a href="edit-profile?id=<?php echo md5($_SESSION["TEACHER_LOGIN"]["ID"]) ?>"
                                        class="btn btn-primary">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 text-capitalize">
                        <div class="card mb-4 border border-primary">
                            <div class="card-body">
                            <form class="form-valide" action="" method="post" enctype="multipart/form-data">
                                <div class="col-12 my-3">
                                    <h3>Add New Schedule</h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="re_schedule_day">Re Schedule Date
                                            <span class="small">(Optional)</span>
                                        </label>
                                        <div class="">
                                            <input type="date" class="form-control" id="re_schedule_day"
                                                name="re_schedule_day" value="<?php echo date('Y-m-d');?>"
                                                min="<?php echo date('Y-m-d');?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="col-form-label" for="re_schedule_time">Re Schedule
                                            Time
                                            <span class="small">(Optional)</span>
                                        </label>
                                        <div class="">
                                            <select class="form-control" id="re_schedule_time" name="re_schedule_time">
                                                <?php echo get_times(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary"
                                            name="submit">Submit</button>
                                    </div>
                                </div>
                                </form>
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
        <script>

        </script>