<?php
include "../libs/database.php";
include "../libs/config.php";
$db = new database ();
 function categoryTree($parent_id = 0, $sub_mark = ''){
  global $db;
 $query = $db->query("SELECT * FROM country_state_city WHERE parent_id = $parent_id ORDER BY name ASC");
 

if($query->num_rows > 0){
  while($row = $query->fetch_assoc()) {
    echo '<option value="'.$row['id'].'">'.$sub_mark.$row['name'].'</option>';
    categoryTree($row['id'], $sub_mark.'---');
    # code...
  }
}
}
 



?>




<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Make Treeview using Bootstrap Treeview Ajax JQuery with PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
 
<!-- Include the plugin's CSS and JS: -->
    <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
   <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script data-main="dist/js/r.js" src="js/require.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="dist/js/site.min.js"></script>   
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
  
  <style>
  </style>
 </head>
 <body>

  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Make Treeview using Bootstrap Treeview Ajax JQuery with PHP</h2>
   <br /><br />
   <div id="treeview"></div>
      <div class="content-row">
                          
   <form action="indexx.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
     <label>Event Title</label>
       <input type="text" name="title" class="form-control" placeholder="Add Title">
    </div>
    <div class="select-boxes">
     <select name="category"  class="form-control selectpicker" data-live-search="true" multiple>s
       <?php echo categoryTree(); ?>
     </select>
   
        <button type="submit" name="add" class="btn btn-info">Submit</button>
  <a href="indexx.php" class="btn btn-danger">Cancel</a>       
   </div>                

    <div class="form-group">
     <select name="name"  class="form-control selectpicker" data-live-search="true" multiple>s
     <option>category</option>
       <?php while ($row = $country_state_city->fetch_array()) :?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
       <?php endwhile;?>         
     </select>

    <br /><br />
      <br/>
  
  </div>
     </form>

      </div>
   

  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $.ajax({ 
  
   method:"POST",
   dataType: "json",       
   success: function(data)  
   {
  $('#treeview').treeview({data: data});
   }   
 });
});

</script>