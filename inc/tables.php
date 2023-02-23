<?php
if($pageName == "manage-categories" || $pageName == "categories" || $pageName == "trashed-categories"){
    $table =  "categories";
}
if($pageName == "manage-sub-categories" || $pageName == "sub-categories" || $pageName == "trashed-sub-categories"){
    $table = "subcategories";
}
if($pageName == "users" || $pageName == "trashed-users"){
    $table = "users";
}
if($pageName == "manage-chapters" || $pageName == "chapters" || $pageName == "trashed-chapters"){
    $table = "chapters";
}
if($pageName == "manage-chapters-details" || $pageName == "chapters-details" || $pageName == "trashed-chapters-details"){
    $table = "chaptersdetails";
}
if($pageName == "manage-profile" || $pageName == "profile" || $pageName == "trashed-profile"){
    $table = "admins";
}
if($pageName == "manage-teachers" || $pageName == "teachers" || $pageName == "trashed-teachers"){
    $table = "teachers";
}
if($pageName == "manage-students" || $pageName == "students" || $pageName == "trashed-students"){
    $table = "students";
}
if($pageName == "manage-classes" || $pageName == "classes" || $pageName == "trashed-classes"){
    $table = "classes";
}


?>