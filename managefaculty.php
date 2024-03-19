<?php
require("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty ADD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
</head>
    <body>
<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD FACULTY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
  <div class="form-group">
    <label for="name">NAME</label>
    <input type="text" class="form-control" id="name"  placeholder="Enter name">
  
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email"  placeholder="Enter email">
    </div>

    <div class="form-group">
    <label for="phone">PHONE</label>
    <input type="text" class="form-control" id="phone"  placeholder="Enter phone">
  
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal" onclick="addfac()" >Save</button>
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
        <h5 class="modal-title" id="exampleModalLabel">UPDATE FACULTY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
  <div class="form-group">
    <label for="upname">NAME</label>
    <input type="text" class="form-control" id="upname"  placeholder="Enter name">
  
  </div>
  <div class="form-group">
    <label for="upemail">EMAIL</label>
    <input type="text" class="form-control" id="upemail"  placeholder="Enter email">
  
  </div>
  <div class="form-group">
    <label for="upphone">PHONE</label>
    <input type="text" class="form-control" id="upphone"  placeholder="Enter phone">
  
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark"  data-dismiss="modal" onclick="updatesfac()">UPDATE</button>
        <button type="button" class="btn btn-danger" id="mybutton">Close</button>
        <input type="hidden" id="hiddenFac">
      </div>
    </div>
  </div>
</div>
    
    <div class="container my-3">
        <h1 class="text-center">FACULTY DATABASE</h1>
        <button type="button" class="btn btn-dark my-4" data-toggle="modal" data-target="#completeModal">
 ADD FACULTY
</button>
<div id="displayFacTable">

</div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
   $(document).ready(function(){
    displayFac();
  });

  function   displayFac(){
   //alert("Called");
        var displayFac="true";
        $.ajax({
          url:'display.php',
          type:'POST',
          data:{
            displaySendf:displayFac,
          },
          success:function(data,status){
           console.log(data);
          //console.log(status);
            $('#displayFacTable').html(data);
          }
        })
      
    }

    function addfac(){
    var nam=$('#name').val();
    var ema=$('#email').val();
    var ph=$('#phone').val();


    $.ajax({
            url:'insertfaculty.php',
            type:'POST',
        data:{
            nameAdd:nam,
            emailAdd:ema,
            phoneAdd:ph,
        },
        success:function(data,status){
            console.log(status);
            displayFac();
        
        }
               
            }
        
    )

}
//delete
function deletefac(deleteid){
  $.ajax({
    url:'delete.php',
    type:'POST',
    data:{
      deleteSendfac:deleteid,
    },
    success(data,status){
      displayFac();
      alert("DATA DELETED SUCCESSFULLY");
    }
  });

}

function updfac(updfid){
$('#hiddenFac').val(updfid);
$.post("updatefac.php",{updfid:updfid},function(data,status){
  console.log(status);
  var facultydetails=JSON.parse(data);
  $('#upname').val(facultydetails.fname);
  $('#upemail').val(facultydetails.femail);
  $('#upphone').val(facultydetails.fphone);
})


$('#updateModal').modal("show");

}
function updatesfac(){

var upname=$('#upname').val();
var upemail=$('#upemail').val();
var upphone=$('#upphone').val();
var hiddenFac=$('#hiddenFac').val();
$.post("updatefac.php",{upname:upname,upemail:upemail,upphone:upphone,hiddenFac:hiddenFac},function(data,status){
  console.log(data);

displayFac();
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