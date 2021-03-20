<?php
include "conn.php";

$userid = 0;
if(isset($_POST['userid'])){
    $date=$_POST['date'];
   $userid = mysqli_real_escape_string($conn,$_POST['userid']);
}
$sql = "select * from attendance where date='$date' and employee_id=".$userid;
$result = mysqli_query($conn,$sql);

$response = "<table border='0' width='100%'>";
$response .="<tr> <th>Date</th> <th>Time In</th> <th>Time Out</th> </tr>";

while( $row = mysqli_fetch_array($result) ){
//  $id = $row['employee_id'];
 $date = date('M d, Y', strtotime($row['date']));
 $time_in = $row['time_in'];
 $time_out = $row['time_out'];

 $response .= "<tr>";
 $response .= "<td>".$date."</td><td>".date('h:i A', strtotime($row['time_in']))."</td><td>".date('h:i A', strtotime($row['time_out']))."</td>";
 $response .= "</tr>";
  
}
$response .= "</table>";

echo $response;
exit;