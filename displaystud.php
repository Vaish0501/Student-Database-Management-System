<?php
include 'db_connect.php';

//extract($_POST);
if(isset($_POST['displaysSend'])){
    $tables='<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">SLNo</th>
        <th scope="col">Name</th>
        <th scope="col">Faculty</th>
        <th scope="col">Grade</th>
        <th scope="col">TYPE</th>
        <th scope="col">Action</th>
      </tr>
    </thead>';
    $sql="SELECT * FROM `student_details`";
    $result=mysqli_query($con,$sql);
    $num=1;
    while($row=mysqli_fetch_assoc($result)){
        $sid=$row['s_id'];
        $sdname=$row['sname'];
        $sdfac=$row['sfaculty'];
        $sdgra=$row['sgrade'];
        $sdty=$row['stype'];
        $tables.=' <tr>
        <td scope="row">'.$num.'</td>
        <td>'.$sdname.'</td>
        <td>'.$sdfac.'</td>
        <td>'.$sdgra.'</td>
        <td>'.$sdty.'</td>
        <td>
    <button class="btn btn-dark" onclick="upddstud('.$sid.')" >UPDATE</button>
    <button class="btn btn-danger" onclick="deletestudent('.$sid.')" >DELETE</button>
     </td>
      </tr>';
      $num++;
    }
    
     $tables.='</table>';
    echo $tables;
}