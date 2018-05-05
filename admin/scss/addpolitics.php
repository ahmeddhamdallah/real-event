<?php
  include "../libs/config.php";
  include "../libs/database.php";

  $db = new database ();
 
  $query = "SELECT * FROM category ";
  $category = $db->select($query);
  

  


  if (isset($_POST['submit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
   
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp,"../$image");

    $query = "INSERT INTO politics (content,image,title) VALUES ('$content','$image','$title')";
    $run = $db->insert($query);

      echo "Done";

      


    if ( $content=='' || $image=='' || $title=='') {
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
      <a class="navbar-brand" href="index.php">Dashboard</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="fh5co"><a href="politicsmanager.php">Politics Manage<span class="sr-only">(current)</span></a></li>
       
      
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

<form action="addpolitics.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>News Title</label>
    <input type="text" name="title" class="form-control" placeholder="Add Title">
  </div>
  <div class="form-group">
    

    <select  name="Category" class="form-control" >
      <option>Select Category</option>
      <!-- category relations-->
      <?php while ($row = $category->fetch_array()) :?>
      <option value="<?php echo $row['id'];?>"><?php echo $row['cat'];?></option>
      <?php endwhile;?>
    </select>

    <div class="form-group"></div>
    <label>Content</label>
    <textarea class="form-control" rows="3" name="content"></textarea>
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" name="image">
  </div>
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
  <a href="index.php" class="btn btn-danger">Cancel</a>
</form>
          
        
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