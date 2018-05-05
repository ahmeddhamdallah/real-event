<?php
//fetch.php

if(isset($_POST['action']))
{
 include('config.php');

 $output = '';

 if($_POST["action"] == 'cat')
 {
  $query = "
  SELECT cat FROM category 
  WHERE cat = :cat
  GROUP BY cat
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':cat'  => $_POST["query"]
   )
  );
  $result = $statement->fetchAll();
  $output .= '<option value="">Select category</option>';
  foreach($result as $row)
  {
   $output .= '<option value="'.$row["cat"].'">'.$row["cat"].'</option>';
  }
 }
 

 }
 echo $output;
}

?>
