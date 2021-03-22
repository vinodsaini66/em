<?php
session_start(); 
if(isset($_POST['email']))
{
               
    $id1=$_SESSION['id'];            
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];

    require_once "conn.php";
    
    $sql ="UPDATE employee SET name='$name', email='$email',". "mobile='$mobile',address='$address' WHERE email='$id1'";

    $result=mysqli_query($conn,$sql);

    if($result)
        {
            echo "Profile Updated";
        }
    else
        {
        echo "Error :  ".mysqli_error($conn);
        }
}

?>