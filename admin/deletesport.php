<?php
  include "../libs/config.php";
  include "../libs/database.php";

  $db = new database ();
  //deleting post

  if(isset($_GET['id'])){

  	$id = $_GET['id'];

  	$quere = "DELETE FROM sport Where id='$id'";

  	$run = $db->delete($quere);
  }
?>