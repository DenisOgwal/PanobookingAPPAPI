<?php
 $realacc=$_GET["realacc"];
include_once 'DB_Connect.php';
 //error_log($realacc);
 $stmt =$link->prepare("SELECT IDs,ProductName,Quantity,Cost,Date,ImageUrl,OrderCode FROM cart where User like '".$realacc."%' and Booked='No'");

 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($IDs,$ProductName,$Quantity,$Cost,$Date,$ImageUrl,$OrderCode);
 $response = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
  $temp['IDs'] = $IDs; 
  $temp['ProductName'] = $ProductName; 
  $temp['Quantity'] =$Quantity;
  $temp['Cost'] =$Cost; 
  $temp['Date'] =$Date; 
  $temp['ImageUrl'] =$ImageUrl; 
   $temp['OrderCode'] =$OrderCode;
 array_push($response, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($response);