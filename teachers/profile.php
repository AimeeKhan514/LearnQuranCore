<?php
require_once("../inc/admin-top.php");
if(isset($_GET["id"]) && $_GET["id"]!=""){
    $id = getSaveValue($conn, $_GET["id"]);
    if($id == md5($_SESSION["TEACHER_LOGIN"]["ID"])){
        $id = $_SESSION["TEACHER_LOGIN"]["ID"];
        $res = mysqli_query($conn,"SELECT * FROM `teachers` WHERE `status`='1' AND `id`='$id'");
        $row = mysqli_fetch_array($res);
        $getName =  getName($conn,'admins',$row["added_by"]);
            
    }else{
        $_SESSION["msg"] = '<div class="alert alert-warning alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Warning! </strong> Profile Not Exist.</div>';
        header("location:dashboard");
    }
}else{
    $_SESSION["msg"] = '<div class="alert alert-warning alert-dismissible fade show msg">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button> <strong>Warning! </strong> Profile Not Exist.</div>';
    header("location:dashboard");
}
if(isset($_SESSION["msgupdate"])){
    echo $_SESSION["msgupdate"];
    unset($_SESSION["msgupdate"]);
}
?>
<style>
.page-titles {
    background-color: #e2f7e2 !important;
    margin-bottom: 0px !important;
}

.nav-tabs .nav-link {
    font-size: 16px;
    font-weight: bold;
}

.nav-tabs .nav-link.active {
    color: #3a713a;
    background-color: #e2f7e2;
    border-color: #d7f4d7;


}
</style>

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
                                <img src="../images/dashboard/teachers/<?php echo $row["image"];?>" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px; height:150px;">
                                <h5 class="my-3"><?php echo $row["name"];?></h5>
                                <p class="text-muted mb-1"><?php echo $row["email"];?></p>
                                <p class="mb-4 badge badge-info" data-toggle="tooltip" data-placement="top"
                                    title="<?php if($getName["role"]==1){echo "Admin";}else{echo "Editor";}?>">
                                    Added By: <?php echo $getName["name"];
                                                ?></p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="edit-profile?id=<?php echo md5($_SESSION["TEACHER_LOGIN"]["ID"]) ?>"
                                        class="btn btn-primary">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <a href="#" class="list-group-item list-group-item-action active">List Of
                                        Sttudents</a>
                                    <a href="#" class="list-group-item list-group-item-action">List of classes</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 text-capitalize">
                        <div class="card mb-4 border border-primary">
                            <div class="card-body">
                                <h1 class="mb-4">Personal Bio</h1>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="text-muted mb-0 font-weight-bold"><?php echo $row["name"];?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="text-muted mb-0 font-weight-bold"><?php echo $row["email"];?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="mb-0">Father Name</p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="text-muted mb-0 font-weight-bold"><?php echo $row["father_name"];?>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="mb-0">CNIC</p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="text-muted mb-0 font-weight-bold"><?php echo $row["cnic"];?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="mb-0">Nationality</p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="text-muted mb-0 font-weight-bold"><?php echo $row["nationality"];?>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="mb-0">Phone 1</p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="text-muted mb-0 font-weight-bold"><?php echo $row["phone1"];?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="mb-0">Phone 2 <small>(Optional)</small></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="text-muted mb-0 font-weight-bold"><?php echo $row["phone2"];?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="mb-0">Gender</small></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="text-muted mb-0 font-weight-bold">
                                            <?php if($row["gender"]==1){echo "Male";}else{echo "Female";}?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="mb-0">marital status</small></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="text-muted mb-0 font-weight-bold"><?php echo $row["marital_status"];?>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="mb-0">qualification</small></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="text-muted mb-0 font-weight-bold"><?php echo $row["qualification"];?>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="mb-0">experience</small></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="text-muted mb-0 font-weight-bold">
                                            <?php echo strip_tags(html_entity_decode($row["experience"]));?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="mb-0">address</small></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="text-muted mb-0 font-weight-bold">
                                            <?php echo strip_tags(html_entity_decode($row["address"]));?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="card mb-4 mb-md-0 border border-primary">
                                    <div class="card-body">
                                        <h3 class="mb-4">bank Details</h3>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p class="mb-0">bank account name</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted mb-0 font-weight-bold">
                                                    <?php echo $row["bank_account_title"];?></p>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <p class="mb-0">bank Name</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted mb-0 font-weight-bold">
                                                    <?php echo $row["bank_name"];?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p class="mb-0">bank Branch Code</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted mb-0 font-weight-bold">
                                                    <?php echo $row["bank_branch_code"];?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p class="mb-0">bank account number</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted mb-0 font-weight-bold">
                                                    <?php echo $row["bank_account_number"];?></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="card mb-4 mb-md-0 border border-primary">
                                    <div class="card-body">
                                        <h3 class="mb-4">zoom Details</h3>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p class="mb-0">zoom username</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted mb-0 font-weight-bold">
                                                    <?php echo $row["zoom_username"];?></p>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <p class="mb-0">zoom_id</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted mb-0 font-weight-bold">
                                                    <?php echo $row["zoom_id"];?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p class="mb-0">zoom password</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted mb-0 font-weight-bold">
                                                    <?php echo $row["zoom_password"];?></p>
                                            </div>
                                        </div>
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