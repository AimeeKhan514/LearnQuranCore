<?php
function ddArr($str){
    echo "<pre>";
    print_r($str);
    echo "</pre>";
    die();
}
function dArr($str){
    echo "<pre>";
    print_r($str);
    echo "</pre>";
    
}
function getSaveValue($conn,$str){
    $str = mysqli_real_escape_string($conn,$str);
    $str = htmlentities($str);
    return $str;

}
function getTotalRecords($conn, $tableName="" ,$status=""){
    $sql = " SELECT * FROM `$tableName` ";
    if($status!=""){
        $sql .= " WHERE `status` = '$status' ";
    }
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)>0){
        $count = mysqli_num_rows($res);
    }else{
        $count = 0;
    }
    return $count;

}
function getTitle($conn, $table='', $id){
    $sql = " SELECT * FROM  `$table` WHERE `id`=$id";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        echo $row["title"];
    }else{
        echo 0;
    }
    
}

function getCount($conn, $table="",$col="", $id=""){
    $sql = " SELECT * FROM  `$table` WHERE `$col`=$id";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        echo mysqli_num_rows($res);
    }else{
        echo 0;
    }
    
}
function getAuthorName($conn, $role, $id){
if($role==1 || $role==2){
    $sql = " SELECT * FROM  `admins` WHERE `id`='$id' ";
}elseif($role==3){
    $sql = " SELECT * FROM  `users` WHERE  `id`='$id' ";
}

    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        echo $row["name"];
    }else{
        echo "Anonymous";
    }
    
}
?>