<?php
require_once("../inc/config.php");
require_once("../inc/functions.php");
$category_id = getSaveValue($conn, $_POST["category_id"]);
$res = mysqli_query($conn, "SELECT * FROM `subcategories` WHERE `category_id`='$category_id'");
if(mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
        echo '<option value="' . $row["id"] . '">' . $row["title"] . '</option>';
    }

}else{
    echo '<option value="">No Data Found.</option>';
}
?>