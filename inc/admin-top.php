<?php
ob_start();
session_start();
require_once("../inc/config.php");
require_once("../inc/functions.php");
$pageName =  basename($_SERVER["PHP_SELF"],".php");
$msg = "";
// dArr($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="Aimee Khan" />

    <title><?php echo ucwords(str_replace("-"," ",$pageName))?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">

    <link href="../plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">

</head>