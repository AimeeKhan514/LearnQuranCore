<?php
require_once("../inc/admin-top.php");
require_once("../inc/getData.php");

$title = "";
$category_id = "";
$btnName = "Add Record";
if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0) {
    $btnName = "Update Record";
    $id = $_GET["id"];
    $res = mysqli_query($conn, "SELECT * FROM `$table` WHERE `id`='$id'");
    $row = mysqli_fetch_array($res);

    $title = $row["title"];
    $category_id = $row["category_id"];
}
if (isset($_POST["submit"])) {

    $title = getSaveValue($conn, $_POST["title"]);
    $category_id = getSaveValue($conn, $_POST["category_id"]);
    if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] > 0) {
        $res = mysqli_query($conn, "UPDATE `$table` SET `title`='$title',`category_id`='$category_id' WHERE `id`='$id'");
        if ($res) {
            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Success!</strong> Updated Successfully.</div>';
            header("location:sub-categories");
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show msg">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Warning!</strong> Error in Updating.</div>';
        }
    } else {
        $res = mysqli_query($conn, "INSERT INTO `$table` (`title`,`category_id`) VALUES ('$title','$category_id')");
        if ($res) {
            $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button> <strong>Success!</strong> Added Successfully.</div>';
            header("location:sub-categories");
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
                                    <form class="form-valide" action="" method="post">
                                        <div  class="row">
                                        <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="category_id">Categories <span class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <select class="form-control" id="category_id" name="category_id">
                                                   
                                                <option value="0" hidden selected>Select Categories</option>
                                                <?php
                                            
                                            $resCat = mysqli_query($conn,"SELECT * FROM `categories` WHERE `trashed_on`='' AND `status`='1'");

                                            if(mysqli_num_rows($resCat)>0){
                                                while($rowCat = mysqli_fetch_array($resCat)){
                                                    if($rowCat["id"]==$category_id){
                                                        $selected = "selected";
                                                    }else{
                                                        $selected = "";
                                                    }

                                                    echo '<option value="'.$rowCat["id"].'" '.$selected.'>'.$rowCat["title"].'</option>';
                                                    
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