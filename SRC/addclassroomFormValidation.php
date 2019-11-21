<?php
/**
 * Created by PhpStorm.
 * User: MSaqib
 * Date: 23-09-2016
 * Time: 22:04
 */
include 'connection.php';
if (isset($_POST['RN']) && isset($_POST['cid']) && isset($_POST['S'])) {
    $CRNO = $_POST['RN'];
	$cid =  $_POST['cid'];
	$section =$_POST['S'];
    //  $message = "nTry again.";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    $message = "Some values missing. Please add again.";
    die();
    echo "<script type='text/javascript'>alert('$message'); window.location.href= \"addclassrooms.php\"</script>";
}
$N= "N";
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "INSERT INTO classroom_details VALUES ('$CRNO','$cid','$section','$N')");
if ($q) {
    $message = "Classroom added.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href= \"addclassrooms.php\"</script>";
    //header("Location:addclassrooms.php");
} else {
    $message = "Classroom not added\\nTry again.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href= \"addclassrooms.php\"</script>";
    // header("Location:index.html");

}
?>