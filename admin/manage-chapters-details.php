<?php
require_once("../inc/admin-top.php");
require_once("../inc/getData.php");

$chapter_id = "";
$subcategory_id = "";
$title = "";
$image = "";



$btnName = "Add Record";
if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0) {
    $btnName = "Update Record";
    $id = $_GET["id"];
    $res = mysqli_query($conn, "SELECT * FROM `$table` WHERE `id`='$id'");
    $row = mysqli_fetch_array($res);


    $chapter_id = $row["chapter_id"];
    $subcategory_id = $row["subcategory_id"];
    $title = $row["title"];
    $image = $row["image"];

}
if (isset($_POST["submit"])) {

    $chapter_id = getSaveValue($conn, $_POST["chapter_id"]);
    $subcategory_id = getSaveValue($conn, $_POST["subcategory_id"]);
    $title = getSaveValue($conn, $_POST["title"]);
    
    
    if(empty($_FILES["image"]["name"])){
        $image = getSaveValue($conn,$_POST["image_old"]);
    }else{
        $image = $_FILES["image"]["name"];
        $image = rand(111111111,999999999)."_".$image;
        $image_tmp = $_FILES["image"]["tmp_name"];
        move_uploaded_file($image_tmp,'../images/dashboard/chapters-details/'.$image);
        
    }


    if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0) {
        $res = mysqli_query($conn, "UPDATE `$table` SET `chapter_id`='$chapter_id',`subcategory_id`='$subcategory_id',`title`='$title',`image`='$image' WHERE `id`='$id'");
        if ($res) {
            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Success!</strong> Updated Successfully.</div>';
            header("location:chapters-details");
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Warning!</strong> Error in Updating.</div>';
        }
    } else {
        $res = mysqli_query($conn, "INSERT INTO `$table` (`chapter_id`, `subcategory_id`, `title`, `image`) VALUES ('$chapter_id', '$subcategory_id', '$title','$image')");
        if ($res) {
            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button> <strong>Success!</strong> Added Successfully.</div>';
            header("location:chapters-details");
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
                                                    <label class="col-form-label" for="subcategory_id">Sub Categories <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <select class="form-control" id="subcategory_id" name="subcategory_id">

                                                            <option value="" hidden selected>Select Sub Categories</option>
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
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="chapter_id">Chapters<span class="text-danger">*</span>
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
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="title">Title <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="title" name="title" placeholder="E.g. Norani Qaida 1" value="<?php echo $title; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="col-form-label" for="image">Image <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="file" class="form-control" id="image" name="image" placeholder="E.g. Fashion" value="<?php echo $image; ?>">
                                                        <input type="hidden" name="image_old" value="<?php echo $image; ?>">
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
           $("#subcategory_id").change(function(){
            $subcategory_id = $("#subcategory_id").val();
            $.ajax({
                "url":"getChapters.php",
                "type":"post",
                "data":"subcategory_id="+$subcategory_id,
                "success":function(result){
                    $("#chapter_id").html(result);

                }
            });
            

           });
        });

    </script>