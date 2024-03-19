<?php
require("db_connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
  <div class="form-group">
    <label for="sname">NAME</label>
    <input type="text" class="form-control" id="sname"  placeholder="Enter name">
  
  </div>
  <div class="form-group">
    <label for="sdoj">DOJ</label>
    <input type="date" class="form-control" id="sdoj"  placeholder="Enter data of join">
  
  </div>

  <div class="form-group">
    <label for="sadd">ADDRESS</label>
    <input type="text" class="form-control" id="sadd"  placeholder="Enter address">
  
  </div>
  <div>GENDER</div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="studmale" value="male" >
  <label class="form-check-label" for="studmale">
    Male
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="studfemale" value="female">
  <label class="form-check-label" for="studfemale">
  Female
  </label>

</div>
<div class="form-group">
<select name="inputfaculty" class="form-control">
<?php
$sql="SELECT * FROM `faculty_details`";
$result=mysqli_query($con,$sql);
       echo "<option >Choose Faculty</option>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["fname"] . '">' . $row["fname"] . '</option>';
            }
        }
        ?>
      </select>
</div>

<div class="form-group">
<select name="inputgrade" class="form-control">
    <?php
     $sql="SELECT * FROM `grade_level`";
     $result=mysqli_query($con,$sql);
     echo "<option >Choose Grade</option>";
     if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
             echo '<option value="' . $row["level"] . '">' . $row["level"] . '</option>';
         }
     }
        ?>
      </select>
</div>
<div>Enrollment Type</div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="enroll" id="newtype" value="new" >
  <label class="form-check-label" for="newtype">
   New
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="enroll" id="transtype" value="transfer">
  <label class="form-check-label" for="transtype">
 Transfer
  </label>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal" onclick="addstudent()">Save</button>
        <button type="button" class="btn btn-danger" id="combutton">Close</button>
      </div>
    </div>
  </div>
</div>
<!--Update Modal-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE STUDENT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
    <label for="upsname">NAME</label>
    <input type="text" class="form-control" id="upsname"  placeholder="Enter name">

      </div>
      <div class="form-group">
<select name="upinputfaculty" class="form-control">
<?php
$sql="SELECT * FROM `faculty_details`";
$result=mysqli_query($con,$sql);
       echo "<option >Choose Faculty</option>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["fname"] . '">' . $row["fname"] . '</option>';
            }
        }
        ?>
      </select>
</div>

<div class="form-group">
<select name="upinputgrade" class="form-control">
    <?php
     $sql="SELECT * FROM `grade_level`";
     $result=mysqli_query($con,$sql);
     echo "<option >Choose Grade</option>";
     if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
             echo '<option value="' . $row["level"] . '">' . $row["level"] . '</option>';
         }
     }
        ?>
      </select>
</div>
<div>Enrollment Type</div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="upenroll" id="upnewtype" value="new" >
  <label class="form-check-label" for="newtype">
   New
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="upenroll" id="uptranstype" value="transfer">
  <label class="form-check-label" for="transtype">
 Transfer
  </label>

</div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-dark"  data-dismiss="modal" onclick="updatestudents()">UPDATE</button>
        <button type="button" class="btn btn-danger" id="mybutton">Close</button>
        <input type="hidden" id="hiddenStudentData">
      </div>
    </div>
  </div>
</div>
<div class="container my-3">
        <h1 class="text-center">STUDENT DATABASE</h1>
        <button type="button" class="btn btn-dark my-4" data-toggle="modal" data-target="#completeModal">
 ADD STUDENT
</button>
<div id="displayStudTable">

</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
     $(document).ready(function(){
    displayStud();
  });
  function   displayStud(){
   // alert("Called");
        var displayData="true";
        $.ajax({
          url:'displaystud.php',
          type:'POST',
          data:{
            displaysSend:displayData,
          },
          success:function(data,status){
           //console.log(data);
           
            $('#displayStudTable').html(data);
          }
        })
      
    }

function addstudent(){

    var snam=$('#sname').val();
    var sd=$('#sdoj').val();
    var sa=$('#sadd').val();
    var sg=$("[name='gender']:checked").val();
    var sfac=$("[name='inputfaculty']").val();
    var sgrade=$("[name='inputgrade']").val();
    var stype=$("[name='enroll']:checked").val();


    $.ajax({
            url:'insertstudent.php',
            type:'POST',
        data:{
           snameAdd:snam,
           sddAdd:sd,
           saddAdd:sa,
           sgenAdd:sg,
           sfacAdd:sfac,
           sgradeAdd:sgrade,
           stypeAdd:stype,
        },
        success:function(data,status){
            //console.log(status);
            displayStud();
          
        }
               
            }
        
    )

}

//delete student
function deletestudent(deleteid){
  $.ajax({
    url:'delete.php',
    type:'POST',
    data:{
      deletestudSend:deleteid,
    },
    success(data,status){
      displayStud();
      alert("DATA DELETED SUCCESSFULLY");
    }
  });

}

function upddstud(updid){
$('#hiddenStudentData').val(updid);
$.post("updatestudent.php",{updid:updid},function(data,status){
  var updatedetails=JSON.parse(data);
  $('#upsname').val(updatedetails.sname);
 $("[name='upinputfaculty']").val(updatedetails.sfaculty);
  $("[name='upinputgrade']").val(updatedetails.sgrade);
 // $("[name='upenroll']").val(updatedetails.stype);
 
})


$('#updateModal').modal("show");

}
//udate of form
function updatestudents(){
    var upsnam=$('#upsname').val();
    var upsfac=$("[name='upinputfaculty']").val();
    var upsgrade=$("[name='upinputgrade']").val();
    var upstype=$("[name='upenroll']:checked").val();

var hiddenData=$('#hiddenStudentData').val();
$.post("updatestudent.php",{upsnam:upsnam,upsfac:upsfac,upsgrade:upsgrade,upstype:upstype,hiddenData:hiddenData},function(data,status){
  console.log(data);
  console.log(status);
displayStud();
});
}
document.getElementById('mybutton').addEventListener('click', function() {

$('#updateModal').modal("hide");
});
document.getElementById('combutton').addEventListener('click', function() {

$('#completeModal').modal("hide");
});
</script>
</body>
</html>
