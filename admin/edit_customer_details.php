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


$UserID=$_GET['id'];

require 'db/config.php';


$users=mysqli_query($conn,"SELECT * FROM users WHERE UserID='$UserID'");
$row=mysqli_fetch_assoc($users);
$phone=$row['Phone'];
$SQLStatus=$row['SQLStatus'];

if($SQLStatus==1)
{
 
 $sql=1;
    
}
else
{
    $sql=2;
}

if(isset($_POST['submit']))
{

$Name=$_POST['Name'];
$Phone=$_POST['Phone'];
$Email=$_POST['Email'];
$Gender=$_POST['Gender'];
$Place=$_POST['Place'];
$BloodGroup=$_POST['BloodGroup'];
$DOB=$_POST['DOB'];
$Notes=$_POST['Notes'];
$FamilyDetails = $_POST['FamilyDetails'];
$Occupation=$_POST['Occupation'];
$MaritalStatus=$_POST['MaritalStatus'];



  $update="UPDATE users SET Name='$Name', Phone='$Phone', Email='$Email', place='$Place', Gender='$Gender', BloodGroup='$BloodGroup', DOB='$DOB',Notes='$Notes', MaritalStatus='$MaritalStatus', FamilyDetails='$FamilyDetails', Occupation='$Occupation', SQLStatus='$sql' WHERE UserID='$UserID'";




  if (mysqli_query($conn, $update))
  {
   
   echo "<script> alert('Member Modified');window.location.href = 'manage_customer.php';</script>";
  
  }
  
  else
  {

   echo "<script> alert('Upload Error');window.location.href = 'manage_customer.php';</script>";

  }


};


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
  
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

 


   <script src="vendors/jquery/dist/jquery.min.js"></script>

    <script src="typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
    <style type="text/css">


.tt-dropdown-menu {
  background-color: #FFFFFF;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  margin-top: 12px;
  padding: 8px 0;
  width: 422px;
}

.hide{
       display: none;
         }
      .boxe{
        border: 1px solid #9595a7!important;
    background-color: #f7f7f9;
    margin-top: 5%;
    text-align: center;
    margin-left: 5%;
    margin-bottom: 5%;
    height: 100px;
      }
</style>

  </head>

  <body class="nav-md">


  <?php require 'partials/sidebar.php'; ?>

       


<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create Customer</h3>
              </div>

          
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Customer Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name"> Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Name" class="form-control col-md-7 col-xs-12" name="Name" value=" <?php echo $row['Name'];?>" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Phone"> Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Phone" class="form-control col-md-7 col-xs-12" value=" <?php echo $row['Phone'];?>" name="Phone" required="required" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Email"> Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Email" class="form-control col-md-7 col-xs-12" name="Email" value=" <?php echo $row['Email'];?>" required="required" type="email">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Gender">Gender<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                          
                           <?php 
                           $checkeder=$row['Gender'];
                           if($checkeder=='Male')
                           {
                           ?>

                           <input type="radio" id="Gender" name="Gender" value="Male" checked > Male&nbsp&nbsp
                          <input type="radio" id="Gender" name="Gender" class="Female" value="Female"> Female&nbsp&nbsp
                           
                           <?php }

                           
                            else
                            {
                            ?>

                            <input type="radio" id="Gender" name="Gender" value="Male"> Male&nbsp&nbsp
                           <input type="radio" id="Gender" name="Gender" class="Female" value="Female" checked> Female&nbsp&nbsp

                            <?php };?>

                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Place"> Place <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Place" class="form-control col-md-7 col-xs-12" name="Place" value="<?php echo $row['Place'];?>" placeholder="Place" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="BloodGroup"> Blood Group <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <select id="BloodGroup" class="form-control col-md-7 col-xs-12" name="BloodGroup">
                          
                          <option value="<?php echo $row['BloodGroup'];?>"><?php echo $row['BloodGroup'];?></option>
                          <option value="A Positive">A Positive</option>  
                          <option value="A Negative">A Negative</option>  
                          <option value="B Positive">B Positive</option>  
                          <option value="B Negative">B Negative</option> 
                          <option value="AB Positive">AB Positive</option>  
                          <option value="AB Negative">AB Negative</option>   
                          <option value="O Positive">O Positive</option>   
                          <option value="O Negative">O Negative</option>   
                        
                          
                        
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DOB"> DOB <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="DOB" class="form-control col-md-7 col-xs-12" name="DOB" value="<?php echo $row['DOB'];?>" placeholder="DOB" required="required" type="date">
                        </div>
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="MaritalStatus">Marital Status<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          


                          <?php 
                           $checked=$row['MaritalStatus'];
                           if($checked=='Single')
                           {
                           ?>

                            <input type="radio" id="MaritalStatus" name="MaritalStatus" value="Single" checked> Single&nbsp&nbsp
                          <input type="radio" id="MaritalStatus" name="MaritalStatus" class="female" value="Married"> Married&nbsp&nbsp
                           
                           <?php }
                          
                          else
                          {
                          ?>

                             <input type="radio" id="MaritalStatus" name="MaritalStatus" value="Single"> Single&nbsp&nbsp
                          <input type="radio" id="MaritalStatus" name="MaritalStatus" class="female" value="Married"  checked> Married&nbsp&nbsp

                            <?php };?>
                          
                        </div>
                      </div>


                     


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Notes">Notes <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="Notes" required="required" name="Notes" class="form-control col-md-7 col-xs-12" rows="8"><?php echo $row['Notes'];?></textarea>
                        </div>
                      </div>



                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="FamilyDetails">Family Details <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="FamilyDetails" required="required" name="FamilyDetails" class="form-control col-md-7 col-xs-12" rows="8"><?php echo $row['FamilyDetails'];?></textarea>
                        </div>
                      </div>


                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Occupation"> Occupation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Occupation" class="form-control col-md-7 col-xs-12" name="Occupation" value="<?php echo $row['Occupation'];?>" placeholder="Occupation" required="required" type="text">
                        </div>
                      </div>

                        <div class="col-md-6 col-md-offset-4">
                          <button type="submit" onClick="window.location.reload()" class="btn btn-primary">Cancel</button>
                          <input type="submit" name="submit" class="btn btn-success" value="Submit">
                        </div>
                    </form>
                    <br>
                  <!--   <div class="container">
                    

                    </div>   -->

                 
                  </div>
                </div>
              </div>
            </div>

 


           
           


     
          </div>
        </div>





        
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Powered By <a href="">Estadio</a>
          </div>
          <div class="clearfix"></div>
        </footer>


<script>
  
function GetCustomer()
       {

           var Phone = document.getElementById('RefererMobile').value 



           xhr = new XMLHttpRequest();
           xhr.open('POST' , 'GetCustomer.php' , true);

           xhr.setRequestHeader('Content-Type', 'application/json');
           xhr.send(JSON.stringify({
           Phone:Phone

           }));


           xhr.onreadystatechange = function() {
  
           if (this.readyState == 4 && this.status == 200) {


            console.log('-------------------------------111--------------------------->>>')
           
           var temp =xhr.responseText;
           if (temp) {
           
           temp= JSON.parse(temp);
           
             document.getElementById('RefMembNAme').innerHTML = temp.customer.Name;

           
          
          

           }

           }
           };




   
       

          
       }




</script>


   
    

    <!-- jQuery -->
    
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgres->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>


  
  </body>
</html>
