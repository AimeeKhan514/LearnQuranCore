<?php
require_once("../inc/admin-top.php");
$name = "";
$password = "";
$image = "";
$father_name = "";
$cnic = "";
$nationality = "";
$phone1 = "";
$phone2 = "";
$gender = "";
$marital_status = "";
$qualification = "";
$experience = "";
$address = "";
$bank_account_title = "";
$bank_name = "";
$bank_branch_code = "";
$bank_account_number = "";
$zoom_username = "";
$zoom_id = "";
$zoom_password = "";

$required = "required";
$btnName = "Update Record";
if(isset($_GET["id"]) && $_GET["id"]!=""){
    $id = getSaveValue($conn, $_GET["id"]);
    if($id == md5($_SESSION["TEACHER_LOGIN"]["ID"])){
        $id = $_SESSION["TEACHER_LOGIN"]["ID"];
        $required = "";
     
        $res = mysqli_query($conn, "SELECT * FROM `teachers` WHERE `id`='$id'");
        $row = mysqli_fetch_array($res);
    
        $name = $row["name"];
        $password = $row["password"];
        $image = $row["image"];
        $father_name = $row["father_name"];
        $cnic = $row["cnic"];
        $nationality = $row["nationality"];
        $phone1 = $row["phone1"];
        $phone2 = $row["phone2"];
        $gender = $row["gender"];
        $marital_status = $row["marital_status"];
        $qualification = $row["qualification"];
        $experience = $row["experience"];
        $address = $row["address"];
        $bank_account_title = $row["bank_account_title"];
        $bank_name = $row["bank_name"];
        $bank_branch_code = $row["bank_branch_code"];
        $bank_account_number = $row["bank_account_number"];
        $zoom_username = $row["zoom_username"];
        $zoom_id = $row["zoom_id"];
        $zoom_password = $row["zoom_password"];
        $getName =  getName($conn,'admins',$row["added_by"]);

        if (isset($_POST["submit"])) {
            $name = getSaveValue($conn, $_POST["name"]);
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
                move_uploaded_file($image_tmp,'../images/dashboard/teachers/'.$image);
                
            }
        
            $father_name = getSaveValue($conn, $_POST["father_name"]);
            $cnic = getSaveValue($conn, $_POST["cnic"]);
            $nationality = getSaveValue($conn, $_POST["nationality"]);
            $phone1 = getSaveValue($conn, $_POST["phone1"]);
            $phone2 = getSaveValue($conn, $_POST["phone2"]);
            $gender = getSaveValue($conn, $_POST["gender"]);
            $marital_status = getSaveValue($conn, $_POST["marital_status"]);
            $qualification = getSaveValue($conn, $_POST["qualification"]);
            $address = getSaveValue($conn, $_POST["address"]);
            $experience = getSaveValue($conn, $_POST["experience"]);
            $bank_account_title = getSaveValue($conn, $_POST["bank_account_title"]);
            $bank_name = getSaveValue($conn, $_POST["bank_name"]);
            $bank_branch_code = getSaveValue($conn, $_POST["bank_branch_code"]);
            $bank_account_number = getSaveValue($conn, $_POST["bank_account_number"]);
            $zoom_username = getSaveValue($conn, $_POST["zoom_username"]);
            $zoom_id = getSaveValue($conn, $_POST["zoom_id"]);
            $zoom_password = getSaveValue($conn, $_POST["zoom_password"]);
            
        
            $res = mysqli_query($conn, "UPDATE `teachers` SET `name`='$name',`password`='$password',`image`='$image',`father_name`='$father_name',`cnic`='$cnic',`nationality`='$nationality',`phone1`='$phone1',`phone2`='$phone2',`gender`='$gender',`marital_status`='$marital_status',`qualification`='$qualification',`experience`='$experience',`address`='$address',`bank_account_title`='$bank_account_title',`bank_name`='$bank_name',`bank_branch_code`='$bank_branch_code',`bank_account_number`='$bank_account_number',`zoom_username`='$zoom_username',`zoom_id`='$zoom_id',`zoom_password`='$zoom_password' WHERE `id`='$id'");
            if ($res) {

                $_SESSION["TEACHER_LOGIN"]["NAME"] = $name;
                $_SESSION["TEACHER_LOGIN"]["PASSWORD"] = $password;
                $_SESSION["TEACHER_LOGIN"]["IMAGE"] = $image;
    
                $msg = '<div class="alert alert-success alert-dismissible fade show msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button> <strong>Success!</strong> Updated Successfully.</div>';
                // header("location:edit-profile?id=".md5($_SESSION["TEACHER_LOGIN"]["ID"]));
            } else {
                $msg = '<div class="alert alert-danger alert-dismissible fade show msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button> <strong>Warning!</strong> Error in Updating.</div>';
            }
        }
      
            
    }else{
        $_SESSION["msgupdate"] = '<div class="alert alert-warning alert-dismissible fade show msg">
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

echo $msg;

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

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-4 text-capitalize">
                        <div class="card mb-4 border border-primary">
                            <div class="card-body text-center">
                                <img src="../images/dashboard/teachers/<?php echo $_SESSION["TEACHER_LOGIN"]["IMAGE"];?>" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px; height:150px;">
                                <h5 class="my-3"><?php echo $_SESSION["TEACHER_LOGIN"]["NAME"];?></h5>
                                <p class="text-muted mb-1"><?php echo $row["email"];?></p>
                                <p class="mb-4 badge badge-info" data-toggle="tooltip" data-placement="top"
                                    title="<?php if($getName["role"]==1){echo "Admin";}else{echo "Editor";}?>">
                                    Added By: <?php echo $getName["name"];
                                                ?></p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="profile?id=<?php echo md5($_SESSION["TEACHER_LOGIN"]["ID"]) ?>"
                                        class="btn btn-primary">Back To Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 text-capitalize">
                        <div class="card mb-4 border border-primary">
                            <div class="card-body">
                                <h1 class="mb-4">Personal Bio</h1>
                                <form class="form-valide" action="" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="name">Name <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="E.g. John Doe" value="<?php echo $name; ?>"
                                                    <?php echo $required;?>>
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
                                                    name="password" placeholder="E.g. Password@123" value=""
                                                    <?php echo $required;?>>
                                                <input type="hidden" name="password_old"
                                                    value="<?php echo $password; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="image">Image <span
                                                    class="small">(Optional)</span>
                                            </label>
                                            <div class="">
                                                <input type="file" class="form-control" id="image" name="image"
                                                    placeholder="E.g. Fashion" value="<?php echo $image; ?>">
                                                <input type="hidden" name="image_old" value="<?php echo $image; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="father_name">Father Name <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="father_name"
                                                    name="father_name" placeholder="E.g. John Doe"
                                                    value="<?php echo $father_name; ?>" <?php echo $required;?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="cnic">Cnic <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="cnic" name="cnic"
                                                    placeholder="E.g. 00000-0000000-0" value="<?php echo $cnic; ?>"
                                                    <?php echo $required;?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="nationality">Nationality <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="nationality"
                                                    name="nationality" placeholder="E.g. Pakistani"
                                                    value="<?php echo $nationality; ?>" <?php echo $required;?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="phone1">Phone 1<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="phone1" name="phone1"
                                                    placeholder="E.g. 00000000000" value="<?php echo $phone1; ?>"
                                                    <?php echo $required;?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="phone2">Phone 2 <span
                                                    class="small">(Optional)</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="phone2" name="phone2"
                                                    placeholder="E.g. 00000000000" value="<?php echo $phone2; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="gender">Gender <span
                                                    class="text-danger">*</span>
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
                                            <label class="col-form-label" for="marital_status">Marital Status <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <select class="form-control" id="marital_status" name="marital_status">
                                                    <option value="Single"
                                                        <?php if($marital_status=="Single"){echo "selected";}else{echo "";}?>>
                                                        Single</option>
                                                    <option value="Married"
                                                        <?php if($marital_status=="Married"){echo "selected";}else{echo "";}?>>
                                                        Married</option>
                                                    <option value="Divorced"
                                                        <?php if($marital_status=="Divorced"){echo "selected";}else{echo "";}?>>
                                                        Divorced</option>
                                                    <option value="Widowed"
                                                        <?php if($marital_status=="Widowed"){echo "selected";}else{echo "";}?>>
                                                        Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="qualification">Qualification<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="qualification"
                                                    name="qualification" placeholder="E.g. BSCS"
                                                    value="<?php echo $qualification; ?>" <?php echo $required;?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="experience">Experience<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <textarea class="form-control" id="experience" name="experience"
                                                    placeholder="E.g. 4 Years"
                                                    <?php echo $required;?>><?php echo $experience; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="address">Address<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <textarea class="form-control" id="address" name="address"
                                                    placeholder="E.g. Type Address"
                                                    <?php echo $required;?>><?php echo $address; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h3>Bank Details</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="bank_account_title">Account Title <span
                                                    class="small">(Optional)</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="bank_account_title"
                                                    name="bank_account_title" placeholder="E.g. John Doe"
                                                    value="<?php echo $bank_account_title; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="bank_name">Bank Name <span
                                                    class="small">(Optional)</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="bank_name" name="bank_name"
                                                    placeholder="E.g. HBL" value="<?php echo $bank_name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="bank_branch_code">Branch Code <span
                                                    class="small">(Optional)</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="bank_branch_code"
                                                    name="bank_branch_code" placeholder="E.g. 1481"
                                                    value="<?php echo $bank_branch_code; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="bank_account_number">Account Number <span
                                                    class="small">(Optional)</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="bank_account_number"
                                                    name="bank_account_number" placeholder="E.g. 0000000000"
                                                    value="<?php echo $bank_account_number; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h3>Zoom Details</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="zoom_username">User Name <span
                                                    class="small">(Optional)</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="zoom_username"
                                                    name="zoom_username" placeholder="E.g. John Doe"
                                                    value="<?php echo $zoom_username; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="zoom_id">Zoom ID <span
                                                    class="small">(Optional)</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="zoom_id" name="zoom_id"
                                                    placeholder="E.g. 00000000000" value="<?php echo $zoom_id; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="zoom_password">Zoom Password <span
                                                    class="small">(Optional)</span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" id="zoom_password"
                                                    name="zoom_password" placeholder="E.g. ********"
                                                    value="<?php echo $zoom_password; ?>">
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

                <!-- #/ container -->
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