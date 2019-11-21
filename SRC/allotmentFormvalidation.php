<?php
/**
 * Created by PhpStorm.
 * User: MSaqib
 * Date: 23-09-2016
 * Time: 22:04
 */
include 'connection.php';
if (isset($_POST['tobealloted'])) {
    $subject = $_POST['tobealloted'];
    $teacher = $_POST['toalloted'];
    //  $message = "nTry again.";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    $message = "Some values missing. Please add again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "UPDATE subjects SET isAlloted=1, allotedto='$teacher' WHERE subject_code='$subject'");

if ($q) {
    $message = "Alloted.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = \"allotsubjects.php\";</script>";
    //header("Location:allotsubjects.php");
} else {
    $message = "Allotment failed.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = \"allotsubjects.php\";</script>";
    // header("Location:index.html");

}

?>