<?php
/**
 * Created by PhpStorm.
 * User: MSaqib
 * Date: 16-11-2016
 * Time: 14:46
 */
include 'connection.php';
$crno = $_GET['crno'];
$cid = $_GET['cid'];
$sec = $_GET['sec'];
echo "<script type = \"text/javascript\">alert(".$crno,$cid,$sec.");</script>";

$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
    "update classroom_details set DELETED = \"Y\" WHERE CRNO = '$crno' and cid = '$cid' and section = '$sec' ");
if ($q) {
    $message = "Deleted Successfully.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = \"addclassrooms.php\";</script>";
    //header("Location:addclassrooms.php");

} else {
    $message = "Deletion failed.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = \"addclassrooms.php\";</script>";
    
}