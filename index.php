<?php
session_start();
require("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
       *{
        margin: 0PX;
        
       }
     /*  .main{
        background-image: url('library-869061_640.jpg');
    background-size: cover;
    background-repeat: repeat;
       }
       */
        .header{
            font-family: poppins;
            display:flex;
            justify-content: space-around;
            align-items: center;
            padding: 0px 60px;
            background-color: blueviolet;
        }
        div.header button{
            background-color: green;
            font-size: 16px;
            font-weight: 600;
            padding: 8px 12px;
            border:2px solid black;
            border-radius: 5px;
        }
        .card{
            display: flex;
        }
        .container {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  display:inline-block;
  width: 50%;
  height:100px;
  margin:100px 100px;
  padding:20px;
}

.card2{
            display: flex;
}
.container1 {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.5);
  transition: 0.3s;
  display:inline-block;
  width: 50%;
  height:100px;
  margin:100px 100px;
  padding:20px;
}
.card2 button {
  padding: 10px 20px;
  background-color: #3498db;
  color: #fff;
  border: none;
  border-radius: 5px;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5);
  cursor: pointer;
  transition: transform 0.2s, box-shadow 0.2s;
}

.card2 button:hover {
  transform: scale(1.05); /* Increase the size slightly on hover */
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.5); /* Add a stronger shadow on hover */
}
#p1{
  text-align: center;
  font-family: "Lucida Console", "Courier New", monospace;
  font-size: 30px;
  text-shadow: 2px 2px 5px red;
}
#p2{
  text-align: center;
  font-family: "Lucida Console", "Courier New", monospace;
  font-size: 30px;
  text-shadow: 2px 2px 5px red;
}
#hone{
  text-align: center;
  font-family: "Lucida Console", "Courier New", monospace;
  font-size: 30px;
}
#htwo{
  text-align: center;
  font-family: "Lucida Console", "Courier New", monospace;
  font-size: 30px;
}

        </style>
   
</head>
<body>
  <div class="main">
    <div class="header">
    <h1>STUDENT DATABASE MANAGEMENT SYSTEM </h1>
    <h2>WELCOME <?php echo $_SESSION['AdminLoginId']?></h2>
    <form method="post">
    <button name="Logout">LOG OUT</button>
    </form>
    </div>
    <div class="card">
 
 <div class="container">
   <h4 id="hone"><b>STUDENT DISPLAY</b></h4> 
   <p id="p1"><?php 
   $sql="SELECT * FROM `student_details`";
   $result=mysqli_query($con,$sql);
    echo $result->num_rows;
   ?></p> 
 </div>


 
 <div class="container">
   <h4 id="htwo"><b>FACULTY DISPLAY</b></h4> 
   <p id="p2"><?php 
   $sql="SELECT * FROM `faculty_details`";
   $result=mysqli_query($con,$sql);
    echo $result->num_rows;
   ?></p> 
 </div>
</div>
<div class=card2>
<div class="container1">
   <h4><b>Student Page</b></h4> 
  <button id="studentadd">CHECK</button> 
 </div>
 <div class="container1">
   <h4><b>FACULTY Page</b></h4> 
   <button id="facultyadd">CHECK</button> 
 </div>
 <div class="container1">
   <h4><b>Grade and Level</b></h4> 
   <button id="gradeadd">CHECK</button> 
 </div>
</div>
    <?php
    if(isset($_POST['Logout'])){
        session_destroy();
        header("location:login.php");
    
    }
    ?>
    </div>
</body>
<script>
            document.getElementById('studentadd').addEventListener('click', function() {
  window.location.href = 'managestudent.php'; 
});
document.getElementById('facultyadd').addEventListener('click', function() {
  window.location.href = 'managefaculty.php'; 
});
document.getElementById('gradeadd').addEventListener('click', function() {
  window.location.href = 'managegrade.php'; 
});
            </script>
</html>