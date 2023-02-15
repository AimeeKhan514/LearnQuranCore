<div class="nk-sidebar">
<div class="nk-nav-scroll">
    <ul class="metismenu" id="menu">
        <li class="nav-label"><?php echo $_SESSION["AUTH_LOGIN"]["NAME"]?></li>
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
       
       
        
       
      
      
        <li class="<?php if($pageName == "manage-classes" || $pageName == "trashed-classes"){echo "active";}else{echo "";}?>">
            <a href="classes" aria-expanded="false" class="<?php if($pageName == "manage-classes" || $pageName == "trashed-classes"){echo "active";}else{echo "";}?>">
                <i class="icon-docs menu-icon"></i><span class="nav-text">Classes</span>
            </a>
        </li>

        <li class="active">
            <a href="users" aria-expanded="false" class="active">
                <i class="icon-user menu-icon"></i><span class="nav-text">Logout</span>
            </a>
        </li>

    </ul>
</div>
</div>