<!--**********************************
Nav header start
***********************************-->
<?php
require_once("../inc/logoutT.php");
?>
<style>
    .user-img img {
        height: 40px;
        width: 40px;
        border: 3px solid #fff;
        border-radius: 50%;
        margin: 0;
        padding: 0;
        box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.10);
    }

    .user-img .activity {
        height: 13px;
        width: 13px;
        border-radius: 50%;
        display: inline-block;
        position: absolute;
        border: 3px solid #fff;
        right: 0px;
        padding: 0;
        bottom: 0px;
        background-image: linear-gradient(230deg, #8bc34a, #4caf50) !important;
    }

    .dropdown-toggle::after {
        display: none !important;
    }

    .user-img {
        position: relative;
        top: -7px;
    }
</style>

<!--**********************************
Header end ti-comment-alt
***********************************-->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../images/LearnQuranlogo.png" style="max-width: 150px;" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto align-items-lg-center">
                <li class="nav-item <?php if($pageName == "dashboard"){echo "active";}else{echo "";}?>">
                    <a class="nav-link" href="dashboard">Dashboard</a>
                </li>
                <li class="nav-item <?php if($pageName == "course-materials"){echo "active";}else{echo "";}?>">
                    <a class="nav-link" href="course-materials">Course Materials</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <div class="user-img c-pointer position-relative">
                            <span class="activity active"></span>
                            <img src="../images/dashboard/teachers/<?php if ($_SESSION["TEACHER_LOGIN"]["IMAGE"] == "" || $_SESSION["TEACHER_LOGIN"]["IMAGE"] == null) {
                                echo "teacher.png";
                            } else {
                                echo $_SESSION["TEACHER_LOGIN"]["IMAGE"];
                            } ?>" height="40" width="40" alt="">
                        </div>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="manage-profile?id=<?php echo md5($_SESSION["TEACHER_LOGIN"]["ID"]) ?>&pid=<?php echo $_SESSION["TEACHER_LOGIN"]["ID"] ?>">Profile</a>
                        
                        <a class="dropdown-item" href="?action=logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>