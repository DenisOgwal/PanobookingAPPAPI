<?php
if (isset($_POST)) {
$cost=$_POST['totalcost'];
$users=$_POST['user'];
$ordercode="210100";
include_once 'DB_Connect.php';
$sql="INSERT into bookings(TotalCost,User,OrderCode)VALUES('$cost','$users','$ordercode')";
$result=mysqli_query($link,$sql);
$response = array();
if ($result) 
{
   $sql1="UPDATE cart SET Booked='Yes', OrderCode='$ordercode' WHERE User='".$users."'";
   $result1=mysqli_query($link,$sql1);
    
    $messages='Correct Info';
    $response['error'] =$messages;
    echo json_encode($response);
}else{
    $messages='Something Un Expected Happened, Try Again Later';
	$response['error'] =$messages;
    echo json_encode($response);
}
}
?>
