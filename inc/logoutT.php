<?php
if(isset($_GET["action"]) && $_GET["action"]=="logout"){
    unset($_SESSION["TEACHER_LOGIN"]);
    header("location:index");
}

if(!isset($_SESSION["TEACHER_LOGIN"])){
    header("location:index");
    die(); 
}

?>