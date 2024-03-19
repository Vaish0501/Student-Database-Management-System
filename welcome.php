<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="stylewel.css">
    <style>
        body{
    padding: 50px;
    background-image: url('school2.jpg');
    background-size: cover;
    background-repeat: repeat;
    font-family:poppins;
    margin: 0;
    
}
        </style>
</head>
<body>
   <h1>WELCOME STUDENTS</h1>
    <?php
     if(isset($_POST['submit'])){
      
        $name=$_POST['name'];
    
        require("db_connect.php");
        $sql="SELECT * FROM `student_details`";
        $result=mysqli_query($con,$sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($name==$row["sname"]){
                    $enrollmentSuccessful = true; 
                    break; // Exit the loop since we found a match
                }
            }
        }
    
        if($enrollmentSuccessful){
            echo "<script> alert('Congratulations Enrollment Successful'); window.location.href='./login.php'; </script>";
        } else {
            echo "<script> alert('Sorry, better luck next time'); window.location.href='./login.php'; </script>";
        }
    }
        ?>
   <div class="container">
    <form action="welcome.php" method="post">

<div class="form-group">
<label for="name">Name</label>
<input type="text" class="form-control"  name="name"  placeholder="Enter name">

</div>
<div class="form-group">
<input type="submit" class="btn btn-dark" value="CHECK" name="submit">
</div>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>