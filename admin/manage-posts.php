<?php
require_once("../inc/admin-top.php");
require_once("../inc/getData.php");

$user_id = "";
$category_id = "";
$subcategory_id = "";
$title = "";
$featured_image = "";
$image1 = "";
$image2 = "";
$description = "";
$role = "";


$btnName = "Add Record";
if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0) {
    $btnName = "Update Record";
    $id = $_GET["id"];
    $res = mysqli_query($conn, "SELECT * FROM `$table` WHERE `id`='$id'");
    $row = mysqli_fetch_array($res);

    $user_id = $row["user_id"];
    $category_id = $row["category_id"];
    $subcategory_id = $row["subcategory_id"];
    $title = $row["title"];
    $featured_image = $row["featured_image"];
    $image1 = $row["image1"];
    $image2 = $row["image2"];
    $description = $row["description"];
    $role = $row["role"];
    $description = $row["description"];
}
if (isset($_POST["submit"])) {
    $user_id = getSaveValue($conn, $_SESSION["ADMIN_LOGIN"]["ID"]);
    $category_id = getSaveValue($conn, $_POST["category_id"]);
    $subcategory_id = getSaveValue($conn, $_POST["subcategory_id"]);
    $title = getSaveValue($conn, $_POST["title"]);
    
    
    if(empty($_FILES["featured_image"]["name"])){
        $featured_image = getSaveValue($conn,$_POST["featured_image_old"]);
    }else{
        $featured_image = $_FILES["featured_image"]["name"];
        $featured_image = rand(111111111,999999999)."_".$featured_image;
        $featured_image_tmp = $_FILES["featured_image"]["tmp_name"];
        move_uploaded_file($featured_image_tmp,'../images/posts/'.$featured_image);
        
    }
    if(empty($_FILES["image1"]["name"])){
        $image1 = getSaveValue($conn,$_POST["image1_old"]);
    }else{
        $image1 = $_FILES["image1"]["name"];
        $image1 = rand(111111111,999999999)."_".$image1;
        $image1_tmp = $_FILES["image1"]["tmp_name"];
        move_uploaded_file($image1_tmp,'../images/posts/'.$image1);
        
    }
    if(empty($_FILES["image2"]["name"])){
        $image2 = getSaveValue($conn,$_POST["image2_old"]);
    }else{
        $image2 = $_FILES["image2"]["name"];
        $image2= rand(111111111,999999999)."_".$image2;
        $image2_tmp = $_FILES["image2"]["tmp_name"];
        move_uploaded_file($image2_tmp,'../images/posts/'.$image2);
        
    }

    

    $description = getSaveValue($conn, $_POST["description"]);
    $role = $_SESSION["ADMIN_LOGIN"]["ROLE"];
    // $role = getSaveValue($conn, $_POST["role"]);


    if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0) {
        $res = mysqli_query($conn, "UPDATE `$table` SET `user_id`='$user_id',`category_id`='$category_id',`subcategory_id`='$subcategory_id',`title`='$title',`featured_image`='$featured_image',`image1`='$image1',`image2`='$image2',`description`='$description',`role`='$role' WHERE `id`='$id'");
        if ($res) {
            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Success!</strong> Updated Successfully.</div>';
            header("location:posts");
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Warning!</strong> Error in Updating.</div>';
        }
    } else {
        $res = mysqli_query($conn, "INSERT INTO `$table` (`user_id`, `category_id`, `subcategory_id`, `title`, `featured_image`, `image1`, `image2`, `description`,`role`) VALUES ('$user_id','$category_id', '$subcategory_id', '$title','$featured_image','$image1','$image2','$description','$role')");
        if ($res) {
            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button> <strong>Success!</strong> Added Successfully.</div>';
            header("location:posts");
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
                                                    <label class="col-form-label" for="category_id">Categories <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <select class="form-control" id="category_id" name="category_id">

                                                            <option value="" hidden selected>Select Categories</option>
                                                            <?php

                                                            $resCat = mysqli_query($conn, "SELECT * FROM `categories` WHERE `trashed_on`='' AND `status`='1'");

                                                            if (mysqli_num_rows($resCat) > 0) {
                                                                while ($rowCat = mysqli_fetch_array($resCat)) {
                                                                    if ($rowCat["id"] == $category_id) {
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
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="subcategory_id">Sub Categories <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <select class="form-control" id="subcategory_id" name="subcategory_id">
                                                            <!-- <option value="" hidden selected>Select Sub Categories</option> -->
                                                            <?php
                                                            if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0){
                                                                $resSubCat = mysqli_query($conn, "SELECT * FROM `subcategories` WHERE `trashed_on`='' AND `status`='1' AND `category_id`='$category_id'");

                                                            if (mysqli_num_rows($resSubCat) > 0) {
                                                                while ($rowSubCat = mysqli_fetch_array($resSubCat)) {
                                                                  
                                                                    if ($rowSubCat["id"] == $subcategory_id) {
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
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="title">Title <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="title" name="title" placeholder="E.g. Fashion" value="<?php echo $title; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="featured_image">Featured Image <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="file" class="form-control" id="featured_image" name="featured_image" placeholder="E.g. Fashion" value="<?php echo $featured_image; ?>">
                                                        <input type="hidden" name="featured_image_old" value="<?php echo $featured_image; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="image1">Image1 <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="file" class="form-control" id="image1" name="image1">
                                                        <input type="hidden" name="image1_old" value="<?php echo $image1; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="image2">Image2 <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="file" class="form-control" id="image2" name="image2" value="<?php echo $image2; ?>">
                                                        <input type="hidden" name="image2_old" value="<?php echo $image2; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="description">Description <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary" name="submit"><?php echo $btnName; ?></button>
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

        $(document).ready(function(){
           $("#category_id").change(function(){
            $category_id = $("#category_id").val();
            $.ajax({
                "url":"getCategories.php",
                "type":"post",
                "data":"category_id="+$category_id,
                "success":function(result){
                    $("#subcategory_id").html(result);

                }
            });
            

           });
        });

    </script>