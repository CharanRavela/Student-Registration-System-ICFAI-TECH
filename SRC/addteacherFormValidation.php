<?php
/**
 * Created by PhpStorm.
 * User: MSaqib
 * Date: 23-09-2016
 * Time: 22:04
 */
include 'connection.php';
if (isset($_POST['TN']) && isset($_POST['TF'])) {
    $name = $_POST['TN'];
    $facno = $_POST['TF'];
	$N ="N";
	// $designation = $_POST['TD'];
    //$alias = $_POST['AL'];
    //$contact = $_POST['TP'];
    //$email = $_POST['TE'];
    //  $message = "nTry again.";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    $message = "Some values missing. Please add again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "INSERT INTO faculty VALUES ('$facno','$name','$N')");

if ($q) {
    $message = "Faculty added.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href= \"addteachers.php\";</script>";
    //header("Location:addteachers.php");
} else {
    $message = "Faculty not added.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href= \"addteachers.php\"</script>";
}

?>