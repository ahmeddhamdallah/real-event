<?php

include_once("database/db_conection.php");


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
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

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
              <li class="active"><a href="sport.php">Home</a></li>
              
              <!-- <li class="disabled"><a href="#">Link</a></li> -->
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Categories <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header">Edit Events</li>
                  <li><a href="index.php"> Events Editor</a></li>
                  <li class="divider"></li>
                 
                </ul>
              </li>
              <li class="active"><a href="login.php">Login</a></li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    <!--header-->
   <div class="alert alert-warning alert-dismissable">
    <!--documents-->
  <div class="container">
    <div class="row">
        <div class="table-scrol"> 
        <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <h1 align="center" class="addtitle">Add the Categories</h1> 
        <h1 align="center" class="edittitle">Edit Category</h1> 
        </div>  
        </div>
        <p></p>
        <div id="errormsg"></div>
        <!--add category start-->
        <div class="container">
                <div class="row">
                <h2 class="addsubtitle">Add Categories</h2>
                <h2 class="editsubtitle">Edit Category</h2>
            
              <form id="uploadForm" action="" method="post" autocomplete="off">
              
              <div class="form-group">
                <label for="addcategoryname11">Category Name</label>
                <input type="text" class="form-control" name="addcategoryname" value="" id="addcategoryname" placeholder="Category name" maxlength="100" required  autofocus>
        
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
      <select class="form-control" id="selectcatoption" name='selectcategory' required>            
          <option value=''>None</option>
          <option value='0'>Parent Category</option>
          <?php foreach($categoryList as $cl) { ?>
            <option value="<?php echo $cl["id"]; ?>"><?php echo $cl["name"]; ?></option>
          <?php } ?>

      </select>
      </div>
            
              <input class="btn btn btn-success" type="submit" value="Add Category" name="addcategorybtn" id="addcategorybtn" >
              <input type="hidden" name="updatecatid" id="updatecatid" value="">
        <input class="btn btn btn-success" type="submit" value="Save" name="editcategorybtn" id="editcategorybtn" >
        <input class="btn btn btn-success" type="button" value="Cancel" name="cancelcategorybtn" id="cancelcategorybtn" >
            </div>
            </form>
        </div>
        <!--add category Ends-->
        <p></p>
        <div class="row">
        <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
      
      
        <table id="example" class="table table-bordered table- table-striped" style="table-layout: fixed">  
            <thead>
            <tr>  
                <th class="col-md-1 col-sm-1">Category NO</th>
                <th class="col-md-3 col-sm-3">Category Name</th>             
                
                <th class="col-md-4 col-sm-4">Category Path</th>
                <th class="col-md-2 col-sm-2">Action</th>              
            </tr>  
            </thead> 
           
            <tbody>
            <tr id="category-list-box">
                <img src="LoaderIcon.gif" id="loaderIcon" style="display:none;" />
            </tr> 
            <?php  
            
      function createTreename($category_name,$parent_id) {
        global $db_conn;
          $cat_name = $category_name;
        
          $get_parentid_query="select cat_name,parent_id from category where id='$parent_id'";
              $getparenrun=mysqli_query($db_conn,$get_parentid_query);
              $getrow=mysqli_fetch_row($getparenrun);
          
          if($getrow['1'] == 0){
              $cat_name .= ">>".$getrow['0'];
            } else {
              $cat_name .= ">>".createTreename($getrow['0'],$getrow['1']);
            }
    
        return $cat_name;
      }
        
      
            $view_category_query="select * from category";//select query for viewing users. 
            $run=mysqli_query($db_conn,$view_category_query);//here run the sql query.  
            if(mysqli_num_rows($run)>0){
            while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
            {  
                $category_id=$row[0]; 
                $category_name=$row[1];   
                $cat_parent_id=$row[2];   
                 
           $view_parentid_query="select cat_name,parent_id from category where id='$category_id'";
           $parenrun=mysqli_query($db_conn,$view_parentid_query);
           $row=mysqli_fetch_row($parenrun);
         if($row['1'] == 0){
            $cat_name = $row['0'];
         } else {
          $cat_name = createTreename($row['0'],$row['1']);
         }
         // Format Category name
         $strtoarray = explode(">>",$cat_name);
         $reversed = array_reverse($strtoarray);
         $return_cat = implode(" >> ",$reversed);
        
            ?>  
            
            <tr class="tredit" id="ajax_<?php echo $category_id;?>">  
                <!--here showing results in the table -->  
                
                <td class="col-md-1 col-sm-1">
                   <span id="first_<?php echo $category_id; ?>" class="text"><?php echo $category_id; ?></span>                   
                </td>
                <td class="col-md-3 col-sm-3">
                    <span id="second_<?php echo $category_id; ?>" class="text"><?php echo $category_name; ?></span>                    
                </td> 
               
                <td class="col-md-4 col-sm-4">
                  <span id="fourth_<?php echo $category_id; ?>" class="text"><?php echo $return_cat; ?></span>   
                </td>  
                <td class="col-md-2 col-sm-2">                    
                    <input type="submit" class="btn btn-success ajaxeditcategory" id="<?php echo $cat_parent_id."_".$category_id; ?>" name="editcategory" value="Edit">
                    <input type="submit" class="btn btn-danger delete" id="sixth_ajax_<?php echo $category_id; ?>" name="deletecategory" value="Delete" onClick="deleteAction(<?php echo $category_id; ?>)">
                </td> <!--btn btn-danger is a bootstrap button to show danger-->                 
                
                
            </tr>  
            
            <?php }
            } /*else {
                echo "<tr><td colspan='6'><h3 class='text-center'>No Categories Found</h3></tr></td>";
            }*/
            
            ?>   
            
            </tbody>
        </table> 
        
        </div>  
        </div>
        
            
        
    </div>
    </div>  
    </div> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   
  </body>
</html>
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
