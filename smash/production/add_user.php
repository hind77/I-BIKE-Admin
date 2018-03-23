<?php
  include 'includes/header.php';
 ?>

 <body class="nav-md">
   <div class="container body">
     <div class="main_container">
       <?php
          include 'includes/side_bare.php';
          include 'includes/top_navigation.php';
        ?>
        <div class="right_col" role="main">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Add Users   </h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">First name</label>
                    <input type="text" class="form-control" id="fname">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="message-text" class="form-control-label">Last name</label>
                    <input type="text" class="form-control" id="lname">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="message-text" class="form-control-label">Username</label>
                    <input type="text" class="form-control" id="username">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="message-text" class="form-control-label">Password</label>
                    <input type="password" class="form-control" id="password">
                  </div>  
                  <div class="form-group col-md-6">
                    <label for="message-text" class="form-control-label">Email</label>
                    <input type="text" class="form-control" id="email">
                  </div>  
                  
                </form>
                <br>
                <div class="form-group col-md-6">
                    <button class="btn btn-primary " onclick="adduser();"> Add User</button>
                  </div>
              </div>
            </div>
            
          </div>
        </div>
     </div>
   </div>

   <script type="text/javascript">
     function adduser(){
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var email = $("#email").val();


        $.ajax({
          url: "ajax/addUser.php?fname=" + fname + "&lname=" + lname + "&username=" + username + "&password=" + password + "&email=" + email,
          success: function(data){
            if(data.code == "200"){

              window.location.href = "users.php";
              
            }else{
              window.alert("There was a problem adding the user");
            }
          }
        });
      }
   </script>

 <?php
    //first commit
   include 'includes/footer.php';
 ?>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
</body>
</html>
