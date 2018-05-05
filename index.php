  <?php
  include("admin/fetch1.php");
  include "libs/config.php";
  include "libs/database.php";
  include"database/db_conection.php";


  $db = new database ();


  $query = "SELECT * FROM category ";
  $category = $db->select($query);
  $query = "SELECT * FROM sport ";
  $sport = $db->select($query); 
 
  if (isset($_POST['addcategoryname'])){

    $category = $_POST['selectcategory'];
    if ($category){
   foreach ($category as $cat_name){echo $category,'<br />';}
  }
    $title = $_POST['title'];
    $content = $_POST['content'];
   
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp,"../$image");
    

    $query = "INSERT INTO sport (category,content,image,title) VALUES ('$cat_name','$content','$image','$title')";
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
            <a href="index.php" class="navbar-brand">News-Admin</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="sport.php">Home</a></li>
              
              <!-- <li class="disabled"><a href="#">Link</a></li> -->
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Categories <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header">ADD CAT</li>
                  <li><a href="editcat.php">EDIT CAT</a></li>
                  <li class="divider"></li>
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
                <li class="list-group-item"><a href="index.php"><i class="glyphicon glyphicon-home"></i>Dashboard </a></li>
               <li class="list-group-item"><a href="editevent.php" ><i class="glyphicon glyphicon-lock"></i>EDIT EVENT</a></li>
                <li class="list-group-item"><a href="login.php" ><i class="glyphicon glyphicon-lock"></i>Login</a></li>
                <li>
                  <a href="#demo3" class="list-group-item " data-toggle="collapse">Categories  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="demo3">
                    <a href="#SubMenu1" class="list-group-item" data-toggle="collapse">ADD CAT  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <div class="collapse list-group-submenu" id="SubMenu1">
                      <a href="editcat.php" class="list-group-item">Category</a>
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
                  <h2 class="content-row-title"> Event Editor</h2>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">

                      </div>
                
                
                 
                    <div class="col-md-6">
                      <div class="alert alert-warning alert-dismissable">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          Events
                          </div>
                          </div>
                          <div class="content-row">
                          
                           <form action="index.php" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                              <label>Event Title</label>
                              <input type="text" name="title" class="form-control" placeholder="Add Title">
                             </div>
                           

                         <div class="form-group">
      <label for="exampleInputcategory">Select Category:</label>
        
      <?php
        function fetchCategoryTree($parent = 0, $spacing = '', $user_tree_array = '') {
          global $db_conn;
          if (!is_array($user_tree_array))
          $user_tree_array = array();
          $select_categorydropdown_query="Select * from category where 1 AND parent_id ='".$parent."' ORDER BY id ASC";
         
          $query = mysqli_query($db_conn,$select_categorydropdown_query);
          if (mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_object($query)) {
          $user_tree_array[] = array("id" => $row->id, "name" => $spacing . $row->cat_name);
          $user_tree_array = fetchCategoryTree($row->id, $spacing . '&nbsp;&nbsp;', $user_tree_array);
          }
          }
          return $user_tree_array;
        }
        
      ?>
      <?php 
        $categoryList = fetchCategoryTree();
      ?>
      <select name='selectcategory[]' id="selectcatoption" class="form-control selectpicker" data-live-search="true"  multiple>
      <!--<select class="form-control" id="selectcatoption" name='selectcategory[]' required >  -->
      <ul>
                      
        <li>
          <option value='0'>Parent Category</option>
          <?php foreach($categoryList as $cl) { ?>
         
            <option value="<?php echo $cl["id"]; ?>"><?php echo $cl["name"]; ?></option>
          <?php } ?></li>
      </ul>          
          

      </select>
      
              
        
      </div>

                
                <br/>
                              

                            <div class="form-group"></div>
                             <label>Content</label>
                             <textarea class="form-control" rows="3" name="content"></textarea>
                         </div>
                           <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image">


                           </div>
                           <button type="submit" name="addcategoryname" class="btn btn-info">Submit</button>
                           <a href="index.php" class="btn btn-danger">Cancel</a>
                          </form>
                        </div>
                        </div>

                       
                      <!--here-->
                      
                    
                     </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-md-6">
                      
                      </div>
                      
                        
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
    <!--footer-->
   
  </body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#selectcatoption').multiselect();
    });
