<?php 
$conn = mysqli_connect("localhost","root","","learnqurancore");
if(!$conn){
    header("location:404");
}
?>