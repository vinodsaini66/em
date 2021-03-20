<?php
session_start();
if($_POST['name'])
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $dept=$_POST['dept'];
    $job_name=$_POST['post'];
    $joining_date=$_POST['j_date'];
    $status=$_POST['status'];
    $eid=$_POST['eid'];
    $sid=$_POST['sid'];
    $password=$_POST['password'];

    require_once "config.php";


    $sql="INSERT INTO employee(name,email,mobile,address,job_name,department,joining_date,status,employee_id,schedule_id,password) VALUES".
         "('$name','$email','$mobile','$address','$job_name','$dept','$joining_date','$status','$eid','$sid','$password')";

     if(mysqli_query($conn,$sql))
            {
                echo "EMPLOYEEE ADDED ";
            }
            else
            {
                echo " Error : 2 ".mysqli_error($conn);
            }
    }
  
?>
