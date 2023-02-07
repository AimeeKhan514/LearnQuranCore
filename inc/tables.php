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
if($pageName == "manage-posts" || $pageName == "posts" || $pageName == "trashed-posts"){
    $table = "posts";
}
if($pageName == "manage-profile" || $pageName == "profile" || $pageName == "trashed-profile"){
    $table = "admins";
}


?>