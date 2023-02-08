<div class="nk-sidebar">
<div class="nk-nav-scroll">
    <ul class="metismenu" id="menu">
        <li class="nav-label"><?php echo $_SESSION["ADMIN_LOGIN"]["NAME"]?></li>
        <!-- <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="./index">Home 1</a></li>
                <li><a href="./index-2">Home 2</a></li>
            </ul>
        </li> -->

        <li>
            <a href="dashboard" aria-expanded="false">
                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
            </a>
        </li>
        <li class="<?php if($pageName == "manage-teachers" || $pageName == "trashed-teachers"){echo "active";}else{echo "";}?>">
            <a href="teachers" aria-expanded="false" class="<?php if($pageName == "manage-teachers" || $pageName == "trashed-teachers"){echo "active";}else{echo "";}?>">
                <i class="icon-menu menu-icon"></i><span class="nav-text">Teachers</span>
            </a>
        </li>
        <li class="<?php if($pageName == "manage-students" || $pageName == "trashed-students"){echo "active";}else{echo "";}?>">
            <a href="students" aria-expanded="false" class="<?php if($pageName == "manage-students" || $pageName == "trashed-students"){echo "active";}else{echo "";}?>">
                <i class="icon-list menu-icon"></i><span class="nav-text">Students</span>
            </a>
        </li>
        <li class="<?php if($pageName == "manage-classes" || $pageName == "trashed-classes"){echo "active";}else{echo "";}?>">
            <a href="classes" aria-expanded="false" class="<?php if($pageName == "manage-classes" || $pageName == "trashed-classes"){echo "active";}else{echo "";}?>">
                <i class="icon-docs menu-icon"></i><span class="nav-text">Classes</span>
            </a>
        </li>
<?php
if($_SESSION["ADMIN_LOGIN"]["ROLE"]==1){
?>
        <li class="<?php if($pageName == "manage-profile" || $pageName == "trashed-profile"){echo "active";}else{echo "";}?>">
            <a href="profile" aria-expanded="false" class="<?php if($pageName == "manage-profile" || $pageName == "trashed-profile"){echo "active";}else{echo "";}?>">
                <i class="icon-people menu-icon"></i><span class="nav-text">Profile</span>
            </a>
        </li>
<?php }?>
        <li class="<?php if($pageName == "users" || $pageName == "trashed-users"){echo "active";}else{echo "";}?>">
            <a href="users" aria-expanded="false" class="<?php if($pageName == "users" || $pageName == "trashed-users"){echo "active";}else{echo "";}?>">
                <i class="icon-user menu-icon"></i><span class="nav-text">Users</span>
            </a>
        </li>

    </ul>
</div>
</div>