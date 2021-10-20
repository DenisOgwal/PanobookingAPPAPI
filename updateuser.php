<?php
if (isset($_POST)) {
$email=$_POST['email'];
$fullnames=$_POST['fullnames'];
$addrees=$_POST['addrees'];
$phonenumber=$_POST['phonenumber'];
include_once 'DB_Connect.php';
$sql1="UPDATE registration SET FullNames='".$fullnames."',Telephone='".$phonenumber."',Address='".$addrees."' where Email ='".$email."'";
$result1=mysqli_query($link,$sql1);
$response = array();
if ($result1) 
{
 $messages='Correct Info';
 $response['error'] =$messages;
 echo json_encode($response);
}else{
	$messages='User Update Failed';
	$response['error'] =$messages;
 echo json_encode($response);
}
}
else{
$messages='Something UnExpected Happened, Try Again Later';
$response['error'] =$messages;
 echo json_encode($response);
}
?>
