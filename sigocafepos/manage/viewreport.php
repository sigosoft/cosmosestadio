<?php


date_default_timezone_set('Asia/Kolkata');
$current = date('Y-m-d');


require_once("../android_connection.php");
$result     = mysqli_query($conn,"SELECT * from orders WHERE (DATE(`timestamp`)='$current'");

if(isset($_POST['submit']))
{

 $from = $_POST['from'];
 $to = $_POST['to'];

 $sql="SELECT * FROM orders  WHERE (DATE(`timestamp`) >= '$from' AND DATE(`timestamp`) <= '$to')";



 $result=mysqli_query($conn,$sql);

};
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

<?php include "sidebarr.php";


 
?>
<h4>&nbsp;&nbsp;&nbsp;Reports</h4>
        <div class="content">
            <div class="container-fluid">

                <div class="box-body">
<div class="row">
<div class="col-md-3">
<form method="POST">
 
  <label>From</label>
 <input type="date" class="form-control" name="from">
 </div>

<div class="col-md-3">

 <label>To</label>
 <input type="date" class="form-control" name="to">
 </div>

<div class="col-md-2">

 <input type="submit" class="btn btn-primary" name="submit" style="margin-top: 16%;">

 </div>
</form>
 </div>
 </div>
</div><br><br>



                <div class="row">

     <table id="tb" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style = "width:15%">Order No</th>
                <th style = "width:45%">Invoice No</th>
                <th style = "width:45%">User Type</th>
                <th style = "width:45%">Total</th>
                <th style = "width:45%">GST @ 5%</th>
                
                <th style = "width:45%">Grand Total</th>
                <th style = "width:45%">Date & Time</th>
        
                
            </tr>
        </thead>
      

        <tbody>
             <?php while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
            <tr>
              <td><?php echo $row['order_no']; ?></td>
              <td><?php echo $row['invoice_no']; ?></td>
              <td><?php echo $row['user_type']; ?></td>
              <td><?php echo $row['total']; ?></td>
              <td><?php echo $row['CGST']*2; ?></td>
              <td><?php echo $row['grand_total']; ?></td>
              <td><?php echo $row['timestamp']; ?></td>
             
               
            </tr>
           
          
            <?php }?>
        </tbody>

    </table>

   
       
                </div>
              
              
            </div>
        </div>

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
