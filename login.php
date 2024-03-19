<?php
require("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login page</title>
    <link rel="stylesheet" href="style.css">
    <style>
      .head{
    color: #fff;
    text-align: center;
    text-decoration: underline;
    font-size: 20px;
    
}

      </style>
</head>
<body>
<div class="navbar">
    <a href="./about.php">About</a>
    <a href="./student_login.php">Student Register</a>
    <a href="./studsignin.php">Student Login</a>
</div>
<div class="head">
  <h1>STUDENT DATABASE MANAGEMENT SYSTEM</h1>
</div>
  <div class="container">
    <div class="myform">
        <form method="POST">
            <h2>ADMIN LOGIN</h2>
            <input type="text" placeholder="Admin Name" name="AdminName">
            <input type="password" placeholder="Password" name="APassword">
            <button type="submit" name="signin">LOGIN</button>

        </form>
    </div>
    <div class="image">
        <img src="loginpage2.jpg" width="300px" height="200px" alt="image"/>

    </div>
  </div>  
  <?php
  if(isset($_POST['signin'])){
   $query="SELECT * FROM `users_login` WHERE `uname` ='$_POST[AdminName]' AND `password`='$_POST[APassword]'";
  $result= mysqli_query($con,$query);
  if(mysqli_num_rows($result)==1){
    session_start();
    $_SESSION['AdminLoginId']=$_POST['AdminName'];
    header("location:index.php");
  }
  else{
    echo "<script>alert('Incorrect username and password')</script>";
  }
  }
  ?>
</body>
</html>