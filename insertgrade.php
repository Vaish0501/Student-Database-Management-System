<?php
include 'db_connect.php';

extract($_POST);
if(isset($_POST['gradeAdd']) && isset($_POST['sectionAdd'])){
    $sql="INSERT INTO `grade_level`(level,section) VALUES('$gradeAdd','$sectionAdd')";
    $result=mysqli_query($con,$sql);
}
?>
