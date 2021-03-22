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

  
  <link href="css1/side.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#myForm").on("submit",function(event){
                event.preventDefault();
               var data =new FormData($("#myForm")[0]);
                //alert(npass.length);
                
                        $.ajax({
                            type:"POST",
                            url:"change_pro.php",
                            contentType:false,
                            processData:false,
                            data:data,                            
                            success: function(data)
                            {
                                if(data==1)
                                    {
                                        //window.location="index_test.php";
                                        alert("Image Uploded!");
                                        location.reload();
                                    }
                                else{
                                    alert("Reset Error :");
                                }
                            }
                        });
                    
            });
        });
        </script>
    </head>
    
    <body class="hold-transition login-page">
    <?php 
        if($_SESSION['name']){
           $email=$_SESSION['name'];
          require_once "conn.php";
          $sql="SELECT * from employee where email='$email'";
          $rs=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($rs);
          $url=$row['img_path'];
        ?>
    
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
                <img src="<?php echo $url;?>" style="height: 35px;width: 30px" class="img-fluid rounded-circle"></img>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php">Logout</a>
                <a class="dropdown-item" href="change_pass.php">Change Password</a>
                <a class="dropdown-item" href="change_profile.php">Change Image</a>
               <!-- <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>-->
              </div>
            </li>
          </ul>
        </div>
      </nav>
     
      <div class="container-fluid">
          
         <div class="row">
                  <div class="col-md-12"><br>
                      
                          <div id="table-data">
                                          <div style="right:50px;">
                                         <h4 class="text-success ">Change Image: </h4><br>
                                         </div>
                                        <div class="form-group">         
                                            <form id="myForm" method="post" enctype="multipart/form-data">
                                                <div class="row g-3 align-items-center">
                                                      <div class="col-auto">
                                                        <label for="cimg" class="col-form-label">Image:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                      </div>
                                                      <div class="col-auto">
                                                        <input type="file" id="cimg" name="cimg" class="form-control" aria-describedby="passwordHelpInline" required>
                                                      </div>
                                                      <div class="col-auto">
                                                        <span id="passwordHelpInline" class="form-text">
                                                          Upload Image in jpeg ,jpg ,gif and png
                                                        </span>
                                                      </div>
                                                   </div>
                                                 <br>
                                                
                                                <br>
                                             <div class="row g-3 align-items-center">
                                                <div class="col-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                 <div class="col-auto"><input type="submit" class="btn btn-primary btn-block" name="submit" value="Upload ">&nbsp;&nbsp;</div>
                                                 <div class="col-auto"></div>
                                            </div>


                                            </form>


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
 
 <?php
        }else
        {
            header("location:index.php");
        }
?>
    

    </body>
    
</html>