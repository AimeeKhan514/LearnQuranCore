<?php
require_once("../inc/admin-top.php");
if(isset($_SESSION["ADMIN_LOGIN"])){
    header("location:dashboard");
    die(); 
}

if(isset($_POST["btn_login"])){
    $email = getSaveValue($conn,$_POST["email"]);
    $password = getSaveValue($conn,$_POST["password"]);
    $password = md5($password);
    $res = mysqli_query($conn,"SELECT * FROM `admins` WHERE `email`='$email' AND BINARY `password`='$password' AND `status`='1'");
    
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        $_SESSION["ADMIN_LOGIN"][] = true;
        $_SESSION["ADMIN_LOGIN"]["NAME"] = $row["name"];
        $_SESSION["ADMIN_LOGIN"]["EMAIL"] = $row["email"];
        $_SESSION["ADMIN_LOGIN"]["PASSWORD"] = $row["password"];
        $_SESSION["ADMIN_LOGIN"]["IMAGE"] = $row["image"];
        $_SESSION["ADMIN_LOGIN"]["ID"] = $row["id"];
        $_SESSION["ADMIN_LOGIN"]["ROLE"] = $row["role"];
        header("location:dashboard");
    }else{
        $msg = '<div class="alert alert-danger alert-dismissible fade show ">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button> <strong>Warning!</strong> Wrong Email or Password.</div>';
    }


}

if(isset($_SESSION["msg"])){
    echo $_SESSION["msg"];
    unset($_SESSION["msg"]);
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



        <!--**********************************
            Sidebar start
        ***********************************-->

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="login-form-bg h-100 pt-5">
                <div class="container h-100">
                    <div class="row justify-content-center h-100">
                        <div class="col-xl-6">
                            <div class="form-input-content">
                                <div class="card login-form mb-0">
                                    <div class="card-body pt-5">
                                        <a class="text-center" href="index">
                                            <div class="col-8 mx-auto">
                                            <img src="../images/LearnQuranlogo.png" alt="Learn Quran Logo" class="img-fluid">
                                            </div>
                                        </a>
                                       
                                        <form class="mt-5 mb-5 login-input" action="" method="post">
                                            <div class="form-group">
                                            <label class="col-form-label" for="email">Email <span class="text-danger">*</span>
                                            </label>
                                                <input type="email" class="form-control" placeholder="E.g. example@mail.com" name="email" id="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required title="Please Enter A Valid Email">
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="col-form-label" for="password">Password <span class="text-danger">*</span>
                                            </label>
                                                <input type="password" class="form-control" placeholder="E.g. Password@123" name="password" id="password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$" title="The Minimum Password Length is 8 and Must contain at least 1 number, 1 uppercase, 1 lowercase, 1 Special character">
                                            </div>
                                            <button class="btn login-form__btn submit w-100" name="btn_login">Login</button>
                                        </form>
                                        <?php echo $msg;?>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
require_once("../inc/admin-bottom.php")
?>