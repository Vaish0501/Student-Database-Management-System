<?php
include 'db_connect.php';
if(isset($_POST['deleteSend'])){
    $unique=$_POST['deleteSend'];
    $sql="DELETE FROM `grade_level` WHERE g_id=$unique ";
    $result=mysqli_query($con,$sql);
}

if(isset($_POST['deleteSendfac'])){
    $unique=$_POST['deleteSendfac'];
    $sql="DELETE FROM `faculty_details` WHERE f_id=$unique ";
    $result=mysqli_query($con,$sql);
}

if(isset($_POST['deletestudSend'])){
    $unique=$_POST['deletestudSend'];
    $sql="DELETE  FROM `student_details` WHERE s_id=$unique ";
    $result=mysqli_query($con,$sql);
}
?>
