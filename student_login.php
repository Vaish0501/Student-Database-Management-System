

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="stylestudent.css">
    <style>
    .head{
    text-align: center;
    font-size: 20px;
   
}
body{
    background-image: url('ss.jpg');
    background-size: cover;
 
    background-repeat: no-repeat;
  
}
</style>
</head>
<body>
<div class="head">
  <h1>Register Page</h1>
</div>
    <div  class="container">
    <?php


    if(isset($_POST['submit'])){
        echo "Success";
        $stnames=$_POST['username'];
        $stemails=$_POST['stemail'];
        $stpasss=$_POST['stpass'];
        $strepasss=$_POST['strepass'];
        $passwordHash=password_hash($stpasss,PASSWORD_DEFAULT);
        $errors=array();
        if(empty($stnames) || empty($stemails) || empty($stpasss) || empty($strepasss)){
            array_push($errors,"All fields are not filled");
    
        }
        if(!filter_var($stemails, FILTER_VALIDATE_EMAIL)){
            array_push($errors,"Email is not valid");
        }
        if(strlen($stpasss)<8){
            array_push($errors,"Password should be 8 characters");
        }
        if($stpasss!==$strepasss){
            array_push($errors,"Password does not match");
        }
        require("db_connect.php");
        $sql="SELECT * FROM `studlogin` WHERE studemail='$stemails'";
        $result=mysqli_query($con,$sql);
        $rowCount=mysqli_num_rows($result);
        if($rowCount>0){
            array_push($errors,"Email exists");
        }
        if(count($errors)>0){
            foreach($errors as $value){
                echo "<div class ='alert alert-danger'>$value</div>";
            }
           
        }
        else{
         
            $sql="INSERT INTO `studlogin`(studname,studemail,studpass) VALUES(?,?,?)";
           $stmt=mysqli_stmt_init($con);
          $prepareStmt= mysqli_stmt_prepare($stmt,$sql);
          if($prepareStmt){
            mysqli_stmt_bind_param($stmt,"sss",$stnames,$stemails,$passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<script> alert('Registered Succesfully');
            window.location.href='./studsignin.php'; </script>";
          }
          else{
            die("SOmething went wrong");
          }
        }
    }
    


?>
        <form action="student_login.php" method="post">

        <div class="form-group">
        <label for="username">NAME</label>
    <input type="text" class="form-control"  name="username"  placeholder="Enter name">
  
  </div>
  <div class="form-group">
  <label for="stemail">EMAIL</label>
    <input type="text" class="form-control" name="stemail"  placeholder="Enter email">
  
  </div>
  <div class="form-group">
  <label for="stpass">PASSWORD</label>
    <input type="password" class="form-control" name="stpass"  placeholder="Enter password">
  
  </div>
  <div class="form-group">
  <label for="strepass">CORRECT PASSWORD</label>
    <input type="password" class="form-control" name="strepass"  placeholder="Enter password">
  
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-dark" value="Register" name="submit">
  </div>
        </form>
    </div>
</body>
</html>