</script>
<script src="lib/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function (e) {       
    $( "#addcategorybtn" ).click(function() {
      $( "#uploadForm" ).submit(function(e) {
        e.preventDefault();
                       
            var updatevalue = $("#updatecatid").val();
            if (updatevalue == ''){
              $("#updatecatid").val('');
            }
            var formData = new FormData(this);
      
            $.ajax({
            url: "add_action.php",            
            type: "POST",
            data: formData,
            async : false,
            contentType: false,       
            cache: false,             
            processData:false, 
            success:function(data){
               
              if (data == "categorynamerror"){                   
                   $("#errormsg").html("<div role='alert' class='alert alert-danger alert-dismissible fade in'><button aria-label='Close' data-dismiss='alert' class='close' type='button'><span aria-hidden='true'>×</span></button>Category Name is already exist in our database, Please try another one!</div>");     
               } else if (data == "Can't Add") {
                
               } else {
                   $("#category-list-box").after(data); 
               }
                if (updatevalue == ''){          
                $("#addcategoryname").val('');
                $("#selectcatoption").find('option:selected').removeAttr("selected"); 
                }
                $("#loaderIcon").hide();
            },
            complete: function (data) {
              //alert("successCount");
        },
            error:function (){
            },
            timeout: 3000 // sets timeout to 3 seconds
      });
    });
    });
  $( "#editcategorybtn" ).click(function() {
    $( "#uploadForm" ).submit(function(e) {
      e.preventDefault();
           
            var ID = $(this).parents().find('input[type="hidden"]').val();
            var formData = new FormData(this);
           
            
            $.ajax({
            url: "edit_action.php",            
            type: "POST",
            data: formData,
            async : false,
            contentType: false,       
            cache: false,             
            processData:false, 
            success:function(data){
               
              if (data == "categorynamerror"){                   
                   $("#errormsg").html("<div role='alert' class='alert alert-warning alert-dismissible fade in'>Category Name is already exist in our database, Please try another one!</div>");     
               } else {
                   //$("#category-list-box").after(data); 
                   $("#ajax_"+ID).html(data); 
                   
               }
                                
                $("#addcategoryname").val('');
        $("#selectcatoption").find('option:selected').removeAttr("selected"); 
                $("#loaderIcon").hide();
            },
            complete: function (data) {
              $(".edittitle").hide();
          $(".addtitle").show();
          $(".editsubtitle").hide();
          $(".addsubtitle").show();
          $("#cancelcategorybtn" ).hide();
          $("#editcategorybtn" ).hide();
          $("#addcategorybtn" ).show();
          $("#updatecatid").val('');  
        },
            error:function (){
            },
            timeout: 3000 // sets timeout to 3 seconds
      });
    });
  });
  $( "#cancelcategorybtn" ).click(function() {
    $("#cancelcategorybtn" ).hide();
    $("#editcategorybtn" ).hide();
    $("#addcategorybtn" ).show();
    $("#addcategoryname").val('');
    $("#selectcatoption").find('option:selected').removeAttr("selected"); 
    $(".edittitle").hide();
    $(".editsubtitle").hide();
    $(".addtitle").show();
    $(".addsubtitle").show();
    $("#updatecatid").val('');
  });
    });
  
    function deleteAction(id) {
        
        var info = 'id=' + id;
    
        if(confirm("Are you sure you want to delete this?"))
        {
         $.ajax({
           type: "POST",
           url: "delete_category.php",
           data: info,
           success: function(){
            
            }
        });
          //$(this).parents("tr").animate({backgroundColor: "#003" }, "slow").animate({opacity: "hide"}, "slow").remove();
         // $(this).parents("tr").remove(); 
            $( ".tredit#ajax_"+id ).hide( 1200, function() {
            $( ".tredit#ajax_"+id ).remove();
            });
         }
        return false;
    }
    </script>
    <script> 
    
        function ajaxeditinline() {
        $(".ajaxeditcategory").click(function(){
                     
      var str=$(this).attr('id');
      var arrayid = str.split("_");
      var PID = arrayid[0];
      var CID = arrayid[1];
      
      
      $(".edittitle").show();
      $(".addtitle").hide();
      $(".editsubtitle").show();
      $(".addsubtitle").hide();
      $("#addcategorybtn").hide();
      $("#editcategorybtn").show();
      $("#updatecatid").val(CID);
      $("#cancelcategorybtn").show();
            var catname = $("#second_"+CID).text();
            $("#addcategoryname").val(catname);
      
      $("#selectcatoption option").each(function()
      {
        if ($(this).val() == PID)
        $(this).prop('selected', true);
      });

        });
        }
    
    $(document).ajaxComplete(function(){
          ajaxeditinline ();
    });
    
    $(document).ready(function(){
        ajaxeditinline ();
        $("#errormsg").val('');
    $(".edittitle").hide();
    $(".editsubtitle").hide();
    $("#editcategorybtn").hide();
    $("#cancelcategorybtn").hide();
    
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });
</script>