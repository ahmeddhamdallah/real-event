<?php
   include "libs/config.php";
  include "libs/database.php";
  include"database/db_conection.php";

  $db = new database ();

  $query = "SELECT * FROM sport order by id DESC";
  $sport = $db->select($query);

 
?>



<!DOCTYPE html>
<html lang="en">

<head>
  
 
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>AKHBARY - NOVA MINDS TASK 1</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  

  <!-- Bootstrap -->
  <link href="css/bootstrapa.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/style1.css" rel="stylesheet" />
  
  <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
  <!-- CS Select -->
  <link rel="stylesheet" href="css/cs-selecta.css">
  <link rel="stylesheet" href="css/cs-skin-border.css">

  <!-- Themify Icons -->
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- Flat Icon -->
  <link rel="stylesheet" href="css/flaticon.css">
  <!-- Icomoon -->
  <link rel="stylesheet" href="css/icomoon.css">
  <!-- Flexslider  -->
  <link rel="stylesheet" href="css/flexslider.css">
  
  <!-- Style -->
  <link rel="stylesheet" href="css/style1.css">

  <!-- Modernizr JS -->
  
  <style>
    *  {
      margin: 0;
      padding: 0;
    }
  
    body {
      font: 300 15px/1.5 "Helvetica Neue", helvetica, arial, sans-serif;
      background: #000;
      margin: 50px;
    }
  
    article {
      width: 650px;
      margin: 0 auto;
      background: #000;
      color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 15px 2px #666;
    }
  
    section {
      clear: left;
    }
  
    h1 {
      font-size: 45px;
      font-weight: 100;
      letter-spacing: 15px;
      text-align: center;
    }

    h1, #main_content, {
      padding: 20px;
    }

    p {
      margin: 20px 0;
    }
  
    a {
      color: #06c;
    }
  
    #main_nav ul {
      background: white;
      float: left;
      -webkit-transition: .5s;
      transition: .5s;
    }
  
    #main_nav li {
      float: left;
      position: relative;
      width: 150px;
      list-style: none;
      -webkit-transition: .5s;
      transition: .5s;
    }
  
    #main_nav > ul > li > a, h1 {
      text-transform: uppercase;
    }
  
    #main_nav a {
      display: block;
      text-decoration: none;
      padding: 5px 20px;
      color: #000;
    }

    #main_nav ul ul {
      position: absolute;
      left: 0;
      top: 100%;
      visibility: hidden;
      opacity: 1;
    }
  
    #main_nav ul ul ul {
      left: 90%;
      top: 0;
    }
  
    #main_nav li:hover, #main_nav li:hover li {
      background: #ddd;
    }
  
    #main_nav li li:hover, #main_nav li li:hover li {
      background: #bbb;
    }
  
    #main_nav li li li:hover {
      background: #999;
    }
  
    #main_nav li:hover > ul {
      visibility: visible;
      opacity: 1;
    }
    .dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
  </style>
  <!--[if lt IE 9]><script src="/r10/html5shiv.js"></script><![endif]-->
</head>
<body>
  <article>
    <h1>Akhbary</h1>

    <nav id="main_nav">
      <ul>
        <li>
          <a href="sport.php">Home</a>
          <ul>
          
            
          </ul>
        </li>
        <li>
          <a href="editcat.php">Categories</a>
          <ul>
            <li>
             
            </li>
            <li>
             
              <ul>
                
              </ul>
            </li>
            <li>
            
              <ul>
               
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <a href="login.php">Dashboard</a>
          <ul>   
          </ul>
        </li>
        <li>
          <a href="index.php">News Admin</a>
          <ul>  
          </ul>
        </li>
      </ul>
    </nav>
    <!-- Link back to HTML Dog: -->
    <p id=""><a href=""><img src="img/d.gif" alt=""></a></p>
  </article>
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
        <h3><?php echo $row['category'];?></h3>
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
           
            <a href="https://bootstrapmade.com/">Task 1</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.min.js"></script>
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

  <script>
  
  </script>
</body>
</html>