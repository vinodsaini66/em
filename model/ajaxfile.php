<?php
include "config.php";

$userid = 0;
if(isset($_POST['userid'])){
   $userid = mysqli_real_escape_string($conn,$_POST['userid']);
}
$sql = "select * from attendance where date='2021-03-19' and employee_id=".$userid;
$result = mysqli_query($conn,$sql);

$response = "<table border='0' width='100%'>";
$response .="<tr><th>Employee ID </th> <th>Date</th> <th>Time In</th> <th>Time Out</th> </tr>";

while( $row = mysqli_fetch_array($result) ){
 $id = $row['employee_id'];
 $date = $row['date'];
 $time_in = $row['time_in'];
 $time_out = $row['time_out'];

 $response .= "<tr>";
 $response .= "<td>".$id."</td><td>".$date."</td><td>".$time_in."</td><td>".$time_out."</td>";
 $response .= "</tr>";


}
$response .= "</table>";

echo $response;
exit;