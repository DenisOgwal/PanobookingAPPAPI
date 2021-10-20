<?php
 $realacc=$_GET["realacc"];
  $realacc1=$_GET["realaccs"];
  $real1=$realacc-3;
   $real2=$realacc+3;
include_once 'DB_Connect.php';
  //creating a query
 error_log($realacc);
  error_log($realacc1);
 $stmt =$link->prepare("SELECT IDs,DriverName,DriverAge,TaxiNo,Ratings,CarSpec,Repayments,Price,PhotoUri FROM carrentals where CurrentLocation like '".$realacc1."%' and Availability='Available' and DriverAge Between '".$real1."' and '".$real2."'");

 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($ids,$drivername,$driverage,$taxino,$rating,$carspec,$repayments,$prices,$photo);
 $response = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
  $temp['IDs'] = $ids; 
  $temp['DriverName'] = $drivername; 
  $temp['DriverAge'] =  $driverage;
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