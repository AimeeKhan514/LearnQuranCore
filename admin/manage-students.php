<?php
require_once("../inc/admin-top.php");
require_once("../inc/getData.php");


$name = "";
$email = "";
$password = "";
$image = "";
$father_name = "";
$nationality = "";
$phone = "";
$gender = "";
$qualification = "";
$address = "";
$added_by = "";
$required = "required";

$btnName = "Add Record";
if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0) {
    $btnName = "Update Record";
    $required = "";
    $id = $_GET["id"];
    $res = mysqli_query($conn, "SELECT * FROM `$table` WHERE `id`='$id'");
    $row = mysqli_fetch_array($res);

    $name = $row["name"];
    $email = $row["email"];
    $password = $row["password"];
    $image = $row["image"];
    $father_name = $row["father_name"];
    $nationality = $row["nationality"];
    $phone = $row["phone"];
    $gender = $row["gender"];
    $qualification = $row["qualification"];
    $address = $row["address"];
    $added_by = $_SESSION["AUTH_LOGIN"]["ID"];
}
if (isset($_POST["submit"])) {
    $name = getSaveValue($conn, $_POST["name"]);
    $email = getSaveValue($conn, $_POST["email"]);

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
        move_uploaded_file($image_tmp,'../images/dashboard/students/'.$image);
        
    }

    $father_name = getSaveValue($conn, $_POST["father_name"]);
    $nationality = getSaveValue($conn, $_POST["nationality"]);
    $phone = getSaveValue($conn, $_POST["phone"]);
    $gender = getSaveValue($conn, $_POST["gender"]);
    $qualification = getSaveValue($conn, $_POST["qualification"]);
    $address = getSaveValue($conn, $_POST["address"]);
    $added_by = $_SESSION["AUTH_LOGIN"]["ID"];

    if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0) {
        $res = mysqli_query($conn, "UPDATE `$table` SET `name`='$name',`email`='$email',`password`='$password',`image`='$image',`father_name`='$father_name',`nationality`='$nationality',`phone`='$phone',`gender`='$gender',`qualification`='$qualification',`address`='$address',`added_by`='$added_by' WHERE `id`='$id'");
        if ($res) {

            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Success!</strong> Updated Successfully.</div>';
            header("location:students");
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Warning!</strong> Error in Updating.</div>';
        }
    } else {
        $res = mysqli_query($conn, "INSERT INTO `$table` (`name`, `email`, `password`, `image`, `father_name`,  `nationality`, `phone`, `gender`, `qualification`, `address`, `added_by`) VALUES ('$name','$email', '$password', '$image','$father_name','$nationality','$phone','$gender','$qualification','$address','$added_by')");
        if ($res) {
            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button> <strong>Success!</strong> Added Successfully.</div>';
            header("location:students");
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

                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="name">Name <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            placeholder="E.g. John Doe" value="<?php echo $name; ?>" <?php echo $required;?>>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="email">Email <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="email" name="email"
                                                            placeholder="E.g. example@mail.com"
                                                            value="<?php echo $email; ?>" <?php echo $required;?>>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="password">Password <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="password" class="form-control" id="password"
                                                            name="password" placeholder="E.g. Password@123" value="" <?php echo $required;?>>
                                                        <input type="hidden" name="password_old"
                                                            value="<?php echo $password; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="image">Image <span class="small">(Optional)</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="file" class="form-control" id="image" name="image"
                                                            placeholder="E.g. Fashion" value="<?php echo $image; ?>">
                                                        <input type="hidden" name="image_old"
                                                            value="<?php echo $image; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="father_name">Father Name <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="father_name" name="father_name"
                                                            placeholder="E.g. John Doe" value="<?php echo $father_name; ?>" <?php echo $required;?>>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="nationality">Nationality <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="nationality" name="nationality"
                                                            placeholder="E.g. Pakistani" value="<?php echo $nationality; ?>" <?php echo $required;?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="phone">Phone  <span class="small">(Optional)</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="phone" name="phone"
                                                            placeholder="E.g. 00000000000" value="<?php echo $phone; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="gender">Gender 
                                                    </label>
                                                    <div class="">
                                                        <select class="form-control" id="gender" name="gender">
                                                            <option value="1"
                                                                <?php if($gender==1){echo "selected";}else{echo "";}?>>
                                                                Male</option>
                                                            <option value="2"
                                                                <?php if($gender==2){echo "selected";}else{echo "";}?>>
                                                                Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="qualification">Qualification <span class="small">(Optional)</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="qualification" name="qualification"
                                                            placeholder="E.g. BSCS" value="<?php echo $qualification; ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="address">Address<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <textarea class="form-control" id="address" name="address" placeholder="E.g. Type Address"><?php echo $address; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
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