 <?php
  include "../libs/config.php";
  include "../libs/database.php";

  $db = new database ();


  $query = "SELECT * FROM category ";
  $category = $db->select($query);
  $query = "SELECT * FROM subcategory ";
  $subcategory = $db->select($query);
  $query = "SELECT * FROM media ";
  $media = $db->select($query);
 

if (isset($_POST['add'])){
    $category = $_POST['cat'];
    
    if ($category=='') {
      echo "please fill in all fields";
      # code...
    }

    else {
      
      $query = "INSERT INTO category (cat) VALUES ('$category')";
      $run = $db->insert($query);

      echo "";

    }
    
  }

  if (isset($_POST['add'])){
    $subcategory = $_POST['subcat'];
    
    if ($subcategory=='') {
      echo "please fill in all fields";
      # code...
    }

    else {
      
      $query = "INSERT INTO subcategory (subcat) VALUES ('$subcategory')";
      $run = $db->insert($query);

      echo "Done";

    }
    
  }
  


  
  if (isset($_POST['submit'])){
    
    $title = $_POST['title'];
    $content = $_POST['content'];
   
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp,"../$image");

    $query = "INSERT INTO media (content,image,title) VALUES ('$content','$image','$title')";
    $run = $db->insert($query);

      echo "Done";

      


    if ( $content=='' || $image=='' || $title=='') {
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
            <a href="#" class="navbar-brand">News-Admin</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="getting-started.html">Home</a></li>
              
              <!-- <li class="disabled"><a href="#">Link</a></li> -->
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Categories <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header">Edit Events</li>
                  <li><a href="sportsmanager.php">Sport Events</a></li>
                  <li class="divider"></li>
                  <li class="disabled"><a href="Mmanager.php">Media Events</a></li>
                  <li class="divider"></li>
                  <li class="disabled"><a href="Pmanager.php">Politics Events</a></li>
                </ul>
              </li>
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
                <li class="list-group-item"><a href="index.html"><i class="glyphicon glyphicon-home"></i>Dashboard </a></li>
                <li class="list-group-item"><a href="../media.php"><i class="glyphicon glyphicon-certificate"></i>Media Content </a></li>
                <li class="list-group-item"><a href="../sport.php"><i class="glyphicon glyphicon-th-list"></i>Sport Content </a></li>
                <li class="list-group-item"><a href="../politics.php"><i class="glyphicon glyphicon-list-alt"></i>Politics Content</a></li>
                <li class="list-group-item"><a href="login.php" ><i class="glyphicon glyphicon-lock"></i>Login</a></li>
                <li>
                  <a href="#demo3" class="list-group-item " data-toggle="collapse">Categories  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="demo3">
                    <a href="#SubMenu1" class="list-group-item" data-toggle="collapse">Sport  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <div class="collapse list-group-submenu" id="SubMenu1">
                      <a href="#" class="list-group-item">Tinnus</a>
                      <a href="#" class="list-group-item">Basketball</a>
                      <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse">Football <span class="glyphicon glyphicon-chevron-right"></span></a>
                      <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
                        <a href="#" class="list-group-item">Local</a>
                        <a href="#" class="list-group-item">Aribien</a>
                      </div>
                      <a href="#" class="list-group-item">Global</a>
                    </div>
                    <a href="javascript:;" class="list-group-item">Media</a>
                    <a href="javascript:;" class="list-group-item">Politics</a>
                  </div>
                </li>
              </ul>
          </div>
           <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Events Manager</h3>
              </div>
              <div class="panel-body">
                <div class="content-row">
                  <h2 class="content-row-title">media Event Manager</h2>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">

                      </div>
                
                
                 
                    <div class="col-md-6">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          media Events
                          </div>
                          </div>
                          <div class="content-row">
                          
                           <form action="Pmanager.php" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                              <label>Event Title</label>
                              <input type="text" name="title" class="form-control" placeholder="Add Title">
                             </div>
                                

                         <div class="form-group">
                          
                 
                   <select name="cate" id="cate" class="form-control selectpicker" data-live-search="true" multiple>
                    <option>category</option>
                      <?php while ($row = $category->fetch_array()) :?>
                              <option value="<?php echo $row['id'];?>"><?php echo $row['cat'];?></option>
                              <?php endwhile;?>
                            
                   </select>
                   <br /><br />
                   
                  
                
                <br/>
                              <select  name="Category" class="form-control" >
                              <option>Select subCategory</option>
                            
                              <?php while ($row1 = $subcategory->fetch_array()) :?>

                              <option value="<?php echo $row1['id'];?>"><?php echo $row1['subcat'];?></option>
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
                           <button type="submit" name="submit" class="btn btn-info">Submit</button>
                           <a href="index.php" class="btn btn-danger">Cancel</a>
                          </form>
                        </div>
                        
                        <div class="panel-body">
                          Panel content
                        </div>
                      <!--here-->
                      
                    
                      <div class="panel panel-warning">
                        <div class="panel-heading">
                          <h3 class="panel-title">Manage politics Event</h3>
                        </div>
                        <br/>
                         <div class="col-md-3">
                      
                           <a href="Pmanager.php" class="btn btn-success btn-block">Go</a>
                    </div>
                    <br/>
                        <div class="panel-body">
                          
                        </div>
                     
                      <div class="panel panel-danger">
                        <div class="panel-heading">
                          <h3 class="panel-title">Manage Sport Event</h3>
                        </div>
                        <br/>
                        <div class="col-md-3">
                      
                           <a href="sportsmanager.php" class="btn btn-success btn-block">Go</a>
                    </div>
                        <div class="panel-body">
                          
                        </div>
                      </div>
                      <div class="panel panel-info">
                        <div class="panel-body">
                          
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="panel panel-warning">
                        <div class="panel-heading">Add Category & Subcategory</div>
                        <br/>
                        <form action="Mmanager.php" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label>Category Title</label>
                            <input type="text" name="cat" class="form-control" placeholder="Add cat">
                            

                            <label>subCategory Title</label>
                            <input type="text" name="subcat" class="form-control" placeholder="Add subcat">
                          </div>
                          
                         
                          <button type="add" name="add" class="btn btn-success">ADD</button>
                          <a href="index.php" class="btn btn-danger">Cancel</a>
                        </form>
                      </div>
                      <div class="panel panel-info">
                        <div class="panel-heading">Edit Your Events</div>
                       <table class="table table-dark">
            <thead>
            <tr align="center">
              <td colspan="3"><h3>EDIT Your EVENTS</h3></td>
              
            </tr>
            
            <tr>
              <th>News ID</th>
              <th>News Title</th>
              
              <th>News Content</th>
            </tr>
            <?php while ($row = $media->fetch_array()) :?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td>
                <a href="editmedia.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
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
    <!--footer-->
   
  </body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });
</script>