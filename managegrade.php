<?php
require("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRade add</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>


<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD CLASS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
  <div class="form-group">
    <label for="grade">GRADE</label>
    <input type="text" class="form-control" id="grade"  placeholder="Enter grade">
  
  </div>
  <div class="form-group">
    <label for="section">SECTION</label>
    <input type="text" class="form-control" id="section"  placeholder="Enter section">
  
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" onclick="addstud()" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-danger" id="combutton">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Update Modal-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE CLASS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
  <div class="form-group">
    <label for="upgrade">GRADE</label>
    <input type="text" class="form-control" id="upgrade"  placeholder="Enter grade">
  
  </div>
  <div class="form-group">
    <label for="upsection">SECTION</label>
    <input type="text" class="form-control" id="upsection"  placeholder="Enter section">
  
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark"  data-dismiss="modal" onclick="updatestud()">UPDATE</button>
        <button type="button" class="btn btn-danger" id="mybutton">Close</button>
        <input type="hidden" id="hiddenData">
      </div>
    </div>
  </div>
</div>

    <div class="container my-3">
        <h1 class="text-center">CLASS DATABASE</h1>
        <button type="button" class="btn btn-dark my-4" data-toggle="modal" data-target="#completeModal">
 ADD GRADE
</button>
<div id="displayDataTable">

</div>
    </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
  $(document).ready(function(){
    displayData();
  });
    //display function
  function   displayData(){
   // alert("Called");
        var displayData="true";
        $.ajax({
          url:'display.php',
          type:'POST',
          data:{
            displaySend:displayData,
          },
          success:function(data,status){
          // console.log(data);
          // console.log(status);
            $('#displayDataTable').html(data);
          }
        })
      
    }

function addstud(){
    var gr=$('#grade').val();
    var sec=$('#section').val();


    $.ajax({
            url:'insertgrade.php',
            type:'POST',
        data:{
            gradeAdd:gr,
            sectionAdd:sec,
        },
        success:function(data,status){
           // console.log(status);
           $('#completeModal').modal('hide');
            displayData();
        }
               
            }
        
    )

}
//delete student
function deletestud(deleteid){
  $.ajax({
    url:'delete.php',
    type:'POST',
    data:{
      deleteSend:deleteid,
    },
    success(data,status){
      displayData();
      alert("DATA DELETED SUCCESSFULLY");
    }
  });

}
function updstud(updid){
$('#hiddenData').val(updid);
$.post("update.php",{updid:updid},function(data,status){
  var studentdetails=JSON.parse(data);
  $('#upgrade').val(studentdetails.level);
  $('#upsection').val(studentdetails.section);
})


$('#updateModal').modal("show");

}
//udate of form
function updatestud(){

var upgrade=$('#upgrade').val();
var upsection=$('#upsection').val();
var hiddenData=$('#hiddenData').val();
$.post("update.php",{upgrade:upgrade,upsection:upsection,hiddenData:hiddenData},function(data,status){
  console.log(data);

displayData();
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