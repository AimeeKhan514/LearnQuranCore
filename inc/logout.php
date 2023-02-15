<?php
if(isset($_GET["action"]) && $_GET["action"]=="logout"){
    unset($_SESSION["AUTH_LOGIN"]);
    header("location:index");
}

if(!isset($_SESSION["AUTH_LOGIN"])){
    header("location:index");
    die(); 
}

?>