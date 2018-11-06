<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sigo cafepos</title>
    <link rel="icon" href="favicon.ico" type="image/icon">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap core CSS     -->

  <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="assets/css/buttons.dataTables.min.css" rel="stylesheet">
 


    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

 
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

<?php include "sidebar.php";
$counter =1;
require_once("../android_connection.php");
 $result     = mysqli_query($conn,"SELECT * from product");
 
?>
<h4>Click and edit on specific fields, it will be automaticallly saved</h4>
        <div class="content">

            <div class="container-fluid">
                <div class="row">

     <table id="tb" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th style = "width:15%">Sl no</th>
                <th style = "width:15%">Product code</th>
                <th style = "width:15%">Product name</th>
                 <th style = "width:15%">Price</th>
                 <th style = "width:15%">Image Preview</th>
                 <th style = "width:15%">Image Update</th>
                 <th style = "width:15%">Delete</th>

                
                
            </tr>
        </thead>
      
         <tbody class="row_position" >
             <?php while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
          <tr class="table-row">
              
 <td><?php echo $counter++; ?></td>
     
              
              <td contenteditable="true" data-old_value="<?php echo $row["product_code"]; ?>" onBlur="saveInlineEdit(this,'product_code','<?php echo $row["product_id"]; ?>')" onClick="highlightEdit(this);"><?php echo $row["product_code"]; ?></td>
               
                <td contenteditable="true" data-old_value="<?php echo $row["product_name"]; ?>" onBlur="saveInlineEdit(this,'product_name','<?php echo $row["product_id"]; ?>')" onClick="highlightEdit(this);"><?php echo $row["product_name"]; ?></td>

                <td contenteditable="true" data-old_value="<?php echo $row["price"]; ?>" onBlur="saveInlineEdit(this,'price','<?php echo $row["product_id"]; ?>')" onClick="highlightEdit(this);"><?php echo $row["price"]; ?></td>
               
            <td><img class="img-responsive" class="image-preview" width="100px" height="100px" class="upload-preview" src="../uploads/<?php echo $row['image'];?>"></td>
              <td><form id="uploadForm" action="upload.php" method="POST" enctype="multipart/form-data">
<label>Upload Image File:</label><br/>

<input name="userimage" type="file" class="inputFile" />
<input name="id" type="hidden" value="<?php echo $row["product_id"]; ?>" />
<input type="submit" value="Edit Image" class="btnSubmit" />

</form></td> 
            </tr>
           
          
            <?php }?>
        </tbody>

    </table>

   
       
                </div>
              
              
            </div>
        </div>
<script>
$(document).ready(function (e) {
  $("#uploadForm").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
          url: "upload.php",
      type: "POST",
      data:  new FormData(this),'&id='+id,
      contentType: false,
          cache: false,
      processData:false,
      success: function(data)
        {
      $("#targetLayer").html(data);
        },
        error: function() 
        {
        }           
     });
  }));
});
</script>
        <footer class="footer">
            <div class="container-fluid">
               
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> Powered by <i class="fa fa-heart heart"></i> <a href="http://www.sigosoft.com">Sigosoft</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>
<script>
     function saveInlineEdit(editableObj,column,id) {
// no change change made then return false
if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
return false;
// send ajax to update value
$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
$.ajax({
url: "ajax2.php",
type: "POST",
dataType: "json",
data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id,
success: function(response) {
// set updated value as old value
$(editableObj).attr('data-old_value',editableObj.innerHTML);
$(editableObj).css("background","#FDFDFD");
},
error: function () {
console.log("errr");
}
});
}
 </script>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

<script src="assets/js/jquery-1.12.4.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script> 
    <script>
    $(document).ready(function() {
    $('#tb').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    } );
    </script>


</html>
