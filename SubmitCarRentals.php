<?php
if (isset($_POST)) {
$product=$_POST['product'];
$cost=$_POST['cost'];
$users=$_POST['user'];
$datesfrom=$_POST['datesfrom'];
$datesto=$_POST['datesto'];
$desDesc=$_POST['desDesc'];
$Facilityname=$_POST['Facilityname'];
$taxino=$_POST['taxino'];
$ordercode="210107";
include_once 'DB_Connect.php';
$sql="INSERT into cart(ProductName,Quantity,Cost,User,OrderCode,DatesFrom,DatesTo,Descriptions,Facility)VALUES('$product','1','$cost','$users','$ordercode','$datesfrom','$datesto','$desDesc','$Facilityname')";
$result=mysqli_query($link,$sql);
$response = array();
if ($result) 
{
   $sql1="UPDATE carrentals SET Availability='Not Available' WHERE TaxiNo='".$taxino."'";
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
