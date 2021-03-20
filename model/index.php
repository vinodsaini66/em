<?php 
include "config.php";
?>
<!doctype html>
<html>
 <head>
  <!-- CSS -->
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
 </head>
 <body >
  <div class="container" >
   <!-- Modal -->
   <div class="modal fade" id="empModal" role="dialog">
    <div class="modal-dialog">
 
     <!-- Modal content-->
     <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">User Info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
 
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
     </div>
    </div>
   </div>

   <br/>
   <table class="table" style='border-collapse: collapse;'>
    <tr>
     <th>Employee ID</th>
     <th>date</th>
     <th>time in</th>
     <th>time out</th>
     <th>View</th>
    </tr>
   <?php 
   $query = "select * from attendance Where  date='2021-03-19' ORDER BY time_in ASC ";
   $result = mysqli_query($conn,$query);
   $prvID=array("hello");
   while($row = mysqli_fetch_array($result))
   {
    if(in_array($row['employee_id'],$prvID))
    {
     
    }else{
      $id = $row['employee_id'];
     $date = $row['date'];
     $time_in = $row['time_in'];
     $time_out = $row['time_out'];

     echo "<tr>";
     echo "<td>".$id."</td>";
     echo "<td>".$date."</td>";
     echo "<td>".$time_in."</td>";
     echo "<td>".$time_out."</td>";
     echo "<td><button data-id='".$id."' class='userinfo'>Info</button></td>";
     echo "</tr>";
     array_push($prvID,$row['employee_id']);
    }
   }
  echo $prvID;
   ?>
   </table>
 
  </div>
  <script>
  $(document).ready(function(){

$('.userinfo').click(function(){
  
  var userid = $(this).data('id');

  // AJAX request
  $.ajax({
   url: 'ajaxfile.php',
   type: 'post',
   data: {userid: userid},
   success: function(response){ 
     // Add response in Modal body
     $('.modal-body').html(response);

     // Display Modal
     $('#empModal').modal('show'); 
   }
 });
});
});
  </script>
 </body>
</html>