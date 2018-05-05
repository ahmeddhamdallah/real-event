<?php
  
  include "../libs/config.php";
  include "../libs/database.php";
  include_once("../database/db_conection.php");

  $db = new database ();

  // gitting the id
  $id = $_GET['id'];

  $query = "SELECT * FROM sport WHERE id='$id'";

  $sport = $db->select($query);

  $single = $sport->fetch_array();


 // sellecting categories
  $query = "SELECT * FROM category ";
  $category = $db->select($query);


  if (isset($_POST['update'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
   
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if($title=='' || $image=='' || $content==''){
      echo "please fill requierd fields";

    }
    else{
      move_uploaded_file($image_tmp,"../$image");

    $query = "UPDATE sport SET content='$content', image='$image', title='$title'  WHERE id='$id'";
    $run = $db->update($query);

    unlink("../images/".$single['image']);

    }

  }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>News-Dashboard</title>
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
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="dist/js/site.min.js"></script>
  </head>
  <body>
  <div id="fh5co-wrapper">
  <div id="fh5co-page">
  <div id="fh5co-header">
    <header id="fh5co-header-section">
      <div class="container">
        <div class="nav-header">
          <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
          
          <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="../index.php" class="navbar-brand">News-Admin</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="../Mmanager.php">Home</a></li>
               <li class="active"><a href="../index.php">Category</a></li>
                            
              <!-- <li class="disabled"><a href="#">Link</a></li> -->
              
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    <!--header-->
   
      </div>
    </header>
    
  </div>
  <!-- end:fh5co-header -->
  
  
<div class="alert alert-warning alert-dismissable">
 

    <div class="container">
      <div class="row">

        <div class="col-sm-12">

        <form action="editsport.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>News Title</label>
            <input type="text" name="title" class="form-control" placeholder="Add Title" value="<?php echo $single['title'];?>"/>
          </div>
          <div class="form-group">
            

            <select  name="Category" class="form-control" >
              <option>Select Category</option>
              <!-- category relations-->
              <?php while ($row = $category->fetch_array()) :?>
              <option value="<?php echo $row['id'];?>"><?php echo $row['cat_name'];?></option>
              <?php endwhile;?>
            </select>

            <div class="form-group"></div>
            <label>Content</label>
            <textarea class="form-control" rows="3" name="content"><?php echo $single['content'];?></textarea>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image">
            <img src="../images/<?php echo $single['image'];?>" width="400" heigt="400"/>
          </div>
          <button type="submit" name="update" class="btn btn-success">Update</button>
          <a href="index.php" class="btn btn-default">Cancel</a>
          <a href="deletesport.php?id=<?php echo $id;?>" class="btn btn-danger">Delete</a>
        </form>
          
        
      </div>
  <!-- END fh5co-page -->

  </div>
</div>


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