<?php

header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD']=='POST')
	

{
    
  $response = array();
  
  $nama_wisata = $_POST['nama_wisata'];
  $photo = $_POST['photo'];
  $keterangan = $_POST['keterangan'];

  require_once('api_config_master.php');
  
  $sql = "SELECT * FROM pariwisata WHERE nama_wisata = '$nama_wisata'";
  
  $check = mysqli_fetch_array(mysqli_query($con,$sql));
  
  if(isset($check))
  {
    $response["value"] = 0;
    $response["message"] = "nama wisata sudah dipakai";
    echo json_encode($response);
  } 
  else 
  {
    $sql = "INSERT INTO pariwisata (nama_wisata, photo , keterangan) 
	VALUES('$nama_wisata', '$photo', '$keterangan')";
    
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
  
  mysqli_close($con);
} 
else 
{
  $response["value"] = 0;
  $response["message"] = "Oops, something went wrong";
  echo json_encode($response);
}

?>