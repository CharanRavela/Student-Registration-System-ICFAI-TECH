<?php
/**
 * Created by PhpStorm.
 * User: MSaqib
 * Date: 23-09-2016
 * Time: 22:04
 */
include 'connection.php';
if (isset($_POST['SN']) && isset($_POST['SC']) && isset($_POST['SS']) && isset($_POST['SD'])) {
    $name = $_POST['SN'];
    $code = $_POST['SC'];
    $sem = $_POST['SS'];
    $course = $_POST['ST'];
    $dept = $_POST['SD'];
    //  $message = "nTry again.";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    $message = "Some values are missing. Please add again.";
    die();
    echo "<script type='text/javascript'>alert('$message'); window.location.href= \"addsubjects.php\"</script>";
}
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "INSERT INTO subjects VALUES ('$code','$name','$course','$sem','$dept',0,'','','')");
if ($q) {
    $message = "Subject added.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href= \"addsubjects.php\"</script>";
    //header("Location:addsubjects.php");
} else {
    $message = "Subject not added. \\n Try again";
    echo "<script type='text/javascript'>alert('$message'); window.location.href= \"addsubjects.php\"</script>";
    // header("Location:index.php");

}
?>