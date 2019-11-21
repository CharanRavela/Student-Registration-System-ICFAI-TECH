<?php
/**
 * Created by PhpStorm.
 * User: MSaqib
 * Date: 30-09-2016
 * Time: 22:44
 */
include 'connection.php';
$id = $_GET['name'];
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
    "Update faculty set DELETED = \"Y\" WHERE fid = '$id' ");
$drop = "DROP TABLE " . $id;

$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), $drop);
if ($drop) {
    $message = "Deleted Successfully.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = \"addteachers.php\";</script>";
    //header("Location:addteachers.php");

} else {
    $message = "Deletion failed.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = \"addteachers.php\";</script>";
}
?>

