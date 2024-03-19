<?php
include 'db_connect.php';

extract($_POST);
if(isset($_POST['nameAdd']) && isset($_POST['emailAdd'])  && isset($_POST['phoneAdd'])){
    $sql="INSERT INTO `faculty_details`(fname,femail,fphone) VALUES('$nameAdd','$emailAdd','$phoneAdd')";
    $result=mysqli_query($con,$sql);
}
?>
