<DOCTYPE html>
<head>
<h1>PARENT AND CHILD DATABASE</h1>
<title>DATABASE</title>
<metal charset="utf-8"></metal>

<style type="text/css">

</style>
 <title>Webslesson Tutorial | Make Treeview using Bootstrap Treeview Ajax JQuery with PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
<SCRIPT src="jquery2.js"></SCRIPT>
<SCRIPT>
function addMore() {
  $("<DIV>").load("input.php", function() {
      $("#product").append($(this).html());
  }); 
}
function deleteRow() {
  $('DIV.product-item').each(function(index, item){
    jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
        $(item).remove();
            }
        });
  });
}

</SCRIPT>

</head>
<body>
<form name="form1" action="save.php" method="POST">
<input type="text" name='fir' placeholder ="parent first name"><br><br>
<input type="text" name='las' placeholder ="parent last name"><br><br>
<DIV id="product">
<?php require_once("input.php") ?>
</DIV>
<DIV class="btn-action float-clear">
<input type="button" name="add_item" value="Add More kids" onClick="addMore();" />
<input type="button" name="del_item" value="Delete kid" onClick="deleteRow();" />
<input type="submit" value='save' class ="submit" name="submit"/>
<span class="success"><?php if(isset($message)) { echo $message; }?></span>
</DIV>
</form>
<br /><br />
   <div id="treeview"></div>

  </div>
<script type="text/javascript" src = "script.js">
</script>
</body>
</html>
<script>
$(document).ready(function(){
 $.ajax({ 
   url: "fetch.php",
   method:"POST",
   dataType: "json",       
   success: function(data)  
   {
  $('#treeview').treeview({data: data});
   }   
 });
});
</script>