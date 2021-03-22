<?php
session_start();
?>
<html>
 <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
     
      <title>Employee Management</title>
      <style>
      .model {
        background-color: rgba(0,0,0,0.4); 
      }
      </style>

      <!-- Bootstrap core CSS 
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

      <!-- Custom styles for this template -->
      <link href="css1/side.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
  
  </head>
   
<body class="hold-transition skin-blue sidebar-mini">
    <?php 
        if($_SESSION['name']){
        ?>
   <div class="modal" id="empModal">
    <div class="modal-dialog">
 
     
     <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Attendence View</h4>
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
   <div class="d-flex" id="wrapper">
   

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Appic Software </div>
      <div class="list-group list-group-flush">
        <a href="attendence.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="attendence_view.php" class="list-group-item list-group-item-action bg-light">Attendence</a>
        <a href="edit.php?id=<?php echo $_SESSION['name'];?>" class="list-group-item list-group-item-action bg-light">Profile</a>    
     
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">


      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['name'];?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php">Logout</a>
                <a class="dropdown-item" href="change_pass.php">Change Password</a>
             
               <!-- <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>-->
              </div>
            </li>
          </ul>
        </div>
      </nav>
        <br><br>
        
      <div class="container-fluid">
         <div class="row">
                  <div class="col-md-12">
                          <div id="table-data">
                              
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>View</th>
                </thead>
                <tbody>
                  <?php
                    require_once "conn.php";
                    $email=$_SESSION['name'];
                    $sql = "SELECT *, employee.employee_id AS empid, attendance.id AS attid FROM attendance LEFT JOIN employee ON employee.id=attendance.employee_id where employee.email='$email' ORDER BY attendance.date DESC, attendance.time_in ASC";
                    $query = $conn->query($sql);
                    $prvID=array("hello");
                    $prvDate=array("h1");
                    while($row = $query->fetch_assoc())
                    {
                        
                      if(in_array($row['empid'],$prvID))
                      {

                      } else {
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".date('M d, Y', strtotime($row['date']))."</td>
                          <td>".$row['empid']."</td>
                          <td>".$row['name']."</td>
                          <td>".date('h:i A', strtotime($row['time_in']))."</td>
                          <td>".date('h:i A', strtotime($row['time_out']))."</td>";
                          echo "<td><button  data-date='".$row['date']."' data-id='".$row['id']."' class='userinfo'> View </button></td>";
                          echo "</tr>";
                          array_push($prvID,$row['empid']);
                          array_push($prvDate,$row['date']);
                    }
                    if(in_array($row['date'],$prvDate))
                    {

                    }
                    else{
                      array_push($prvDate,$row['date']);
                      array_pop($prvID);
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
        
                           </div>
    </div>
  </div>
</div>
      </div>
    </div>
        <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
      </script>
    

    <script>
  $(document).ready(function(){

   $('.userinfo').click(function(){
  
    var userid = $(this).data('id');
    var date = $(this).data('date');
    // AJAX request
    $.ajax({
    url: 'pop_up.php',
    type: 'post',
    data: {userid: userid,date: date},
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
    
    <script>
    $(document).ready(function(){
        $("#hide").hide();
        $("#myForm").submit(function(e){
            e.preventDefault();
            var data= new FormData($("#myForm")[0]);
//           // var date=$("#date").val();
//            //var eid=$("#eid").val();
//            alert(data.get('date'));
            $.ajax({
                type: "POST",
                url: "work.php",
                data: data,
                contentType:false,
                processData:false,
                success:function(data){
                    if(data)
                        {
                          $("#hide").show();
                           $("#show").text(data);
                        }
                      else{
                          $("#hide").show();
                           $("#show").text("0");
                      }
                }
            });
        });
    });
    
    </script>

<?php
        }else
        {
            header("location:index.php");
        }
        ?>
</body>
</html>
