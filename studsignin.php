<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="stylestudent.css">
    <style>
    .head{
    text-align: center;
    font-size: 20px;
}
body{
    background-image: url('student2.jpg');
    background-size: cover;
 
    background-repeat: no-repeat;
  
}
</style>
</head>
<body>
<div class="head">
  <h1>Login Page</h1>
</div>
<div class="container">
    <?php
     if(isset($_POST['submit'])){
      
        $stemail=$_POST['stemail'];
        $stpasss=$_POST['stpass'];
        require("db_connect.php");
        $sql="SELECT * FROM `studlogin` WHERE studemail='$stemail'";
        $result=mysqli_query($con,$sql);
        $user=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if($user){
            if(password_verify($stpasss,$user["studpass"])){
                header("Location:welcome.php");
                die();
            }
            else{
                echo "<div class ='alert alert-danger'>Wrong entry</div>";
        }
    }
        else{
            echo "<div class ='alert alert-danger'>Wrong entry</div>";
        }

     }
    ?>
<form action="studsignin.php" method="post">

<div class="form-group">
<label for="stemail">EMAIL</label>
<input type="text" class="form-control"  name="stemail"  placeholder="Enter name">

</div>
<div class="form-group">
<label for="stpass">PASSWORD</label>
<input type="password" class="form-control" name="stpass"  placeholder="Enter password">

</div>


<div class="form-group">
<input type="submit" class="btn btn-dark" value="Login" name="submit">
</div>
</form>
</div>