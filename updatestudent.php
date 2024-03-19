<?php
include 'db_connect.php';
if(isset($_POST['updid'])){
$studentuni=$_POST['updid'];
$sql="SELECT * FROM `student_details` WHERE s_id=$studentuni";
$result=mysqli_query($con,$sql);
$response=array();
while($row=mysqli_fetch_assoc($result)){
    $response=$row;

}
echo json_encode($response);


}else{
    $response['status']=200;
    $response['message']="Invalid";
}

if(isset($_POST['hiddenData'])){
    $uniqueid=$_POST['hiddenData'];
    $nsname=$_POST['upsnam'];
    $nsfac=$_POST['upsfac'];
    $nstgrade=$_POST['upsgrade'];
    $nstype=$_POST['upstype'];
   
    $sql="UPDATE `student_details` SET sname ='$nsname', sfaculty ='$nsfac' , sgrade ='$nstgrade', stype ='$nstype' WHERE s_id=$uniqueid ";
    $result=mysqli_query($con,$sql);
}
?>