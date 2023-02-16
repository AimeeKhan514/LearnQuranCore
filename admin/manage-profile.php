<?php
require_once("../inc/admin-top.php");
require_once("../inc/getData.php");


$name = "";
$email = "";
$password = "";
$image = "";
$role = "";
$required = "";

$btnName = "Add Record";
if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0) {
    $btnName = "Update Record";
    $required = "";
    $id = $_GET["id"];
    $pid = $_GET["pid"];
    if($id == md5($pid)){
        $id = $pid;
    }else{
        header("location:dashboard");
        die();
    }
    $res = mysqli_query($conn, "SELECT * FROM `$table` WHERE `id`='$id'");
    $row = mysqli_fetch_array($res);

    $name = $row["name"];
    $email = $row["email"];
    $password = $row["password"];
    $image = $row["image"];
    $role = $row["role"];
}
if (isset($_POST["submit"])) {
    $name = getSaveValue($conn, $_POST["name"]);
    $email = getSaveValue($conn, $_POST["email"]);
    
    $role = getSaveValue($conn, $_POST["role"]);
   
    if(empty($_POST["password"])){
        $password = getSaveValue($conn,$_POST["password_old"]);
    }else{
        $password = getSaveValue($conn, $_POST["password"]);
        $password = md5($password);
        
    }
    
    
    if(empty($_FILES["image"]["name"])){
        $image = getSaveValue($conn,$_POST["image_old"]);
    }else{
        $image = $_FILES["image"]["name"];
        $image = rand(111111111,999999999)."_".$image;
        $image_tmp = $_FILES["image"]["tmp_name"];
        move_uploaded_file($image_tmp,'../images/dashboard/admins/'.$image);
        
    }
    if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0) {
        $res = mysqli_query($conn, "UPDATE `$table` SET `name`='$name',`email`='$email',`password`='$password',`image`='$image',`role`='$role' WHERE `id`='$id'");
        if ($res) {

            $_SESSION["ADMIN_LOGIN"]["NAME"] = $name;
            $_SESSION["ADMIN_LOGIN"]["EMAIL"] = $email;
            $_SESSION["ADMIN_LOGIN"]["PASSWORD"] = $password;
            $_SESSION["ADMIN_LOGIN"]["IMAGE"] = $image;

            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Success!</strong> Updated Successfully.</div>';
            header("location:profile");
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Warning!</strong> Error in Updating.</div>';
        }
    } else {
        $res = mysqli_query($conn, "INSERT INTO `$table` (`name`, `email`, `password`, `image`,`role`) VALUES ('$name','$email', '$password', '$image','$role')");
        if ($res) {
            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button> <strong>Success!</strong> Added Successfully.</div>';
            header("location:profile");
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

                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="name">Name <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            placeholder="E.g. Admin" value="<?php echo $name; ?>" <?php echo $required;?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                    if($_SESSION["ADMIN_LOGIN"]["ROLE"]==1){
                                    ?>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="email">Email <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="email" name="email"
                                                            placeholder="E.g. Admin@mail.com"
                                                            value="<?php echo $email; ?>" <?php echo $required;?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="password">Password <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="password" class="form-control" id="password"
                                                            name="password" placeholder="E.g. Admin@123" value="" <?php echo $required;?>>
                                                        <input type="hidden" name="password_old"
                                                            value="<?php echo $password; ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="image">Featured Image <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="file" class="form-control" id="image" name="image"
                                                            placeholder="E.g. Fashion" value="<?php echo $image; ?>" <?php echo $required;?>>
                                                        <input type="hidden" name="image_old"
                                                            value="<?php echo $image; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
if($_SESSION["ADMIN_LOGIN"]["ROLE"]==1){
?>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="role">Role <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <select class="form-control" id="role" name="role">

                                                            <option value="" hidden selected>Select Role</option>
                                                            <option value="1"
                                                                <?php if($role==1){echo "selected";}else{echo "";}?>>
                                                                Admin</option>
                                                            <option value="2"
                                                                <?php if($role==2){echo "selected";}else{echo "";}?>>
                                                                Editor</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>

                                        </div>


                                        <div class="form-group">
                                            <div class="col-12">
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