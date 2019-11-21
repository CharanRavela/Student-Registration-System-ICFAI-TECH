<?php
/**
 * Created by PhpStorm.
 * User: MSaqib
 * Date: 02-09-2016
 * Time: 23:29
 */
session_start();
include 'connection.php';
if (isset($_POST['SN']) && isset($_POST['SPASS'])) {
    $id = $_POST['SN'];
    $password = $_POST['SPASS'];
} else {
    die();
}
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "SELECT S_name,registered FROM student WHERE sid = '$id' and password = '$password'");
if (mysqli_num_rows($q) == 1) {
    $row = mysqli_fetch_assoc($q);
    $_SESSION['loggedin_name'] = $row['S_name'];
    $_SESSION['loggedin_id'] = $id;
    $registered = $row['registered'];
    if($registered == "N"){
        header("Location:studentPage.php");
    }
    else
    {
        header("Location:studentPage2.php");
    }
    
} else {
    $message = "Invalid Enrollment no or password.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = \"index.php\";</script>";
}

/*
if (mysqli_num_rows($q) == 1) {
    $row = mysqli_fetch_assoc($q);
    echo 'welcome ' . $row['S_name'];
} else {
    $message = "Invalid Enrollment Number.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";

}*/
?>