<?php $this->load->view('includes/header')?>

    <script>
$(document).ready(

function()
{

<?php $data['selected_nav'] = "ad";
$this-> load->view('includes/nav_helper',$data)?>

});
    </script>

</head>
  <body>


<?php $this-> load->view('includes/navigation')?>


    <!-- Start: MAIN CONTENT -->
    <div class="content">
      <div class="container">
        <div class="page-header">
          <h1>Admin panel</h1>
        </div>
         <?php echo validation_errors(); if(isset($msg)) { ?>
              <div class="alert alert-error">
            <?php  echo $msg; ?>
              </div>
          <?php  }?>
        <div class="row">
          <div class="span6 offset3">
            <h4 class="widget-header"><i class="icon-lock"></i>Login</h4>
            <div class="widget-body">
              <div class="center-align">
                <form class="form-horizontal form-signin-signup" method="post" action="<?php echo base_url(); ?>index.php/admin_auth/login">
                  <input type="text" name="username" placeholder="username/Email">
                  <input type="password" name="password" placeholder="Password"><br/>


                  <input type="submit" value="Login" class="btn btn-primary btn-large">
                </form>


              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    <!-- End: MAIN CONTENT -->




 <br/>
 <br/>
 <br/>
 <br/>
  <br/>


<?php $this->load->view('includes/footer')?>
