<?php
 $host = 'localhost'; $user = 'cxmmunit_community'; $pass ='community@123'; $door = 'cxmmunit_panorama'; 
	$link=mysqli_connect($host,$user,$pass,$door);
	if($link==false){
		die("Error:can't connect".mysqli_connect_error());
		}

?>