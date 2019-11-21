<?php
/**
 * Created by PhpStorm.
 * User: MSaqib
 * Date: 02-09-2016
 * Time: 23:29
 */
session_start();
include 'connection.php';
if (isset($_POST['FN'])) {
    $fac = $_POST['FN'];
} else {
    die();
}
$N= "N";
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "SELECT F_name FROM faculty WHERE fid = '$fac' and DELETED = '$N' ");
if (mysqli_num_rows($q) == 1) {
    $row = mysqli_fetch_assoc($q);
    $_SESSION['loggedin_name'] = $row['F_name'];
    $_SESSION['loggedin_id'] = $fac;
    header("Location:facultypage.php");
} else {
    $message = "Invalid Username\\nTry again.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = \"index.php\";</script>";
}
/*if (mysqli_num_rows($q) == 1) {
    $row = mysqli_fetch_assoc($q);
    echo 'welcome ' . $row['F_name'];
} else {
    $message = "Invalid Faculty Number.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    //header("Location:index.php");
}*/
?>