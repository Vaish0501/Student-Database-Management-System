<?php
include 'db_connect.php';
if(isset($_POST['updid'])){
$studentuni=$_POST['updid'];
$sql="SELECT * FROM `grade_level` WHERE g_id=$studentuni";
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
    $ngrade=$_POST['upgrade'];
    $nsection=$_POST['upsection'];
    $sql="UPDATE `grade_level` SET level ='$ngrade', section ='$nsection' WHERE g_id=$uniqueid ";
    $result=mysqli_query($con,$sql);
}
//Faculty


?>