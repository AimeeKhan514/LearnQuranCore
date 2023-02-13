<?php
require_once("../inc/config.php");
require_once("../inc/functions.php");
$subcategory_id = getSaveValue($conn, $_POST["subcategory_id"]);
$res = mysqli_query($conn, "SELECT * FROM `chapters` WHERE `subcategory_id`='$subcategory_id'");
if(mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
        echo '<option value="' . $row["id"] . '">' . $row["title"] . '</option>';
    }

}else{
    echo '<option value="">No Data Found.</option>';
}
?>