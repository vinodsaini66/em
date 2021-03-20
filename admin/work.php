<?php
session_start();
      function decimal_to_time($decimal) {
          $decimal=$decimal*60;
    $hours = floor($decimal / 60);
    $minutes = floor($decimal % 60);
    $seconds = $decimal - (int)$decimal;
    $seconds = round($seconds * 60);
 
    return str_pad($hours, 2, "0", STR_PAD_LEFT) . ":" . str_pad($minutes, 2, "0", STR_PAD_LEFT) . ":" . str_pad($seconds, 2, "0", STR_PAD_LEFT);
}

    if($_SESSION['name'])
    {
        $date=$_POST['date'];
        $eid=$_POST['eid'];
      if($_POST['eid'])          
      {
        $date=$_POST['date'];
        $eid=$_POST['eid'];
        require_once "config.php";
        $sql="SELECT SUM(num_hr) AS value_sum FROM attendance LEFT JOIN employee ON employee.id=attendance.employee_id where employee.employee_id='$eid' and attendance.date='$date'";
        $result = mysqli_query($conn, $sql); 
        $row = mysqli_fetch_assoc($result); 
        $sum = $row['value_sum'];
        $rs= decimal_to_time($sum);
        echo $rs;
        
      }
        else
        {
            echo "Error : ";
        }
    }
else
{
    echo "Login :";
    
}
?>