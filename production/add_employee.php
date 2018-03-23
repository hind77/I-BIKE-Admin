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
                <h2>Trucks Monitor  </h2>
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
                    <button class="btn btn-primary " onclick="addTruck();"> Add employee</button>
                  </div>
              </div>
            </div>
            
          </div>
        </div>
     </div>
   </div>

   <script type="text/javascript">
     function addTruck(){
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var email = $("#email").val();


        $.ajax({
          url: "ajax/addEmployee.php?fname=" + fname + "&lname=" + lname + "&username=" + username + "&password=" + password + "&email=" + email,
          success: function(data){
            if(data.code == "200"){

              window.location.href = "employees.php";
              
            }else{
              window.alert("There was a problem adding the bin");
            }
          }
        });
      }
   </script>

 <?php
    //first commit
   include 'includes/footer.php';
   include 'includes/page_Footer.php';
 ?>
