<?php
   include "libs/config.php";
  include "libs/database.php";
  include"database/db_conection.php";

  $db = new database ();

  $query = "SELECT * FROM sport where cat_name =14";

 
  $sport = $db->select($query);

 
?>
<!DOCTYPE html>
<head>
     <meta charset="utf-8">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>AKHBARY - NOVA MINDS TASK 1</title>
 <style>
    ul {
      list-style: none;
      padding: 0;
      margin: 0;
      background: #1bc2a2;
    }
     
    ul li {
      display: block;
      position: relative;
      float: left;
      background: #1bc2a2;
    }
     
    /* This hides the dropdowns */
     
     
    li ul { display: none; }
     
    ul li a {
      display: block;
      padding: 1em;
      text-decoration: none;
      white-space: nowrap;
      color: #fff;
    }
     
    ul li a:hover { background: #2c3e50; }
     
    /* Display the dropdown */
     
     
    li:hover > ul {
      display: block;
      position: absolute;
    }
     
    li:hover li { float: none; }
     
    li:hover a { background: #1bc2a2; }
     
    li:hover li a:hover { background: #2c3e50; }
     
    .main-navigation li ul li { border-top: 0; }
     
    /* Displays second level dropdowns to the right of the first level dropdown */
     
     
    ul ul ul {
      left: 100%;
      top: 0;
    }
     
    /* Simple clearfix */
     
     
     
    ul:before,
    ul:after {
      content: " "; /* 1 */
      display: table; /* 2 */
    }
     
    ul:after { clear: both; }
</style>
</head>
    <body>
      <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="sport.php">Home</a></li>
              
              <!-- <li class="disabled"><a href="#">Link</a></li> -->
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Categories <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header">Edit Events</li>
                  <li><a href="index.php"> Events Editor</a></li>
                  <li><a href="editcat.php"> Category Editor</a></li>
                  <li class="divider"></li>
                 
                </ul>
              </li>
              <li class="active"><a href="login.php">Login</a></li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </br>
    </br>
    </br>
    </br>
</br>
</br>
</br>
      <nav role="navigation" class="navbar navbar-custom">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
               <?php
    $con=mysqli_connect("localhost","root","","for-event");
    // Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
     
    // Perform queries 
     
    function get_menu_tree($parent_id) 
    {
      global $con;
      $category = "";
      $sqlquery = " SELECT * FROM category where  parent_id='" .$parent_id . "' ";
      $res=mysqli_query($con,$sqlquery);
       while($row = mysqli_fetch_assoc($res)){
               $category .="<li><a href='".$row['page']."'>".$row['cat_name']."</a>";
           
           $category .= "<ul>".get_menu_tree($row['id'])."</ul>"; //call  recursively
           
           $category .= "</li>";
     
        }
        
        return $category;
    } 
    ?>

    <ul class="main-navigation">
    <?php echo get_menu_tree(0);//start from root menus having parent id 0 ?>
    </ul> 
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        <!-- Link back to HTML Dog: -->
        
   
    </head>
    <body>
      <header id="header">
          <!--/nav-->
      </header>
      <hr>
      <br/>
        <?php while ($row = $sport->fetch_array()) :?>
        <div class="container">
          <img src="<?php echo $row['image'];?>" height="600" width="1100" >
          <h1><?php echo $row['title'];?></h1>
            <h2><?php echo $row['content'];?></h2>
            
     <hr></br>
        <?php endwhile;?>
         </div>
      
      <div class="gallery">
        <div class="text-center">
          
        </div>
        <div class="container">
          <div class="col-md-4">
            
          </div>
          <div class="col-md-4">
           
          </div>
          <div class="col-md-4">
            
          </div>
        </div>

        <div class="container">
          <div class="col-md-4">
            <figure class="effect-marley">
              
          </div>
          <div class="col-md-4">
          
          </div>
          <div class="col-md-4">
            
          </div>
        </div>
      </div>

      <footer>
        
          <div class="col-md-4 col-md-offset-4">
            <div class="copyright">
             
              <div class="credits">
               
                <a href="#">Task 1</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     </footer>

</body>
</html>

