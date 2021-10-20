<?php
include_once 'DB_Connect.php';

 $stmt =$link->prepare("SELECT IDs,DriverName,TaxiNo,Ratings,CarSpec,Repayments,Price,PhotoUri FROM airporttaxi where Availability='Available'");

 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($ids,$drivername,$taxino,$rating,$carspec,$repayments,$prices,$photo);
 $response = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
  $temp['IDs'] = $ids; 
  $temp['DriverName'] = $drivername; 
  $temp['TaxiNo'] = $taxino; 
  $temp['Ratings'] = $rating; 
  $temp['CarSpec'] = $carspec; 
  $temp['Repayments'] =$repayments;
  $temp['Price'] = $prices; 
  $temp['PhotoUri'] = $photo; 
 array_push($response, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($response);