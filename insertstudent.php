<?php
include 'db_connect.php';

extract($_POST);
if(isset($_POST['snameAdd']) && isset($_POST['sddAdd']) && isset($_POST['saddAdd']) && isset($_POST['sgenAdd'])&& isset($_POST['sfacAdd']) 
&& isset($_POST['sgradeAdd']) && isset($_POST['stypeAdd'])){
    $date=date('Y-m-d',strtotime($_POST['sddAdd']));
    $sql="INSERT INTO `student_details`(sname,doj,sadd,sgender,sfaculty,sgrade,stype) VALUES('$snameAdd','$date','$saddAdd','$sgenAdd','$sfacAdd','$sgradeAdd','$stypeAdd')";
    $result=mysqli_query($con,$sql);
}
?>





