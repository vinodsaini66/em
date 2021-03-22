<?php
require_once "conn.php";
if(isset($_POST['email'])){



    $email=$_POST['email'];
    $sql="SELECT * from employee where email='$email'";
    $rs=mysqli_query($conn,$sql);
    if(mysqli_num_rows($rs))
    {
       echo 0;
    }
    else{

        $name=$_POST['name'];

        $mobile=$_POST['mobile'];
        $address=$_POST['address'];
        $dept=$_POST['dept'];
        $job_name=$_POST['post'];
        $joining_date=$_POST['j_date'];
        $status=$_POST['status'];
        $eid=$_POST['eid'];
        $sid=$_POST['sid'];
        $password=$_POST['password'];
        $file_name=$_FILES['img']['name'];
        $file_tmp_loc=$_FILES['img']['tmp_name'];
        $file_store="admin/uploads/".$file_name;


        $check=getimagesize($file_tmp_loc);
        if($check)
        {
            if(move_uploaded_file($file_tmp_loc,$file_store))
            {
                
            }else{
                echo "error ";
            }
        }else{
            echo "file not image";
        }

        $sql="INSERT INTO employee(name,email,mobile,address,job_name,department,joining_date,status,employee_id,schedule_id,password,img_path) VALUES".
            "('$name','$email','$mobile','$address','$job_name','$dept','$joining_date','$status','$eid','$sid','$password','$file_store')";

     if(mysqli_query($conn,$sql))
            {
                echo 1;
            }
            else
            {
                echo " Error : 2 ".mysqli_error($conn);
            }
    }

    }
    ?>
