<?php
 $realacc=$_GET["realacc"];
include_once 'DB_Connect.php';
 //error_log($realacc);
 $stmt =$link->prepare("SELECT IDs,OrderCode,TotalCost,Date FROM bookings where User like '".$realacc."%'");

 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($IDs,$OrderCode,$Cost,$Date);
 $response = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
  $temp['IDs'] = $IDs; 
  $temp['OrderCode'] = $OrderCode; 
  $temp['TotalCost'] =$Cost; 
  $temp['Date'] =$Date; 
 array_push($response, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($response);