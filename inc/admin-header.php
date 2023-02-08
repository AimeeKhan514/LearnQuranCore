<!--**********************************
Nav header start
***********************************-->
<?php
require_once("../inc/logout.php");
?>
<div class="nav-header">
<div class="brand-logo">
    <a href="index" class="pt-2">
    <img src="../images/footerlogo.png" class="img-fluid"  alt="Logo">
        <!-- <b class="logo-abbr"><img src="../images/footerlogo.png" alt=""> </b> -->
        <!-- <span class="logo-compact"><img src="../images/footerlogo.png" alt=""></span> -->
        <!-- <span class="brand-title">
            <img src="../images/footerlogo.png" class="img-fluid" alt="">
        </span> -->
    </a>
</div>
</div>
<!--**********************************
Nav header end
***********************************-->

<!--**********************************
Header start
***********************************-->
<div class="header">
<div class="header-content clearfix">

    <div class="nav-control">
        <div class="hamburger">
            <span class="toggle-icon"><i class="icon-menu"></i></span>
        </div>
    </div>
    <!-- <div class="header-left">
        <div class="input-group icons">
            <div class="input-group-prepend">
                <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
            </div>
            <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
            <div class="drop-down animated flipInX d-md-none">
                <form action="#"></form>
                    <input type="text" class="form-control" placeholder="Search">
                </form>
            </div>
        </div>
    </div> -->
    <div class="header-right">
        <ul class="clearfix">
            <li class="icons dropdown">
                <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                    <span class="activity active"></span>
                    <img src="../images/dashboard/admins/<?php if($_SESSION["ADMIN_LOGIN"]["IMAGE"]=="" || $_SESSION["ADMIN_LOGIN"]["IMAGE"]==null){echo "manager.png";}else{echo $_SESSION["ADMIN_LOGIN"]["IMAGE"];}?>" height="40" width="40" alt="">
                </div>
                <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                    <div class="dropdown-content-body">
                        <ul>
                            <li>
                                <a href="manage-profile?id=<?php echo md5($_SESSION["ADMIN_LOGIN"]["ID"])?>"><i class="icon-user"></i> <span>Profile</span></a>
                            </li>


                            <hr class="my-2">

                            <li><a href="?action=logout"><i class="icon-key"></i> <span>Logout</span></a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>
<!--**********************************
Header end ti-comment-alt
***********************************-->
