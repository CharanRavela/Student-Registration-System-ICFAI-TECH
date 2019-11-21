<?php
/**
 * Created by PhpStorm.
 * User: MSaqib
 * Date: 16-11-2016
 * Time: 14:13
 */
include 'connection.php';
$id = $_GET['name'];
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
    "UPDATE subjects  SET isAlloted = '0' , allotedto = '',allotedto2 = '',allotedto3 = '' WHERE subject_code = '$id' ");
if ($q) {
    $message = "Deleted successfully.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = \"allotsubjects.php\";</script>";
    //header("Location:allotsubjects.php");

} else {
    $message = "Deletion  failed.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = \"allotsubjects.php\";</script>";
    
}