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
          
    
    <title>Employee Management</title>

  <!-- Bootstrap core CSS 
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

  <!-- Custom styles for this template -->
  <link href="css1/side.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    
        <style>
          form .error{
                    color: coral;
                   }    
        </style>
    </head>
   <body>
       <?php 
        if($_SESSION['name']){
        ?>
     <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Appic Software </div>
      <div class="list-group list-group-flush">
        <a href="Deshboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="index_test.php" class="list-group-item list-group-item-action bg-light">Employee</a>
        <a href="attendence_view.php" class="list-group-item list-group-item-action bg-light">Attendence</a>
        <a href="reset.php" class="list-group-item list-group-item-action bg-light">Profile</a>
    
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
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
         <div class="row">
                  <div class="col-md-12">
                          <div id="table-data">
                              <br>
                              <form id="myForm" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col">
      <label>Name:</label><span id="error-name"></span>
            <input type="text" name="name" class="form-control " id="name">
    </div>
    <div class="col">
      <label>Email:</label><span id="error-email"></span>
            <input type="email" name="email" class="form-control" id="email">
    </div>
  </div><br>
    <div class="row">
    <div class="col">
       <label>Mobile:</label><span id="error-mobile"></span>
            <input type="text" name="mobile" class="form-control" id="mobile">
    </div>
    <div class="col">
      <label>Address:</label><span id="error-address"></span>
            <input type="text" name="address"  class="form-control" id="address">
    </div>
  </div><br>
    <div class="row">
    <div class="col">
      <label>Designation:</label><span id="error-post"></span>
            <input type="text" name="post" class="form-control" id="post">
    </div>
    <div class="col">
      <label>Department:</label><span id="error-salary"></span>
         <select class="form-control" name="dept" required>
             <option value="">-Select-</option>
             <option value="HR">HR</option>
             <option value="ANDROID DEVELOPMENT">ANDROID DEVELOPMENT</option>    
             <option value="IOS DEVELOPMENT">IOS DEVELOPMENT</option>
             <option value="WEB DEVELOPMENT">WEB DEVELOPMENT</option>
             <option value="SALES AND MARKETING">SALES AND MARKETING</option> 
        </select>
            
    </div>
  </div><br>
    <div class="row">
    <div class="col">
      <label>Joining Date:</label><span id="error-jdate"></span>
            <input type="date" name="j_date"  class="form-control" id="j_date">
    </div>
    <div class="col">
      <label>Status:</label><span id="error-status" ></span>
        <select class="form-control" name="status" required>
             <option value="">-Select-</option>
             <option value="Active">Active</option>
             <option value="Deactive">Deactive</option>      
        </select>
              
    </div>
  </div><br>
     <div class="row">
    <div class="col">
      <label>Employee ID:</label><span id="error-eid"></span>
            <input type="text" name="eid"  class="form-control" id="eid">
    </div>
    <div class="col">
      <label>Schedule ID:</label><span id="error-sid"></span>
            <input type="text" name="sid"  class="form-control" id="sid">  
    </div>
  </div><br>
    <div class="row">
    <div class="col">
      <label>Password</label><span id="error-password"></span>
            <input type="password" name="password"  class="form-control" id="password">
    </div>
    <div class="col">   
    </div>
  </div><br>
    <div class="row">&nbsp;&nbsp;&nbsp;
      <input type="submit" class="btn btn-primary " id="submit" name="submit"  value="submit">
        
  </div>
</form>
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
     $(document).ready(function(){ 
        $("#myForm").validate({        
          rules: {
            name:"required",
            eid:"required",
            sid:"required",
            password: {
                         required: true,
                         minlength: 3
                      },
            status: {
                    required: true,                    
            },
            j_date:"required",
            address:"required",
            dept:"required",
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,                
            },
            post:{
                required: true,
            }
        },
        message: {
            name: "Please enter your Name",
            salary:"Please enter your salary",
            j_date:"Please enter your joining date",
            email:"please enter a valid email address",
            mobile: "please enter your mobile",
            post:"Please enter your post",
            status:"Please enter your status",
            address:"Please enter your address"
            },
        submitHandler: function(form,e){      
            e.preventDefault();
             var data1=new FormData($("#myForm")[0]);
               //alert(data1.get('name'));
             $.ajax({
                    type:"POST",
                    url:"add_data.php",
                    data: data1,
                    contentType:false,
                    processData:false,
                    success: function(data){
                        $("#myForm")[0].reset();
                        alert(data);
                       } 
                }); 
                return false; 
            
             }        
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