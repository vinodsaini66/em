<html>
<head>
    <style>
        form .error{
                    color: coral;
                   }    
    </style>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    
    
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> 
    </head>
   <body>
     <div class="container">
        <h1 class="text-primary text-uppercase text-center"> EMPLOYE MANAGEMENT SYSTEM</h1>
             
         <div id="records_content">
         </div>
     
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
      <label>Salary:</label><span id="error-salary"></span>
            <input type="text" name="salary" class="form-control" id="salary">
    </div>
  </div><br>
    <div class="row">
    <div class="col">
      <label>Joining Date:</label><span id="error-jdate"></span>
            <input type="date" name="j_date"  class="form-control" id="j_date">
    </div>
    <div class="col">
      <label>Status:</label><span id="error-status"></span>
            <input type="text" name="status"  class="form-control" id="status">  
    </div>
  </div><br>
    <div class="row">
      <input type="submit"  id="submit" name="submit"  value="submit">
  </div>
</form>

    </div>
 
        <script>
             $(document).ready(function(){ 
            $("#myForm").validate({        
        rules: {
            name:"required",
            status: {
                    required: true,                    
            },
            j_date:"required",
            address:"required",
            salary:"required",
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
        submitHandler: function(form){            
            $("#myForm").on("submit",function(event){
                event.preventDefault();
                $(':input[type="submit"]').prop('disabled', true);
                var data1=new FormData(this);
                $.ajax({
                    type:"POST",
                    url:"add_data.php",
                    data: data1,
                    contentType:false,
                    processData:false,
                    success: function(data){
                        $(':input[type="submit"]').prop('disabled', false);
                        alert(data);
                        return false;
                }  }); 
                
             });        
             
        }
    });
            });
        </script>
    </body>
</html>