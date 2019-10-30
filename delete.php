<?php

header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD']=='POST')
{
  $response = array();

  $id = $_POST['id'];

  require_once('api_config_master.php');
  
  $sql = "SELECT * FROM pariwisata WHERE id = '$id'";
  
  $check = mysqli_fetch_array(mysqli_query($con,$sql));
  
  if(isset($check))
  {
    $sql = "DELETE FROM pariwisata WHERE id = '$id'";
    
    if(mysqli_query($con,$sql))
    {
      $response["value"] = 1;
      $response["message"] = "success";
      echo json_encode($response);
    } 
    else 
    {
      $response["value"] = 0;
      $response["message"] = "fail";
      echo json_encode($response);
    }
  } 
  else 
  {
    $response["value"] = 0;
    $response["message"] = "fail";
    echo json_encode($response);
  }
  
  mysqli_close($con);
} 
else 
{
  $response["value"] = 0;
  $response["message"] = "Oops something went wrong.";
  echo json_encode($response);
}
?>