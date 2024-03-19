<?php
include 'db_connect.php';

//extract($_POST);
if(isset($_POST['displaySend'])){
    $table='<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">SLNo</th>
        <th scope="col">Grade</th>
        <th scope="col">Section</th>
        <th scope="col">Action</th>
      </tr>
    </thead>';
    $sql="SELECT * FROM `grade_level`";
    $result=mysqli_query($con,$sql);
    $num=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['g_id'];
        $grade=$row['level'];
        $section=$row['section'];
        $table.=' <tr>
        <td scope="row">'.$num.'</td>
        <td>'.$grade.'</td>
        <td>'.$section.'</td>
        <td>
    <button class="btn btn-dark" onclick="updstud('.$id.')">UPDATE</button>
    <button class="btn btn-danger" onclick="deletestud('.$id.')">DELETE</button>
     </td>
      </tr>';
      $num++;
    }
    
     $table.='</table>';
    echo $table;
}
if(isset($_POST['displaySendf'])){
  $tablef='<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">SLNo</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Action</th>
      </tr>
    </thead>';
    $sql="SELECT * FROM `faculty_details`";
    $result=mysqli_query($con,$sql);
    $num=1;
    while($row=mysqli_fetch_assoc($result)){
        $fid=$row['f_id'];
        $name=$row['fname'];
        $email=$row['femail'];
        $phone=$row['fphone'];
        $tablef.=' <tr>
        <td scope="row">'.$num.'</td>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$phone.'</td>
        <td>
    <button class="btn btn-dark" onclick="updfac('.$fid.')">UPDATE</button>
    <button class="btn btn-danger" onclick="deletefac('.$fid.')">DELETE</button>
     </td>
      </tr>';
      $num++;
    }
    
     $tablef.='</table>';
    echo $tablef;

}
?>
