<?php

session_start();

if(!isset($_SESSION['admin']))
 {
   header('location:index.php');
 };

date_default_timezone_set('Asia/Kolkata');
$current = date('Y-m-d');

$admin=$_SESSION['admin'];
$name=$admin['Name'];
$auth_id=$admin['AuthID'];



require 'db/config.php';

$sql="SELECT userattendance.*, users.RegisterNo, users.Name,users.UserImage FROM userattendance INNER JOIN users ON userattendance.UserID=users.UserID WHERE userattendance.DateIN='$current'";
$result=mysqli_query($conn,$sql);


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Estadio | Admin</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">


<style type="text/css">
  
#thumbwrap {
  position:relative;
  /*margin:75px auto;*/
  /*width:252px; height:252px;*/
}
.thumb img { 
  border:1px solid #000;
  margin:3px;
   height: 139px;
  width: 155px;
  /*float:left;*/
}
.thumb span { 
  position:absolute;
  visibility:hidden;
}
.thumb:hover, .thumb:hover span { 
  visibility:visible;
  top:0; right: 150px; 
  z-index:1;
}


</style>
 
  </head>

  <body class="nav-md">
    




 <?php require 'partials/sidebar.php'; ?>




        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Attendance</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel p-btm" >
                  <div class="x_title">
                    <h2>Attendance List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Register No</th>
                          <th>Name</th>
                          <th>Time In</th>
                          <th>Time Out</th>
                          <th>Date</th>
                          <th>Sports Name</th>
                          <th>Action</th>

                        </tr>
                      </thead>


                      <tbody>

                      <?php while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
                        
                        <tr>
                          
                          <td><?php echo $row['RegisterNo']; ?></td>
                          <td><?php echo $row['Name']; ?></td>
                          <td><?php echo $row['TimeIn']; ?></td>

                        

                            <?php
                            $timeout=$row['TimeOut'];

                            if(empty($timeout))
                            { ?>

                            <td><a class="thumb" href="attendance_out.php?id=<?php echo $row['AttendanceID'];?>"><input type="button" name="out" class="btn btn-success" value="OUT"></a></div></td>

                            <?php
                            }
                            
                            else
                            { ?>

                            <td><?php echo $row['TimeOut']; ?></td>
                            <?php }
                            ?>

                           
                          <td><?php echo $row['DateIN']; ?></td>
                          <td><?php echo $row['SportName']; ?></td>
                    
                         
                          


                           <?php 
                           $Status=$row['Status'];
                           if($Status=='Pending')
                           {
                           ?>
                           

                           <td><div id="thumbwrap"><a class="thumb" href="approve.php?id=<?php echo $row['AttendanceID'];?>"><input type="button" name="approve" class="btn btn-success" value="Approve"><span><img src="../uploads/user/<?php echo $row['UserImage']; ?>" alt=""></span></a></div></td>
                          
                           
                           <?php }

                           else
                            {?>

                           <td>Approved</td> 
                            
                            <?php } ?>


                      
                            
                      
                        </tr>

                       <?php }; ?> 
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


        


        </div>
        </div>
        </div>
           
      



                     <!-- footer content -->
        <footer>
          <div class="pull-right">
            Powered By <a href="">Estadio</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>



    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

  </body>
</html>