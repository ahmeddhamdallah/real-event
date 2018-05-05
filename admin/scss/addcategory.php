<?php
  include "../libs/database.php";
  require '../libs/tst.php';
$db = new database ();
 
 function categoryTree($parent_id = 0, $sub_mark = ''){
  global $db;
 $query = ("SELECT * FROM country_state_city WHERE parent_id = $parent_id ORDER BY name ASC");
 $country_state_city = $db->select($query);

if($query->num_rows > 0){
  while($row = $query->fetch_assoc()) {
    echo '<option value="'.$row['id'].'">'.$sub_mark.$row['name'].'</option>';
    categoryTree($row['id'], $sub_mark.'---');
    # code...
  }
}
}
 
 if (isset($_POST['submit'])){
    
    $name = $_POST['name'];
   
    $query = ("INSERT INTO country_state_city (name) VALUES ('$name')");
   $run = $db->insert($query);

      echo "Done";

      


    if ( $name=='') {
      echo "please fill in all fields";
      # code...
    }
 

  }




  
  

  

  


?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Luxe &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
  <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
  <meta name="author" content="FREEHTML5.CO" />

  <!-- 
  //////////////////////////////////////////////////////

  FREE HTML5 TEMPLATE 
  DESIGNED & DEVELOPED by FREEHTML5.CO
    
  Website:    http://freehtml5.co/
  Email:      info@freehtml5.co
  Twitter:    http://twitter.com/fh5co
  Facebook:     https://www.facebook.com/fh5co

  //////////////////////////////////////////////////////
   -->

    <!-- Facebook and Twitter integration -->
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="shortcut icon" href="favicon.ico">
  <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,900,700,900italic' rel='stylesheet' type='text/css'> -->

  <!-- Stylesheets -->
  <!-- Dropdown Menu -->
  <link rel="stylesheet" href="css/superfish.css">
  <!-- Owl Slider -->
  <!-- <link rel="stylesheet" href="css/owl.carousel.css"> -->
  <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
  <!-- Date Picker -->
  <link rel="stylesheet" href="../css/bootstrap-datepicker.min.css">
  <!-- CS Select -->
  <link rel="stylesheet" href="../css/cs-select.css">
  <link rel="stylesheet" href="../css/cs-skin-border.css">
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
  <!-- Themify Icons -->
  <link rel="stylesheet" href="../css/themify-icons.css">
  <!-- Flat Icon -->
  <link rel="stylesheet" href="../css/flaticon.css">
  <!-- Icomoon -->
  <link rel="stylesheet" href="../css/icomoon.css">
  <!-- Flexslider  -->
  <link rel="stylesheet" href="../css/flexslider.css">
  
  <!-- Style -->
  <link rel="stylesheet" href="../css/style.css">

  <!-- Modernizr JS -->
  <script src="../js/modernizr-2.6.2.min.js"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->

</head>
<body>
  <div id="fh5co-wrapper">
  <div id="fh5co-page">
  <div id="fh5co-header">
    <header id="fh5co-header-section">
      <div class="container">
        <div class="nav-header">
          <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
          
          <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li class="fh5co"><a href="addnews.php">Add News <span class="sr-only">(current)</span></a></li>
        <li><a href="addcategory.php">Add Category</a></li>
        <li><a href="addsport.php">Add Sport</a></li>
        <li><a href="addmedia.php">Add Media</a></li>
        <li><a href="addpolitics.php">Add Politics</a></li>
      
      </ul>
     
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        </div>
      </div>
    </header>
    
  </div>
  <!-- end:fh5co-header -->
  
  

  <footer id="footer" class="fh5co-bg-color">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">

<form action="addcategory.php" method="post">
  <div class="form-group">
    
    <input type="text" name="cat" class="form-control" placeholder="Add cat">
    <label>subCategory Title</label>
    <input type="text" name="subcat" class="form-control" placeholder="subcat">
  </div>
  
 
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
  <a href="index.php" class="btn btn-danger">Cancel</a>
</form>
      <select name="category">
       <?php echo categoryTree(); ?>
     </select>    
        
  </div>
  <!-- END fh5co-page -->

  </div>
  <!-- END fh5co-wrapper -->
  
  <!-- Javascripts -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <!-- Dropdown Menu -->
  <script src="js/hoverIntent.js"></script>
  <script src="js/superfish.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Waypoints -->
  <script src="js/jquery.waypoints.min.js"></script>
  <!-- Counters -->
  <script src="js/jquery.countTo.js"></script>
  <!-- Stellar Parallax -->
  <script src="js/jquery.stellar.min.js"></script>
  <!-- Owl Slider -->
  <!-- // <script src="js/owl.carousel.min.js"></script> -->
  <!-- Date Picker -->
  <script src="js/bootstrap-datepicker.min.js"></script>
  <!-- CS Select -->
  <script src="js/classie.js"></script>
  <script src="js/selectFx.js"></script>
  <!-- Flexslider -->
  <script src="js/jquery.flexslider-min.js"></script>

  <script src="js/custom.js"></script>

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