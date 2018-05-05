<?php


$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'final-news';


  $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);


  if ($dblink->connect_errno) {
     printf("Failed to connect to database");
     exit();
  }


  $result = $dblink->query("SELECT * FROM category ");
  $result = $dblink->query("SELECT * FROM media ");
  $result = $dblink->query("SELECT * FROM politics ");
  $result = $dblink->query("SELECT * FROM sport ");


  $dbdata = array();


  while ( $row = $result->fetch_assoc())  {
	$dbdata[]=$row;
  }


 echo json_encode($dbdata);
 
?>