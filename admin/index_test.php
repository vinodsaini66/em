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

  
  <link href="css1/side.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
    <script>   
        $(document).ready(function(){
                readRecords();
        });
        function readRecords()
        {
            var readrecord ="read";            
            $.ajax({
                url:"view1.php",
                type: "POST",
                data:{readrecord:readrecord},
                success: function(data){
                    $("#table-data").html(data);
                }
            });
        }
        
        function AcivateUser( id, status)
        {
            var conf=confirm("ARE YOU SURE ");
            if(conf==true)
            {
                $.ajax({
                        url:"activate.php",
                        type:"POST",
                        data:{id:id,status:status},
                        success: function (data)
                        {
                            readRecords();
                        }
                           
                    });
            }
        }
      function DeleteUser(deleteid)
        {
            var conf =confirm("ARE YOU SURE ");
            if(conf==true)
                {
                    $.ajax({
                        url:"delete.php",
                        type:"POST",
                        data:{id:deleteid},
                        success: function (data)
                        {
                            readRecords();
                        }
                           
                    });
           }
        }
    
    </script>
    </head>
    <style>
    form .error
        {
            color: brown;
        }
    </style>
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
                <?php echo $_SESSION['name'];?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php">Logout</a>
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
                      <a href="add_test.php" class="btn btn-primary text-right" style="position: absolute; right: 50;">ADD EMPLOYEE</a><br><br>
                          <div id="table-data">
        
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
    function loadData(page){
      $.ajax({
        url  : "view1.php",
        type : "POST",
        cache: false,
        data : {page_no:page},
        success:function(response){
          $("#table-data").html(response);
        }
      });
    }
    loadData();
    
    // Pagination code
    $(document).on("click", ".pagination li a", function(e){
      e.preventDefault();
      var pageId = $(this).attr("id");
      loadData(pageId);
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
</html