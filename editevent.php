 <?php
  include("admin/fetch1.php");
  include "libs/config.php";
  include "libs/database.php";
  include_once("database/db_conection.php");


  $db = new database ();


  $query = "SELECT * FROM categoryes ";
  $categoryes = $db->select($query);
  $query = "SELECT * FROM sport ";
  $sport = $db->select($query); 
 
  if (isset($_POST['submit'])){

  	$category = $_POST['category'];
    $title = $_POST['title'];
    $content = $_POST['content'];
   
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp,"../$image");
    

    $query = "INSERT INTO sport (category,content,image,title) VALUES ('$category','$content','$image','$title')";
    $run = $db->insert($query);

      echo "Done";

      


    if ($category=='' || $content=='' || $image=='' || $title=='') {
      echo "please fill in all fields";
      # code...
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
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
  </head>
  <body>
    <!--nav-->
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
            <a href="sportsmanager.php" class="navbar-brand">News-Admin</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="../Mmanager.php">Home</a></li>
              
              <!-- <li class="disabled"><a href="#">Link</a></li> -->
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Categories <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header">Edit Events</li>
                  
                </ul>
              </li>
              <li class="active"><a href="login.php">Login</a></li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    <!--header-->
    <div class="container-fluid">
    <!--documents-->
        <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>Options</b></li>
               <br/>
               <br/>
                <li class="list-group-item"><a href="Mmanager.php"><i class="glyphicon glyphicon-home"></i>Dashboard </a></li>
                
                <li class="list-group-item"><a href="login.php" ><i class="glyphicon glyphicon-lock"></i>Login</a></li>
                <li class="list-group-item"><a href="editevent.php" ><i class="glyphicon glyphicon-lock"></i>EDIT EVENT</a></li>
                <li>
                  <a href="#demo3" class="list-group-item " data-toggle="collapse">Categories  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="demo3">
                    <a href="#SubMenu1" class="list-group-item" data-toggle="collapse">ADD CAT  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <div class="collapse list-group-submenu" id="SubMenu1">
                      <a href="index.php" class="list-group-item">Category</a>
                      
                      </div>
                      
                  </div>
                </li>
              </ul>
          </div>
           <div class="col-xs-12 col-sm-9 content">
           	<div class="alert alert-warning alert-dismissable">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Events Manager</h3>
              </div>
              <div class="panel-body">
                <div class="content-row">
                  <h2 class="content-row-title"> Event Manager</h2>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">

                      </div>
                    <div class="col-md-6">
                    	<div class="alert alert-warning alert-dismissable">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                           Events Editor
                          </div>
                          </div>
                          <div class="content-row">
                          
                    
                      <div class="panel panel-default">
                               <div class="panel-heading">EDIT YOUR EVENTS</div>
                       <table class="table table-dark">
                  <thead>
                  <tr align="center">
                    <td colspan="3"><h4>EDIT Your EVENTS</h4></td>
                    
                  </tr>
                  
                  <tr class="default">
                    <th>News ID</th>
                    <th>News Title</th>
                    
                    <th>News Content</th>
                    <th>Image</th>
                  </tr>
                  <?php while ($row = $sport->fetch_array()) :?>
                  <tr class="default">
                    <td><?php echo $row['id'];?></td>
                    <td>
                      <a href="admin/editsport.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
                    </td>
                    
                    <td><?php echo $row['content'];?></td>
                    <td><?php echo $row['image'];?></td>
                  </tr>
                  <?php endwhile;?>
                </thead>
        
              </table>
          
                        
                      </div>
                    </div>
                  </div>
                
                </div>
              </div>

              </div><!-- panel body -->
            </div>
        </div><!-- content -->
      </div>
  </div>
    </div>
  </div>
    <!--footer-->
   
  </body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });
</script>
<script src="lib/js/bootstrap.min.js"></script>
    