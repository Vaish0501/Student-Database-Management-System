
<?php
//Faculty
include 'db_connect.php';
if(isset($_POST['updfid'])){
    $facultyuni=$_POST['updfid'];
    $sql="SELECT * FROM `faculty_details` WHERE f_id=$facultyuni";
    $result=mysqli_query($con,$sql);
    $response=array();
    while($row=mysqli_fetch_assoc($result)){
        $response=$row;
    
    }
    echo json_encode($response);
    
    
    }
    else{
        $response['status']=200;
        $response['message']="Invalid";
    }
    if(isset($_POST['hiddenFac'])){
        $uniquefid=$_POST['hiddenFac'];
        $nname=$_POST['upname'];
        $nemail=$_POST['upemail'];
        $nphone=$_POST['upphone'];
        $sql="UPDATE `faculty_details` SET fname ='$nname', femail ='$nemail',fphone='$nphone' WHERE f_id=$uniquefid ";
        $result=mysqli_query($con,$sql);
    }

    ?>