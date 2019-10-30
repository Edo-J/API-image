<?php

 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: GET,POST');
 header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
 
 define('HOST','localhost');
 define('USER','root');
 define('PASS','');
 define('DB','pariwisata');

 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');