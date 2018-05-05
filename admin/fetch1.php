<?php 
include("memberClass.php");
function printOptions($options, $parent, $level=0)
{

  foreach ($options as $opt)
    {
      if ($parent == $opt['parentId'])
       {
           $indent = str_repeat('---', $level); 
           echo "<option value='".$opt['memberId']."'>".$indent.$opt['name']."</option>";
           printOptions($options, $opt['memberId'], $level+1);
       }
             
    }
}
?>
<!DOCTYPE html>
<html>
 <body>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
  <?php
  $objMember = new Member;
  $membersResult = $objMember->getParentMembers();
  $allMembersResult = $objMember->getAllMembers();
  ?>    
  <!-- Modal content-->
  <div class="modal-content">
    <div class="alert alert-warning alert-dismissable">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Categories</h4>
    </div>
    <div class="modal-body">
    <form action="sportsmanager.php" method="post" enctype="multipart/form-data">
      <div class="form-group">     
  <?php
  echo "<select class='form-control' id='memberSelect' name='memberSelect'>\n" ;
  // call function
    echo "<option value='0'>-- --</option>";

  printOptions($allMembersResult,0,2);
  echo "</select>\n";

  ?></div>

        <div class="form-group">
          <label for="email">Sub:</label>
            <input type="text" class="form-control" id="childEntry">
        </div>
        <button type="button" id="btnsubmit" class="btn btn-default" >Submit</button>
    </form>
  </div>
  
  
 </div>
</div>
</div>
      
    </div>


  
 </body>
</html>

<!--<script type="text/javascript">
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
 
$(".dropdown-menu li a").click(function(){
  
  $(".btn:first-child").html($(this).text()+' <span class="caret"></span>');
  
});


$("#btnsubmit").on('click', function() {
 
   
    var memberName = $("#childEntry").val();
    var parentId = $("#memberSelect").val();
    var parentName = $("#memberSelect").text();
   $.ajax({ 
     url: "insertMember.php?",
     type:"POST",
     data: { "name" : memberName ,"parentId" : parentId } ,
     success: function(data)  
     {
       //var lastValue = $('#memberSelect option:last-child').val();
        var opt = document.createElement("option");
        // Add an Option object to Drop Down/List Box
        document.getElementById("memberSelect").options.add(opt);
        // Assign text and value to Option object
        opt.text = memberName;
        opt.value = parentId;
        opt.setAttribute('selected','selected');
        //$("#memberSelect").selectpicker("refresh");
        alert(data);
     }   
   });

});

});
</script>



